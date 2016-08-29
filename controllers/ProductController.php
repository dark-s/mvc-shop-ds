<?php

class ProductController
{
    public function actionView($productId)
    {
        $categories = array();
        $categories = Categories::getCategoriesList();

        $recommendedProducts = array();
        $recommendedProducts = Products::getRecommendedProducts(3);

        $product = Products::getProductById($productId);

        require_once(ROOT.'/views/product/view.php');
        return true;
    }
}