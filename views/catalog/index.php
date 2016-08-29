<? include ROOT.'/views/layouts/header.php'; ?>

        <div id="content" class="float_r">
            <h1>Каталог товаров</h1>
            <? foreach($latestProducts as $lproduct): ?>
                <div class="product_box">
                    <h3>
                        <?=$lproduct['name']?>
                        <? if($lproduct['is_new'] && $lproduct['is_new'] == 1): ?>
                            <span style="color:red">[NEW]</span>
                        <? endif; ?>
                    </h3>
                    <a href="/product/<?=$lproduct['id']?>"><img src="<?=Products::getImage($lproduct['id'])?>" style="width: 100%; height: auto" alt="Shoes <?=$lproduct['id']?>" /></a>
                    <? if(isset($lproduct['seo_description'])): ?>
                    <p><?=$lproduct['seo_description']?></p>
                    <? endif; ?>
                    <p class="product_price"><?=$lproduct['price']?> грн.</p>
                    <a href="/cart/addAjax/<?=$lproduct['id']?>" class="addtocart add" data-id="<?=$lproduct['id']?>"></a>
                    <a href="/product/<?=$lproduct['id']?>" class="detail"></a>
                </div>
            <? endforeach; ?>
        </div>

<? include ROOT.'/views/layouts/footer.php'; ?>