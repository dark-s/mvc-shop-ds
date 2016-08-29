<? include ROOT.'/views/layouts/header.php'; ?>

    <div id="content" class="container">
        <h1>Авторизация</h1>
        <? if(isset($errors) && is_array($errors)): ?>
            <ul>
                <? foreach($errors as $error): ?>
                    <li><?=$error?></li>
                <? endforeach; ?>
            </ul>
        <? endif ?>
        <form name="login_form" method="post" action="">
            <div class="form-group">
                <label for="login_email">Email адрес</label>
                <input type="email" name="email" class="form-control" id="login_email" placeholder="Email" value="<?=$email?>">
            </div>
            <div class="form-group">
                <label for="login_pass">Укажите пароль</label>
                <input type="password" name="pass" class="form-control" id="login_pass" placeholder="Пароль">
            </div>
            <button type="submit" name="login" class="btn btn-info center-block">Вход</button>
        </form>
    </div>

<? include ROOT.'/views/layouts/footer.php'; ?>