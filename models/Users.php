<?php

/**
 * Created by PhpStorm.
 * User: DS
 * Date: 31.07.2016
 * Time: 21:06
 */
class Users
{
    public static function register($name, $email, $pass)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO users (name, email, pass) VALUES (:name, :email, :pass)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkUserData($email, $pass)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email AND pass = :pass';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':pass', $pass, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if($user){
            return $user['id'];
        }

        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function edit($userId, $name, $pass)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE users SET name = :name, pass = :pass WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getUserById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function checkLogged()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if(isset($_SESSION['user'])){
            return false;
        }

        return true;
    }

    public static function checkName($name)
    {
        if(strlen($name) >= 3){
            return true;
        }
        return false;
    }

    public static function checkPhone($phone)
    {
        if(strlen($phone) >= 10){
            return true;
        }
        return false;
    }

    public static function checkAdress($address)
    {
        if(strlen($address) >= 5){
            return true;
        }
        return false;
    }

    public static function checkIndex($index)
    {
        if(strlen($index) >= 5){
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function checkEmailExist($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn()){
            return true;
        }
        return false;
    }

    public static function checkPass($pass)
    {
        if(strlen($pass) >= 6){
            return true;
        }
        return false;
    }

}