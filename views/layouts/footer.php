<div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<div id="templatemo_footer">
    <p><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">About</a> | <a href="#">FAQs</a> | <a href="#">Checkout</a> | <a href="#">Contact Us</a>
    </p>

    Copyright © 2072 <a href="#">Your Company Name</a> <!-- Credit: www.templatemo.com -->

</div> <!-- END of templatemo_footer -->

</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

<div class="hidden">
	<div id="modal-cart" class="box-modal">
		<div class="box-modal_close arcticmodal-close">X</div>
		<div class="success-text">
			<p>Товар успешно добавлен в корзину.</p>
		</div>
		<div>
			<a href="#" class="btn btn-default continue-btn arcticmodal-close">Продолжить покупки</a>
		</div>
		<div>
			<a href="/cart/checkout/" class="btn btn-default checkout-btn">Оформить заказ</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.addtocart').click(function(){
			var id = $(this).attr("data-id");
			$.post("/cart/addAjax/"+id,{}, function(data){
				$("#cart-quantity").html(data);
			});
			return false;
		});
		$('.add').click(function(){
			var c = $('#modal-cart');
		    c.html($('.b-text').html());
		    $.arcticmodal({
		        content: c
			});
		});
	});
</script>

</body>
</html>