<? include ROOT.'/views/layouts/header.php'; ?>

    <div id="content" class="float_r">
    <h1>Корзина товаров</h1>
    <? if($productsInCart): ?>
        <table width="680px" cellspacing="0" cellpadding="5">
       	    <tr bgcolor="#ddd">
            	<th width="180" align="left"> </th> 
            	<th colspan="2" width="220" align="left">Название </th> 
           	  	<th width="100" align="center">Кол-во </th> 
            	<th width="90" align="right">Цена </th> 
            	<th width="90" align="right">Всего </th> 
            	<!-- <th width="90"> </th> -->
                
            </tr>
        	<? foreach($products as $product): ?>
                <tr>
                	<td><a href="/product/<?=$product['id']?>"><img class="cart-img" src="<?=Products::getImage($product['id'])?>" alt="<?=$product['name']?>" width="100px" height="auto" /></a></td> 
                	<td><?=$product['name']?></td> 
                    <td colspan="2" align="left"><a href="/product/<?=$product['id']?>"><input type="text" value="<?=$productsInCart[$product['id']]?>" style="width: 20px; text-align: right" /></a> </td>
                    <td align="left"><?=$product['price']?> грн</td> 
                    <td align="left"><?=$product['price'] * $productsInCart[$product['id']]?> грн</td>
                    <td align="center"> <a href="/cart/delete/<?=$product['id']?>"><img src="/template/images/remove_x.gif" alt="remove" /><br />Удалить</a> </td>
    			</tr>
            <? endforeach; ?>
            <tr>
                <td colspan="3" align="center" height="30px"></td>
                <td align="center" style="background:#ddd; font-weight:bold"> Итого: </td>
                <td colspan="2" align="center" style="background:#ddd; font-weight:bold"><?=$totalPrice?> грн</td>
			</tr>
		</table>
        <div style="margin-top: 20px;">
        
        <span class="col-md-5"><a href="javascript:history.back()" class="btn btn-info pull-left" style="color:#fff;width:150px">Продолжить покупки</a></span>
        <span class="col-md-5"><a href="/cart/checkout/" class="btn btn-info pull-right" style="color:#fff;width:150px">Оформить заказ</a></span>
        	
        </div>
    <? else: ?>
        <p>Ваша корзина пуста.</p>
    <? endif; ?>
    </div>

<? include ROOT.'/views/layouts/footer.php'; ?>