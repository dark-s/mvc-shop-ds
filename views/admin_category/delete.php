<? require_once(ROOT.'/views/layouts/header_admin.php'); ?>

    <section>
        <div class="container">
            <div class="row"><br>

                <div class="breadcrumbs">
                    <oi class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/product">Управление категориями</a></li>
                        <li class="active">Удалить категорию</li>
                    </oi>
                </div>

                <h4>Удалить категорию #<?=$id?></h4>

                <p>Вы действительно хотите удалить эту категорию?</p>

                <form method="post">
                    <input type="submit" name="delete" value="Удалить">
                </form>
            </div>
        </div>
    </section>

<? require_once(ROOT.'/views/layouts/footer_admin.php'); ?>