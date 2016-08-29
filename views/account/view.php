<? include ROOT.'/views/layouts/header.php'; ?>

    <div id="content" class="container">
        <h1>Детали заказа</h1>

        <br/>
        
        <h5>Информация о заказе</h5>
            <table class="table-small table-bordered table-striped table">
                <tr>
                    <td>Номер заказа</td>
                    <td><?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Имя</td>
                    <td><?php echo $order['name']; ?></td>
                </tr>
                <tr>
                    <td>Телефон</td>
                    <td><?php echo $order['phone']; ?></td>
                </tr>
                <tr>
                    <td>Комментарий</td>
                    <td><?php echo $order['comment']; ?></td>
                </tr>
                <?php if ($order['user_id'] != 0): ?>
                    <tr>
                        <td>ID</td>
                        <td><?php echo $order['user_id']; ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><b>Статус заказа</b></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <td><b>Дата заказа</b></td>
                    <td><?php echo $order['date']; ?></td>
                </tr>
            </table>

            <h5>Товары в заказе</h5>

            <table class="table-medium table-bordered table-striped table ">
                <tr>
                    <th>ID товара</th>
                    <th>Артикул товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?> грн.</td>
                        <td><?php echo $productsQuantity[$product['id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/account/orders/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
    </div>

<? include ROOT.'/views/layouts/footer.php'; ?>