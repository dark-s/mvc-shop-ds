<?php

class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    // Возвращает строку с URI
    private function getURI()
    {
        //Если запрос существует, возвращает строку запроса
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        } else {
            return false;
        }
    }

    public function run()
    {
        //Получаем строку запроса
        $uri = $this->getURI();

        //Проверяем на наличие запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            //Сравниваем $uriPattern и $uri
            if(preg_match("~$uriPattern~", $uri)) {

               //Получаем внутренний путь из внешнего, согласно правилу
               $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

               //Определяем контроллер, action, параметры
               $segments = explode('/', $internalRoute);

               //Получаем название controller'а
               $controllerName = array_shift($segments).'Controller';
               $controllerName = ucfirst($controllerName);

               //Получаем название action'а
               $actionName = 'action'.ucfirst(array_shift($segments));

               $parameters = $segments;

               //Получаем файл контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                //Проверяем, существует ли файл
                if(file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //Создаем объект контроллера и вызываем action
                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if($result != null){
                    break;
                }
            }
        }
    }
}