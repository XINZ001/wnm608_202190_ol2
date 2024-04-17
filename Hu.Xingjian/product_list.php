<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Iist</title>
	<?php include "parts/meta.php"; ?>
</head>

<body>
	
	<?php include "parts/navbar.php"; ?>

	<div class="container">
		
			<h2>Product List</h2>
		
			<?php

			include_once "lib/php/functions.php";
			include_once "parts/templates.php";

			$result = makeQuery(
				makeConn(),
				"
				SELECT * 
				FROM `products`
				ORDER BY `size` DESC
				LIMIT 12
				");

			echo "<div class='productlist grid gap'>",array_reduce($result, 'productListTemplate'),"</div>";
			



			?>



		
	</div>


</body>

</htmlP