<?php

/*
 * Table: products
 * Fields:
 * 1. id(int),
 * 2. name(string),
 * 3. title(string),
 * 4. description(string),
 * 5. seo_description(string),
 * 6. image(string),
 * 7. price(int),
 * 8. cat_id(int)
 */

class Products
{

    const SHOW_BY_DEFAULT = 6;

    public static function getProductById($id)
    {
        $id = intval($id);

        if($id){
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM products WHERE id = '.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function getProductsByIds($idsArray)
    {
        $products = array();

        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM products WHERE status = '1' AND id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM products WHERE status = "1" AND cat_id = "'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $products = array();

        $result = $db->query("SELECT `id`, `name`, `seo_description`, `price`, `image`, `is_new` FROM products WHERE status = '1' AND cat_id = '$categoryId' ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT . " OFFSET " . $offset);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['seo_description'] = $row['seo_description'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $products;
    }

    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';

        $path = '/upload/images/products/';

        $pathToProductImage = $path . $id . '.jpg';

        if(file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }

        return $path.$noImage;
    }

    public static function createProduct($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO products (name, code, price, cat_id, brand, availability, description, seo_description, is_new, is_recommended, status) VALUES (:name, :code, :price, :cat_id, :brand, :availability, :description, :seo_description, :is_new, :is_recommended, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':cat_id', $options['cat_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':seo_description', $options['seo_description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if($result->execute()){
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function updateProductById($id, $options)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE products SET name = :name, title = :title, code = :code, price = :price, cat_id = :cat_id, brand = :brand, availability = :availability, description = :description, seo_description = :seo_description, is_new = :is_new, is_recommended = :is_recommended, status = :status WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':cat_id', $options['cat_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':seo_description', $options['seo_description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getProductsList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, code, seo_description, description, price FROM products WHERE status = "1" ORDER BY id ASC');
        $productsList = array();

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['seo_description'] = $row['seo_description'];
            $productsList[$i]['description'] = $row['description'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductsListInAdmin()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM products ORDER BY id ASC');
        $productsList = array();

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['seo_description'] = $row['seo_description'];
            $productsList[$i]['description'] = $row['description'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }

        return $productsList;
    }

    public static function deleteProductById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM products WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productList = array();

        $result = $db->query('SELECT `id`, `name`, `seo_description`, `price`, `image`, `is_new` FROM products WHERE status = "1" ORDER BY id DESC LIMIT '.$count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['seo_description'] = $row['seo_description'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productList;
    }

    public static function getRecommendedProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productList = array();

        $result = $db->query('SELECT `id`, `name`, `price`, `image`, `is_new`, `is_recommended` FROM products WHERE status = "1" AND is_recommended = "1" ORDER BY id DESC LIMIT '.$count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productList;
    }
}