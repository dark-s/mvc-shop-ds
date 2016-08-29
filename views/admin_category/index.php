<? require_once(ROOT.'/views/layouts/header_admin.php'); ?>

    <section>
        <div class="container">
            <div class="row"><br>

                <div class="breadcrumbs">
                    <oi class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление категориями</li>
                    </oi>
                </div>

                <h4>Список товаров</h4>

                <p><a href="/admin/category/create" class="btn btn-default back"><i class="fa fa-plus"></i>Добавить Категорию</a></p>

                <br>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID категории</th>
                        <th>Название</th>
                        <th>Сортировка</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <? foreach($categoriesList as $category): ?>
                        <tr>
                            <td><?= $category['id'] ?></td>
                            <td><?= $category['name'] ?></td>
                            <td><?= $category['sort_order'] ?></td>
                            <td><a href="/admin/category/update/<?=$category['id']?>" title="Редактировать"><i class="fa fa-pencil-square"></i></a></td>
                            <td><a href="/admin/category/delete/<?=$category['id']?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <? endforeach; ?>
                </table>
            </div>
        </div>
    </section>

<? require_once(ROOT.'/views/layouts/footer_admin.php'); ?>