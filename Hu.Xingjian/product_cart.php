<?php
	include_once "lib/php/functions.php";

	$cart = makeQuery(makeConn(),"SELECT * FROM products WHERE id IN (1, 2, 5);")
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
						<?= array_reduce($cart, function($r,$o){return $r."<div>$o->name</div>";})?>
					</div>
				</div>
			</div>
			
			<p><a href="product_checkout.php">Checkout</p>

		</div>
	</div>


</body>

</htmlP