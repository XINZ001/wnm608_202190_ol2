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

function selectAmount($amount=1, $total=10){
	$output = "<select name='amount'>";
	for($i=1; $i<=$total;$i++){
		$output .= "<option ".($i==$amount?"selected":"").">$i</option>";
	}
	
	$output .= "</select>";
	return $output;
}

function cartListTemplate($r,$o) {
$totalFixed = number_format($o->total,2,'.','');
$selectamount = selectAmount($o->amount, 10);
return $r.<<<HTML
	<div class="display-flex cart-item-style">
		<div class="flex-none images-thumbs">
			<div>
				<img src="./img/$o->thumbnail" />
			</div>
		</div>
		<div class="display-flex vertical card-product-section" style="gap: 10px;">
			<h2>$o->name</h2>
			<div class="display-flex" style="gap: 4px;">
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

			<h2>$ $totalFixed</h2>

			<p style="color: var(--color-neutral-medium);">$o->amount x &dollar;$o->price</p>
		</div>
	</div>
HTML;
}

function cartTotals() {
$cart = getCartItems();
$cart_price = array_reduce($cart, function($r, $o){return $r + $o->total;},0);
$priceFixed = number_format($cart_price,2,'.','');
$taxFixed = number_format($cart_price*0.13,2,'.','');
$taxedFixed = number_format($cart_price*1.13,2,'.','');
return <<<HTML
 <div class="card soft">
    <div class="card-section display-flex">
        <div class="flex-stretch"><strong>Sub Total</strong></div>
        <div class="flex-none">&dollar;$priceFixed</div>
    </div>
    <div class="card-section display-flex">
        <div class="flex-stretch"><strong>Taxes</strong></div>
        <div class="flex-none">&dollar;$taxFixed</div>
    </div>
    <div class="card-section display-flex">
        <div class="flex-stretch"><strong>Total</strong></div>
        <div class="flex-none">&dollar;$taxedFixed</div>
    </div>
</div>

HTML;
}

function recommendedProducts($a){
	$products = array_reduce($a, 'productListTemplate');
	echo <<<HTML

	<div class="grid gap productlist" id="bottom">$products</div>

	HTML;
}

function generalRecommendation($limit=3){
	$result = makeQuery(makeConn(), "SELECT * FROM `products` ORDER BY rand() DESC LIMIT $limit");

			recommendedProducts($result);
}
function recommendedCategory($cat, $limit=3){
	$result = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `category` = '$cat' ORDER BY `date_create` DESC LIMIT $limit");

			recommendedProducts($result);
}
function recommendedSimilar($cat,$id=0, $limit=3){
	$result = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `category` = '$cat' AND `id`<>$id ORDER BY rand() DESC LIMIT $limit");

			recommendedProducts($result);
}



?>

