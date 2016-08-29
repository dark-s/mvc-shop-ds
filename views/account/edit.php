<? include ROOT.'/views/layouts/header.php'; ?>

    <div id="content" class="container">
        <h1>Редактирование данных</h1>
        <? if(isset($result) && $result == true): ?>
            <p>Данные изменены!</p>
        <? else: ?>
        <? if(isset($errors) && is_array($errors)): ?>
            <ul>
                <? foreach($errors as $error): ?>
                    <li><?=$error?></li>
                <? endforeach; ?>
            </ul>
        <? endif ?>
        <form name="edit_form" method="post" action="">
            <div class="form-group">
                    <label for="edit_name">Укажите новое имя</label>
                    <input type="text" name="name" class="form-control" id="edit_name" placeholder="Имя" value="<?=$name?>">
                </div>
            <div class="form-group">
                <label for="edit_pass">Укажите новый пароль</label>
                <input type="password" name="pass" class="form-control" id="edit_pass" placeholder="Пароль">
            </div>
            <button type="submit" name="edit" class="btn btn-info center-block">Изменить</button>
        </form>
        <? endif; ?>
    </div>

<? include ROOT.'/views/layouts/footer.php'; ?>