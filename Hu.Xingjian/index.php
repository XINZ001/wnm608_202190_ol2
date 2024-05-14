<?php

include_once "lib/php/functions.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	include "parts/meta.php";

	include_once "parts/templates.php";
	?>

	<!-- Page Title -->
	<title>Landing  Page</title>
</head>
<body>
	<?php include "parts/navbar.php" ?>
		<div class="margina" id="viewWindow">
		<div class="view-window" style="background-image: url(img/bg_01.png);"></div>
	</div>

	<div class="container margina">
	
		<h2 class="marginb">Featuring Products</h2>
				<?php

				$result = makeQuery(makeConn(),"SELECT * FROM `products` LIMIT 6"); 

				echo "<div id='bottom'><div class='grid gap'>" ,array_reduce($result, 'productListTemplate')."</div></div>";

				?>
	</div>


	<div class="container">
		<h2 class="marginb">Latest Products</h2>
		<?php recommendedCategory("Essential Oil")?>
	</div>



	
</body>
</html>