<?php

class AccountController
{
	public function actionIndex()
	{

		$userId = Users::checkLogged();

		$user = Users::getUserById($userId);

		require_once ROOT.'/views/account/index.php';

		return true;
	}

	public function actionEdit()
	{
		$userId = Users::checkLogged();

		$user = Users::getUserById($userId);

		$name = $user['name'];
		$pass = $user['pass'];

		$result = false;

		if(isset($_POST['edit'])){
			$name = trim(htmlspecialchars(strip_tags($_POST['name'])));
			$pass = trim(htmlspecialchars(strip_tags(md5($_POST['pass']))));

			$errors = false;

			if(!Users::checkName($name)){
				$errors[] = 'Имя не должно быть короче 3-х символов';
			}

			if(!Users::checkPass($pass)){
				$errors[] = 'Пароль не должен быть короче 6-ти символов';
			}

			if($errors == false){
				$result = Users::edit($userId, $name, $pass);
			}
		}

		require_once ROOT.'/views/account/edit.php';

		return true;
	}

	public function actionOrders()
	{
		// Проверяем, залогинен ли пользователь
		$userId = Users::checkLogged(); 

		// Получаем заказы по ID пользователя
		$ordersList = Order::getOrdersByUserId($userId);

		require_once ROOT.'/views/account/orders.php';
		return true;
	}

	/**
     * Action для страницы "Просмотр заказа"
     */
    public function actionView($id)
    {
        // Проверка доступа
        $userId = Users::checkLogged(); 

        // Получаем данные о конкретном заказе
        $order = Order::getOrderByUserId($id);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['prod_name'], true);

        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        // Получаем список товаров в заказе
        $products = Products::getProductsByIds($productsIds);

        // Подключаем вид
        require_once(ROOT . '/views/account/view.php');
        return true;
    }
}