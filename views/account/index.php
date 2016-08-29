<? include ROOT.'/views/layouts/header.php'; ?>

    <div id="content" class="container">
        <h1>Личный кабинет</h1>
        <h3>Привет, <?=ucfirst($user['name'])?></h3>
        <p><a href="edit/">Редактировать учетную запись</a></p>
        <p><a href="/account/orders/">Просмотр заказов</a></p>
    </div>

<? include ROOT.'/views/layouts/footer.php'; ?>