<? require_once(ROOT.'/views/layouts/header_admin.php'); ?>

    <section>
        <div class="container">
            <div class="row"><br>

                <div class="breadcrumbs">
                    <oi class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление товарами</li>
                    </oi>
                </div>
                
                <h4>Список товаров</h4>

                <p><a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i>Добавить товар</a></p>

                <br>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID товара</th>
                        <th>Артикул</th>
                        <th>Название товара</th>
                        <th>Цена</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <? foreach($productsList as $product): ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><?= $product['code'] ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><a href="/admin/product/update/<?=$product['id']?>" title="Редактировать"><i class="fa fa-pencil-square"></i></a></td>
                            <td><a href="/admin/product/delete/<?=$product['id']?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <? endforeach; ?>
                </table>
            </div>
        </div>
    </section>

<? require_once(ROOT.'/views/layouts/footer_admin.php'); ?>