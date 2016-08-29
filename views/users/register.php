<? include ROOT.'/views/layouts/header.php'; ?>

    <div id="content" class="container">
        <h1>Регистрация</h1>
        <? if(isset($result) && $result == true): ?>
            <p>Вы успешно зарегистрированы!</p>
        <? else: ?>
            <? if(isset($errors) && is_array($errors)): ?>
                <ul>
                    <? foreach($errors as $error): ?>
                        <li><?=$error?></li>
                    <? endforeach; ?>
                </ul>
            <? endif ?>
            <form name="reg_form" method="post" action="">
                <div class="form-group">
                    <label for="reg_name">Укажите имя</label>
                    <input type="text" name="name" class="form-control" id="reg_name" placeholder="Имя" value="<?=$name?>">
                </div>
                <div class="form-group">
                    <label for="reg_email">Email адрес</label>
                    <input type="email" name="email" class="form-control" id="reg_email" placeholder="Email" value="<?=$email?>">
                </div>
                <div class="form-group">
                    <label for="reg_pass">Укажите пароль</label>
                    <input type="password" name="pass" class="form-control" id="reg_pass" placeholder="Пароль">
                </div>
                <button type="submit" name="register" class="btn btn-info center-block">Зарегистрироваться</button>
            </form>
        <? endif; ?>
    </div>

<? include ROOT.'/views/layouts/footer.php'; ?>