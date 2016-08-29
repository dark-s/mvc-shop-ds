<?php

class ShopController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Categories::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Products::getLatestProducts(6);

        $recommendedProducts = array();
        $recommendedProducts = Products::getRecommendedProducts(3);

        require_once(ROOT.'/views/shop/index.php');
        return true;
    }

    public function actionContact()
    {
    	if (isset($_POST['send'])) {
	  		$email = trim(htmlspecialchars(strip_tags($_POST['email'])));  		
	  		$message = trim(htmlspecialchars(strip_tags($_POST['mess'])));  		
	  
	  		$errors = false;

	  		if(!Users::checkEmail($email)){
	  			$errors[] = 'Неправильный email';
	  		}

	  		if($errors == false){
	    	$mail = 'stempelv@gmail.com';
	    	$subject = 'Обратная связь с сайта';
	    	$mess = "Письмо от пользователя с E-mail: $email\n";
	    	$mess .= "Сообщение: \n" . $message;
	    	$result = mail($mail, $subject, $mess);
	    	$result = true;
	    	}
    	}

        require_once(ROOT.'/views/shop/contact.php');
    	return true;
    }
}