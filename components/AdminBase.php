<?php

abstract class AdminBase
{
	public static function checkAdmin()
	{
		$userId = Users::checkLogged();

		$user = Users::getUserById($userId);

		if($user['role'] == 'admin'){
			return true;
		}

		die('Доступ запрещен!');
	}
}