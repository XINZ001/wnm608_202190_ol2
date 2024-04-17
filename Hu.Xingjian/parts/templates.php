<?php

function productListTemplate($r,$o) {
return $r.<<<HTML
	<a class="col-xs-12 col-md-4 productlist" href="product_item.php?id=$o->id">
		<figure class="figure product">
			<img src="./img/$o->thumbnail"  alt=""/>
			<figcaption>
				<div>
					<div>$o->name</div>
					<div>&dollar;$o->price</div>
				</div>
			</figcaption>
		</figure>
	</a>
HTML;
}

function cartListTemplate($r,$o) {
	$totalFixed = number_format($o->total,2,'.','');
	$selectamount = selectAmount($o->amount, 10);
	return $r.<<<HTML
		<div class="display-flex">
			<div class="flex-none images-thumbs">
				<div>
					<img src="./img/$o->thumbnail" />
				</div>
			</div>
			<div class="flex-stretch card-product-section">
				<strong>$o->name</strong>
				<form action="cart_actions.php?action=update-cart-item" method="post" onchange="this.submit()">
					<input type="hidden" name="id" value="$o->id">
					<div class="form-select" style="font-size:0.8em">
						$selectamount
					</div>
				</form>
				<form id="cart_delete_btn" action="cart_actions.php?action=delete-cart-item" method="post">
					<input type="hidden" name="id" value="$o->id">
					<input type="submit" class="form-button inline" value="Delete" style="font-size:0.8em">
				</form>
			</div>
			<div class="flex-none card-product-section cart-product-price">
				<strong>$totalFixed</strong>
				<div>$o->amount x &dollar;$o->price</div>
			</div>
		</div>
	HTML;
}





?>

