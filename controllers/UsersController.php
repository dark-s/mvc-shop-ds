<?php

class UsersController
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $pass = '';

        if(isset($_POST['register'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $errors = false;

            if(!Users::checkName($name)){
                $errors[] = 'Имя не должно быть короче 3-х символов!';
            }

            if(!Users::checkEmail($email)){
                $errors[] = 'Неправильный email!';
            }

            if(Users::checkEmailExist($email)){
                $errors[] = 'Такой email уже используется!';
            }

            if(!Users::checkPass($pass)){
                $errors[] = 'Пароль не должен быть короче 6-ти символов!';
            }
           $name = trim(htmlspecialchars(strip_tags($name)));
           $email = trim(htmlspecialchars(strip_tags($email)));
           $pass = trim(htmlspecialchars(strip_tags(md5($pass))));

            if($errors == false){
                $result = Users::register($name, $email, $pass);
                $_SESSION['name'] = $name;
            }

        }

        require_once(ROOT.'/views/users/register.php');

        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $pass = '';

        if(isset($_POST['login'])){
            $email = trim(htmlspecialchars(strip_tags($_POST['email'])));
            $pass = trim(htmlspecialchars(strip_tags(md5($_POST['pass']))));

            $errors = false;

            if (!Users::checkEmail($email)) {
                $errors[] = 'Неправильный email!';
            }

            if(Users::checkEmailExist($email)){
                $errors[] = 'Такой email уже используется!';
            }

            if(!Users::checkPass($pass)){
                $errors[] = 'Пароль не должен быть короче 6-ти символов!';
            }

            $userId = Users::checkUserData($email, $pass);

            if ($userId == false) {
                $errors[] = 'Неправильные email или пароль!';
            } else {
                Users::auth($userId);

                header("Location: /account/");
            }
        }

        require_once(ROOT.'/views/users/login.php');

        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}