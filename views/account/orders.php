<? include ROOT.'/views/layouts/header.php'; ?>

    <div id="content" class="container">
        <h1>Список заказов</h1>

        <br/>
        
        <table class="table-bordered table-striped table">
            <tr>
                <th>Номер заказа</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Дата оформления</th>
                <th>Статус</th>
                <th></th>
            </tr>
            <?php foreach ($ordersList as $order): ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['name']; ?></td>
                    <td><?php echo $order['phone']; ?></td>
                    <td><?php echo $order['date']; ?></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>    
                    <td><a href="/account/orders/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i>Смотреть</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="/account/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
    </div>

<? include ROOT.'/views/layouts/footer.php'; ?>