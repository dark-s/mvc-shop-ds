<? include ROOT.'/views/layouts/header.php'; ?>

            <div id="content" class="float_r">
                <h1><?=$product['name']?></h1>
                <div class="content_half float_l">
                    <a  rel="lightbox[portfolio]" href="/template/images/product/<?=$product['image']?>"><img src="<?=Products::getImage($product['id'])?>" alt="image" /></a>
                </div>
                <div class="content_half float_r">
                    <table>
                        <tr>
                            <td width="160">Цена:</td>
                            <td><?=$product['price']?> грн.</td>
                        </tr>
                        <tr>
                            <td>Наличие:</td>
                            <td><?=$product['availability']?></td>
                        </tr>
                        <tr>
                            <td>Брэнд:</td>
                            <td><?=$product['brand']?></td>
                        </tr>
                    </table>
                    <div class="cleaner h20"></div>

                    <a href="/cart/addAjax/<?=$product['id']?>" class="addtocart add" data-id="<?=$product['id']?>"></a>

                </div>
                <div class="cleaner h30"></div>
                
                <? if(isset($product['desctiption'])): ?>
                <h5>Описание</h5>
                <p><?=$product['desctiption']?></p>
                <? endif; ?>

                <div class="cleaner h50"></div>

             <? if(isset($recommendedProducts) && count($recommendedProducts) > 0): ?>
                <h3>Рекомендуемые товары</h3>
                <? foreach($recommendedProducts as $rec_product): ?>
                <div class="product_box">
                    <a href="/product/<?=$rec_product['id']?>"><img src="<?=Products::getImage($rec_product['id'])?>" alt="" /></a>
                    <h3><a href="/product/<?=$rec_product['id']?>"><?=$rec_product['name']?></a></h3>
                    <p class="product_price"><?=$rec_product['price']?> грн.</p>
                    <a href="/cart/addAjax/<?=$rec_product['id']?>" class="addtocart add" data-id="<?=$rec_product['id']?>"></a>
                    <a href="/product/<?=$rec_product['id']?>" class="detail"></a>
                </div>
                <? endforeach; ?>
             <? endif; ?>
            </div>

<? include ROOT.'/views/layouts/footer.php'; ?>