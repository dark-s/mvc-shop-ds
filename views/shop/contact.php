<? include ROOT.'/views/layouts/header.php'; ?>

    <div id="content" class="container">
        <h1>Обратная связь</h1>
        <? if(isset($result) && $result == true): ?>
            <p>Письмо отправлено!</p>
        <? else: ?>
        <? if(isset($errors) && is_array($errors)): ?>
            <ul>
                <? foreach($errors as $error): ?>
                    <li><?=$error?></li>
                <? endforeach; ?>
            </ul>
        <? endif ?>
        <form name="contact_form" method="post" action="">
            <div class="form-group">
                    <label for="contact_email">Укажите Ваш E-mail</label>
                    <input type="email" name="email" class="form-control" id="contact_email" placeholder="E-mail">
                </div>
            <div class="form-group">
                <label for="mess">Сообщение:</label>
                <textarea name="mess" class="form-control" id="mess" placeholder="Введите сообщение"></textarea>
            </div>
            <button type="submit" name="send" class="btn btn-info center-block">Отправить письмо</button>
        </form>
        <? endif; ?>
    </div>

<? include ROOT.'/views/layouts/footer.php'; ?>