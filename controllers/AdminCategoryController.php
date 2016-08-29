<?php

class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $categoriesList = Categories::getCategoriesListAdmin();

        require_once(ROOT.'/views/admin_category/index.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        if(isset($_POST['create'])){
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            $errors = false;

            if(!isset($name) || empty($name)){
                $errors[] = 'Заполните поля!';
            }

            if($errors == false){
                Categories::createCategory($name, $sortOrder, $status);

                header("Location: /admin/category");
            }
        }

        require_once(ROOT."/views/admin_category/create.php");
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $category = Categories::getCategoryById($id);

        if(isset($_POST['update'])){
            $name = $_POST['name'];
            $sort_order = $_POST['sort_order'];
            $status = $_POST['status'];

            Categories::updateCategoryById($id, $name, $sort_order, $status);

            header("Location: /admin/category");
        }
        require_once(ROOT."/views/admin_category/update.php");
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        if(isset($_POST['delete'])){

            Categories::deleteCategoryById($id);

            header("Location: /admin/category");
        }
        require_once(ROOT."/views/admin_category/delete.php");
        return true;
    }
}