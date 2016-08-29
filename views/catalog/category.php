<? include ROOT.'/views/layouts/header.php'; ?>

    <div id="content" class="float_r">
        <h1>Каталог товаров</h1>
        <? foreach($categoryProducts as $product): ?>
            <div class="product_box">
                <h3>
                    <?=$product['name']?>
                    <? if($product['is_new'] && $product['is_new'] == 1): ?>
                        <span style="color:red">[NEW]</span>
                    <? endif; ?>
                </h3>
                <a href="/product/<?=$product['id']?>"><img src="<?=Products::getImage($product['id'])?>" style="width: 100%; height: auto" alt="Shoes <?=$product['id']?>" /></a>
                <? if(isset($product['seo_description'])): ?>
                <p><?=$product['seo_description']?></p>
                <? endif; ?>
                <p class="product_price"><?=$product['price']?> грн.</p>
                <a href="/cart/addAjax/<?=$product['id']?>" class="addtocart add" data-id="<?=$product['id']?>"></a>
                <a href="/product/<?=$product['id']?>" class="detail"></a>
            </div>
        <? endforeach; ?>
        <? echo $pagination->get(); ?>
    </div>

<? include ROOT.'/views/layouts/footer.php'; ?>