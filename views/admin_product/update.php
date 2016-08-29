<? require_once(ROOT.'/views/layouts/header_admin.php'); ?>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <oi class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Изменить товар</li>
                </oi>
            </div>

            <h4>Изменить товар</h4>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Название товара</p>
                        <input type="text" name="name" placeholder="" value="<?=$product['name']?>">
                        <p>Seo Title</p>
                        <input type="text" name="title" placeholder="" value="<?=$product['title']?>">
                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="" value="<?=$product['code']?>">
                        <p>Стоимость, грн</p>
                        <input type="text" name="price" placeholder="" value="<?=$product['price']?>">
                        <p>Категория</p>
                        <select name="cat_id">
                            <? if(is_array($categoriesList)): ?>
                                <? foreach($categoriesList as $category): ?>
                                    <option value="<?= $category['id']?>" <? if($product['cat_id'] == $category['id']) echo 'selected="selected"'; ?>>
                                        
                                        <?= $category['name']?>
                                    </option>
                                <? endforeach; ?>
                            <? endif; ?>
                        </select>
                        <p>Производитель</p>
                        <input type="text" name="brand" placeholder="" value="<?=$product['brand']?>">
                        <p>Изображение товара</p>
                        <img src="<?=Products::getImage($product['id'])?>" width="200" alt="">
                        <input type="file" name="image" placeholder="" value="">
                        <p>Детальное описание</p>
                        <textarea name="description"><?=$product['description']?></textarea>
                        <p>Краткое описание</p>
                        <textarea name="seo_description"><?=$product['seo_description']?></textarea>
                        <br><br>
                        <p>Наличие на складе</p>
                        <select name="availability">
                            <option value="1" <? if($product['availability'] == 1) echo 'selected="selected"'; ?>>Да</option>
                            <option value="0" <? if($product['availability'] == 0) echo 'selected="selected"'; ?>>Нет</option>
                        </select>
                        <br><br>
                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" <? if($product['is_new'] == 1) echo 'selected="selected"'; ?>>Да</option>
                            <option value="0" <? if($product['is_new'] == 0) echo 'selected="selected"'; ?>>Нет</option>
                        </select>
                        <br><br>
                        <p>Рекомендуемые</p>
                        <select name="is_recommended">
                            <option value="1" <? if($product['is_recommended'] == 1) echo 'selected="selected"'; ?>>Да</option>
                            <option value="0" <? if($product['cat_id'] == 0) echo 'selected="selected"'; ?>>Нет</option>
                        </select>
                        <br><br>
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <? if($product['status'] == 1) echo 'selected="selected"'; ?>>Включен</option>
                            <option value="0" <? if($product['status'] == 0) echo 'selected="selected"'; ?>>Выключен</option>
                        </select>
                        <br><br>
                        <input type="submit" name="update" class="btn btn-default" value="Сохранить">
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

<? require_once(ROOT.'/views/layouts/footer_admin.php'); ?>