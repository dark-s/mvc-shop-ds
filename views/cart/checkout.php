<? include ROOT.'/views/layouts/header.php'; ?>

    <div id="content" class="container">
        <div class="row">
            <h1>Оформление заказа</h1>
            <? if($result): ?>
                <p>Заказ оформлен. Мы Вам перезвоним.</p>
            <? else: ?>
                <p>Выбрано товаров: <?=$totalQuantity?>, на сумму: <?=$totalPrice?> грн</p>
                <? if(isset($errors) && is_array($errors)): ?>
                    <ul>
                        <? foreach($errors as $error): ?>
                            <li><?=$error?></li>
                        <? endforeach; ?>
                    </ul>
                <? endif ?>
                <div class="col-md-9">
                    <form name="login_form" method="post" action="">
                        <div class="form-group">
                            <label for="checkout_name">Имя</label>
                            <input type="text" name="name" class="form-control" id="checkout_name" placeholder="Укажите Ваше имя" value="<?=$userName?>">
                        </div>
                        <div class="form-group">
                            <label for="checkout_phone">Телефон</label>
                            <input type="phone" name="phone" class="form-control" id="checkout_phone" placeholder="Укажите Ваш номер телефона" value="<?=$userPhone?>">
                        </div>
                        <div class="form-group">
                            <label for="checkout_country">Страна</label>
                            <input type="text" name="country" class="form-control" id="checkout_country" placeholder="Укажите Вашу страну" value="<?=$userCountry?>">
                        </div>
                        <div class="form-group">
                            <label for="checkout_city">Город</label>
                            <input type="text" name="city" class="form-control" id="checkout_city" placeholder="Укажите Ваш город" value="<?=$userCity?>">
                        </div>
                        <div class="form-group">
                            <label for="checkout_address">Адрес</label>
                            <input type="text" name="address" class="form-control" id="checkout_address" placeholder="Укажите Ваш адрес доставки" value="<?=$userAddress?>">
                        </div>
                        <div class="form-group">
                            <label for="checkout_index">Почтовый индекс</label>
                            <input type="text" name="index" class="form-control" id="checkout_index" placeholder="Укажите Ваш почтовый индекс" value="<?=$userIndex?>">
                        </div>
                        <div class="form-group">
                            <label for="checkout_comment">Комментарий</label>
                            <input type="text" name="comment" class="form-control" id="checkout_comment" placeholder="Укажите Ваш комментарий" value="<?=$userComment?>">
                        </div>
                        <button type="submit" name="checkout" class="btn btn-info center-block">Офоримить заказ</button>
                    </form>
                </div>
            <? endif; ?>
        </div>
    </div>

<? include ROOT.'/views/layouts/footer.php'; ?>