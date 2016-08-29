<?php

/*
 * Table: categories
 * Fields:
 * 1. id(int),
 * 2. name(string),
 * 3. sort_order(int),
 * 4. status(bool)
 */

class Categories
{
    public static function createCategory($name, $sortOrder, $status)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO categories (name, sort_order, status) VALUES (:name, :sort_order, :status)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = "DELETE FROM categories WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        
        return $result->execute();
    }

    public static function updateCategoryById($id, $name, $sort_order, $status)
    {
        $db = Db::getConnection();

        $sql = "UPDATE categories SET name = :name, sort_order = :sort_order, status = :status WHERE id = :id";

        $result = $db->prepare($sql);
        
        $result->bindParam(":name", $name, PDO::PARAM_STR);
        $result->bindParam(":sort_order", $sort_order, PDO::PARAM_INT);
        $result->bindParam(":status", $status, PDO::PARAM_INT);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        
        return $result->execute();
    }

    public static function getCategoryById($id)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM categories WHERE id = '.$id);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetch();
    }

    /*
     * Выбираем массив категорий из БД
     */
    public static function getCategoriesList()
    {
        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name FROM categories ORDER BY sort_order ASC');

        $i = 0;
        while($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;
    }

    public static function getCategoriesListAdmin()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, sort_order, status FROM categories ORDER BY sort_order ASC');

        $categoryList = array();
        $i = 0;
        while($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }
}