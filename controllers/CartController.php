<?php

class CartController
{
	public function actionIndex()
	{

		$categories = array();
        $categories = Categories::getCategoriesList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if($productsInCart){
        	$productsIds = array_keys($productsInCart);
        	$products = Products::getProductsByIds($productsIds);

        	$totalPrice = Cart::getTotalPrice($products);
        }

		require_once(ROOT . '/views/cart/index.php');
		return true;
	}

	public function actionCheckout()
	{

		$categories = array();
        $categories = Categories::getCategoriesList();

        $result = false;

        if(isset($_POST['checkout'])){
        	$userName = trim(htmlspecialchars(strip_tags($_POST['name'])));
        	$userPhone = trim(htmlspecialchars(strip_tags($_POST['phone'])));
        	$userCountry = trim(htmlspecialchars(strip_tags($_POST['country'])));
        	$userCity = trim(htmlspecialchars(strip_tags($_POST['city'])));
        	$userAddress = trim(htmlspecialchars(strip_tags($_POST['address'])));
        	$userIndex = trim(htmlspecialchars(strip_tags($_POST['index'])));
        	$userComment = trim(htmlspecialchars(strip_tags($_POST['comment'])));

        	$errors = false;
        	if(!Users::checkName($userName))
        		$errors[] = 'Имя должно быть не менее 3 символов';
        	if(!Users::checkPhone($userPhone))
        		$errors[] = 'Неправильный телефон';
        	if(!Users::checkAdress($userAddress))
        		$errors[] = 'Адрес должен быть не менее 6 символов!';
        	if(!Users::checkIndex($userIndex))
        		$errors[] = 'Неправильный почтовый индекс!';

        	if($errors == false){
        		$productsInCart = Cart::getProducts();
        		if(Users::isGuest()){
        			$userId = false;
        		} else {
        			$userId = Users::checkLogged();
        		}

        		$result = Order::save($userName, $userPhone, $userCountry, $userCity, $userAddress, $userIndex, $userComment, $userId, $productsInCart);

        		if($result){
        			$adminEmail = 'stempelv@gmail.com';
        			$message = 'http://dsworks.ga/admin/orders';
        			$subject = 'Новый заказ';
        			mail($adminEmail,$subject,$message);

        			Cart::clear();
        		}
        	} else {
        		$productsInCart = Cart::getProducts();
        		$productsIds = array_keys($productsInCart);
        		$products = Products::getProductsByIds($productsIds);
        		$totalPrice = Cart::getTotalPrice();
        		$totalQuantity = Cart::countItems();
        	}
        } else {
        	$productsInCart = Cart::getProducts();

        	if($productsInCart == false){
        		header('Location: /');
        	} else {
        		$productsIds = array_keys($productsInCart);
        		$products = Products::getProductsByIds($productsIds);
        		$totalPrice = Cart::getTotalPrice($products);
        		$totalQuantity = Cart::countItems();

        		$userName = false;
        		$userPhone = false;
        		$userCountry = false;
        		$userCity = false;
        		$userAddress = false;
        		$userIndex = false;
        		$userComment = false;

        		if(Users::isGuest()){

        		} else {
        			$userId = Users::checkLogged();
        			$user = Users::getUserById($userId);

        			$userName = $user['name'];
        		}
        	} 
        }

		require_once(ROOT . '/views/cart/checkout.php');
		return true;
	}

	public function actionAddAjax($id)
	{
		echo Cart::addProduct($id);
		return true;
	}

	public function actionDelete($id)
	{
		$productsInCart = Cart::getProducts();

		unset($_SESSION['products'][$id]);
		
		header("Location: /cart/");
	}
}