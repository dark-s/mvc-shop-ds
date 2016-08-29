<?php 

class AdminProductController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();

		$productsList = Products::getProductsListInAdmin();

		require_once(ROOT.'/views/admin_product/index.php');
		return true;
	}

	public function actionCreate()
	{
		self::checkAdmin();

		$categoriesList = Categories::getCategoriesListAdmin();

		if(isset($_POST['create'])){
			$options['name'] = ($_POST['name'])?$_POST['name']:'';
			$options['title'] = ($_POST['title'])?$_POST['title']:'';
			$options['code'] = ($_POST['code'])?$_POST['code']:'';
			$options['price'] = ($_POST['price'])?$_POST['price']:'';
			$options['cat_id'] = ($_POST['cat_id'])?$_POST['cat_id']:'';
			$options['brand'] = ($_POST['brand'])?$_POST['brand']:'';
			$options['availability'] = ($_POST['availability'])?$_POST['availability']:'';
			$options['description'] = ($_POST['description'])?$_POST['description']:'';
			$options['seo_description'] = ($_POST['seo_description'])?$_POST['seo_description']:'';
			$options['is_new'] = ($_POST['is_new'])?$_POST['is_new']:'';
			$options['is_recommended'] = ($_POST['is_recommended'])?$_POST['is_recommended']:'';
			$options['status'] = ($_POST['status'])?$_POST['status']:'';

			$errors = false;

			if(!isset($options['name']) || empty($options['name'])){
				$errors[] = 'Заполните поля';
			}

			if($errors == false){
				$id = Products::createProduct($options);
				if($id){
					if(is_uploaded_file($_FILES['image']['tmp_name'])){
						move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");
					}
				};

				header('Location: /admin/product');
			}
		}

		require_once(ROOT.'/views/admin_product/create.php');
		return true;
	}

	public function actionUpdate($id)
	{
		self::checkAdmin();

		$categoriesList = Categories::getCategoriesListAdmin();

		$product = Products::getProductById($id);
		if(isset($_POST['update'])){
			$options['name'] = ($_POST['name'])?$_POST['name']:'';
			$options['title'] = ($_POST['title'])?$_POST['title']:'';
			$options['code'] = ($_POST['code'])?$_POST['code']:'';
			$options['price'] = ($_POST['price'])?$_POST['price']:'';
			$options['cat_id'] = ($_POST['cat_id'])?$_POST['cat_id']:'';
			$options['brand'] = ($_POST['brand'])?$_POST['brand']:'';
			$options['availability'] = ($_POST['availability'])?$_POST['availability']:'';
			$options['description'] = ($_POST['description'])?$_POST['description']:'';
			$options['seo_description'] = ($_POST['seo_description'])?$_POST['seo_description']:'';
			$options['is_new'] = ($_POST['is_new'])?$_POST['is_new']:'';
			$options['is_recommended'] = ($_POST['is_recommended'])?$_POST['is_recommended']:'';
			$options['status'] = ($_POST['status'])?$_POST['status']:'';

			if(Products::updateProductById($id, $options)){
				if(is_uploaded_file($_FILES['image']['tmp_name'])){
					move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");
					
				}
			}

			header("Location: /admin/product");
		}
		require_once(ROOT.'/views/admin_product/update.php');
		return true;
	}

	public function actionDelete($id)
	{
		self::checkAdmin();

		if(isset($_POST['delete'])){
			Products::deleteProductById($id);

			header('Location: /admin/product');
		}

		require_once(ROOT."/views/admin_product/delete.php");
		return true;
	}
}