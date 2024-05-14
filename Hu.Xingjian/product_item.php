<?php
include_once "lib/php/functions.php";
include_once "parts/templates.php";
$product = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id`=" .$_GET['id'])[0];
$images = explode(",", $product->images);
$image_elements = array_reduce($images, function($r, $o){
return $r."<img src='/images/$o'/>";


})


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Item</title>
	<?php include "parts/meta.php"; ?>


</head>

<body>
	
	<?php include "parts/navbar.php"; ?>

	<main>
		<div class="container margint">
			<div class="container">
				<div class="grid gap">
					<div class="col-xs-12 col-md-5 product-item">
						<div class="display-flex display-direction-column product-item-images">
							<div class="images-main">
								<img src="img/<?= $product->thumbnail?>" />
							</div>
							
						</div>
					</div>
					<div class="col-xs-12 col-md-7 product-item" >
						<form class="product-item-form" method="post" action="cart_actions.php?action=add-to-cart">

							<input type="hidden" name="product-id" value="<?= $product->id ?>"/>
							<div class="display-flex vertical">
								<div class="flex-none">
									<h2 class="product-name product-item"><?= $product->name?></h2>
									<div class="product-description"><?= $product->description?>
									</div>
																				
								
							</div>
	
							<div class="flex-stretch"></div>

							<div class="flex-none">
								<div class="display-flex product-item">
									<h2 class="flex-none product-price "><span>Price:</span> &dollar;<?= $product->price?></h2>

									<div class="flex-stretch"></div>
									<h2 class="flex-none product-size"><span>Size:</span> <?= $product->size?></h2>
								</div>
								<div>
									<div class="form-select">
										<select id="product-amount" name="product-amount">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
										</select>
									</div>
								</div>
	
								<div class="form-control">
									<input type="submit" class="form-button" value="Add to Cart" />
									
								</div>
							</div></div>

						
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="card soft">
			<h2 class="product-item">Primary Benefits</h2>
			<div class="product-list"><?= $product->primary_benefits?></div>
			</div>

		</div>

		<div class="container">
			<div class="card soft">
			<h2 class="product-item">Uses</h2>
			<div class="product-list" ><?= $product->uses?></div>
			</div>

		</div>

		<div class="container">
			<div class="card soft">
			<h2 class="product-item">Directions for use</h2>
			<div ><?= $product->directions_for_use?></div>
			</div>

		</div>

	<div class="container">
			<div class="card soft">
			<h2 class="product-item">Cautions</h2>
			<div ><?= $product->cautions?></div>
			</div>

		</div>
		
	</main>	

	<div class="container">
			<h2>Recomanded Products</h2>
			<?php 
			recommendedSimilar($product->category,$product->id);
			?>
		</div>


</body>

</html>











