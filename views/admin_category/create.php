<? require_once(ROOT.'/views/layouts/header_admin.php'); ?>

    <div class="breadcrumbs">
        <oi class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/category">Управление категориями</a></li>
            <li class="active">Добавить категорию</li>
        </oi>
    </div>

    <h4>Добавить категорию</h4>

<? if(isset($errors) && is_array($errors)): ?>
    <ul>
        <? foreach($errors as $error): ?>
            <li> - <?=$error?></li>
        <? endforeach; ?>
    </ul>
<? endif; ?>
    <div class="col-lg-4">
        <div class="login-form">
            <form action="" method="post">
                <p>Название категории</p>
                <input type="text" name="name" placeholder="" value="">
                <p>Порядковый номер</p>
                <input type="text" name="sort_order" placeholder="" value="">
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

<? require_once(ROOT.'/views/layouts/footer_admin.php'); ?>