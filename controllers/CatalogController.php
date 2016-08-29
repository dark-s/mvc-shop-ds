<?php


class CatalogController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Categories::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Products::getLatestProducts(6);

        $recommendedProducts = array();
        $recommendedProducts = Products::getRecommendedProducts(3);

        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Categories::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Products::getProductsListByCategory($categoryId, $page);

        $total = Products::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Products::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }
}