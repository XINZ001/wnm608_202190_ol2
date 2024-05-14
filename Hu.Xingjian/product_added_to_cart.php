<?php
	include_once "lib/php/functions.php";

	$product = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id`=" .$_GET['id'])[0];

	$cart_product = cartItemById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "parts/meta.php" ?>

	<!-- Page Title -->
	<title>Landing Page</title>
</head>
<body>
	<?php include "parts/navbar.php" ?>
	<main class="container margint">
		<div class="card soft display-flex vertical" style="gap: 40px;">
			<div>
				<h2>You Added <?= $product->name ?> To Your Cart</h2>
				<p>There are now <?= $cart_product->amount ?> of <?= $product->name ?> in your cart</p>
			</div>

			<div class="display-flex" style="gap: 20px;">
			<a class="form-button" href="product_list.php">Continue Shopping</a>
			<a class="form-button" href="product_cart.php">Go to Cart</a>		
			</div>
		</div>
	</main>
	<div class="to_cart_footer">
		<?php include "parts/footer.php" ?>
	</div>
	<script src="js/main.js" type="text/javascript"></script>
</body>

</html>
