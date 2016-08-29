<? require_once(ROOT.'/views/layouts/header_admin.php'); ?>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <oi class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Создать товар</li>
                </oi>
            </div>
            <br>
            <h4>Создать товар</h4>
            <div class="col-lg-4">
                <div class="create-form">
                    <form action="/admin/product/create" method="post" enctype="multipart/form-data">
                        <p>Название товара</p>
                        <input type="text" name="name" placeholder="" value="">
                        <p>Seo Title</p>
                        <input type="text" name="title" placeholder="" value="">
                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="" value="">
                        <p>Стоимость, грн</p>
                        <input type="text" name="price" placeholder="" value="">
                        <p>Категория</p>
                        <select name="cat_id">
                            <? if(is_array($categoriesList)): ?>
                                <? foreach($categoriesList as $category): ?>
                                    <option value="<?= $category['id']?>">
                                        <?= $category['name']?>
                                    </option>
                                <? endforeach; ?>
                            <? endif; ?>
                        </select>
                        <p>Производитель</p>
                        <input type="text" name="brand" placeholder="" value="">
                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">
                        <p>Детальное описание</p>
                        <textarea name="description"></textarea>
                        <p>Краткое описание</p>
                        <textarea name="seo_description"></textarea>
                        <br><br>
                        <p>Наличие на складе</p>
                        <select name="availability">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <br><br>
                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <br><br>
                        <p>Рекомендуемые</p>
                        <select name="is_recommended">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <br><br>
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Включен</option>
                            <option value="0">Выключен</option>
                        </select>
                        <br><br>
                        <input type="submit" name="create" class="btn btn-default" value="Создать">
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

<? require_once(ROOT.'/views/layouts/footer_admin.php'); ?>