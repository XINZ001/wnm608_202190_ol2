<?php
	include_once "lib/php/functions.php";
	include_once "parts/templates.php";

	//$cart = makeQuery(makeConn(),"SELECT * FROM products WHERE id IN (1, 2, 5);")

	$cart_items = getCartItems();
	//print_p($cart_items);
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart Page</title>
	<?php include "parts/meta.php"; ?>
</head>

<body>
	
	<?php include "parts/navbar.php"; ?>

	<div class="container">
		<div class="card soft">
			<h2>In Your Cart</h2>
			<div class="grid gap">
				<div class="col-xs-12 col-md-7">
					<div class="card soft">
						<?= array_reduce($cart_items, 'cartListTemplate')?>
					</div>
				</div>
				<div class="col-xs-12 col-md-12 col-lg-5">
				
					<?= cartTotals()?>
				  	<div id="checkout_btn" class="form-control">
		            	<a class="form-button" href="product_checkout.php">Check Out</a>
		        	</div>
		        
				</div>
			</div>

		</div>
	</div>


</body>

</htmlP