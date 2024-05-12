<?php

include "../lib/php/functions.php";

$empty_product = (object)[
		"name"=>"Basil Essential Oil",
		"price"=>"44.00",		
		"category"=>"Essential Oil",
		"description"=>"nothing",
		"size"=>"15 mL",
		"thumbnail"=>"oil_basil_thumb.png",
		"primary_benefits"=>"nothing",
		"uses"=>"nothing",
		"directions_for_use"=>"nothing",
		"cautions"=>"nothing"
	];

	//LOGIC

	try {
	$conn = makePDOConn();

		$actionName = isset($_GET['action']) ? $_GET['action'] : false;

			switch($actionName){

				case "update":
					$statement = $conn->prepare("UPDATE `products` SET 
						`name` = ?,
						`price`= ?,
						`category` = ?,
						`description` =?,
						`size` = ?,
						`thumbnail` = ?,
						`primary_benefits` = ?,
						`uses` = ?,
						`directions_for_use` = ?,
						`cautions` = ?,
						`date_modify`= NOW()
						WHERE `id` = ?
					");
					$statement->execute([
						$_POST['product-name'],
						$_POST['product-price'],
						$_POST['product-category'],
						$_POST['product-description'],
						$_POST['product-size'],
						$_POST['product-thumbnail'],
						$_POST['product-primary_benefits'],
						$_POST['product-uses'],
						$_POST['product-directions_for_use'],
						$_POST['product-cautions'],
						$_GET['id']				
					]);
										
					header("location:{$_SERVER['PHP_SELF']}?id={$_GET['id']}");
				break;
				
				case 'create':
					$statement = $conn->prepare("INSERT INTO `products`
						(
						`name` ,
						`price` ,
						`category` ,
						`description`  ,
						`size` ,
						`thumbnail` ,
						`primary_benefits` ,
						`uses` ,
						`directions_for_use` ,
						`cautions` ,
						`date_create` ,
						`date_modify`
						)
						VALUES (?,?,?,?,?,?,?,?,?,?,NOW(),NOW())
					");
					$statement->execute([
						$_POST['product-name'],
						$_POST['product-price'],
						$_POST['product-category'],
						$_POST['product-description'],
						$_POST['product-size'],
						$_POST['product-thumbnail'],
						$_POST['product-primary_benefits'],
						$_POST['product-uses'],
						$_POST['product-directions_for_use'],
						$_POST['product-cautions'],
					]);
					$id = $conn->lastInsertId();
					header("location:{$_SERVER['PHP_SELF']}?id=$id");
				break;

				case "delete":
					$statement = $conn->prepare("DELETE FROM `products` WHERE id=?");
					$statement->execute([$_GET['id']]);
					header("location:{$_SERVER['PHP_SELF']}");
				break;
			}
		}
 		catch(PDOException $e){
			die($e->getMessage());
		}


// Templates
function productListItem ($r, $o) {
return $r.<<<HTML
<div class="card soft prodict-edit-list">
<div class="display-flex">
<div class="flex-none images-thumbs"><img src="./img/$o->thumbnail"/></div>
<div class="display-flex gap individual-product-edit">
<div>$o->name</div>
<div><a href="{$_SERVER['PHP_SELF']}?id=$o->id" class="form-button" style=" width: 180px;">Edit</a></div>
</div>
</div>
</div>
HTML;
	}

	function showProductPage ($o) {


		$id = $_GET['id'];
		$addoredit = $id == "new" ? "Add" : "Edit";
		$createorupdate = $id == "new" ? "create" : "update";
		$images = array_reduce (explode(", ",$o->images), function ($r, $o){
			return $r."<img src='/images/$o'/>";});


$display  = <<<HTML
		<div>
			<h2>$o->name</h2>
			<div class="form-control">
				<strong>Name:</strong>
				<span>$o->name</span>
			</div>
			<div class="form-control">
				<strong>Price:</strong>
				<span>&dollar;$o->price</span>
			</div>
			<div class="form-control">
				<strong>Category:</strong>
				<span>$o->category</span>
			</div>
			<div class="form-control">
				<strong>Description:</strong>
				<span>$o->description</span>
			</div>
			<div class="form-control">
				<strong>Size:</strong>
				<span>$o->size</span>
			</div>
		

			<div class="form-control">
				<strong class="form-label">Product Thumbnail:</strong>
				<span class="images-thumbs" ><img src="./img/$o->thumbnail"/></span>
			</div>

			<div class="form-control">
				<strong class="form-label">Primary Benefits:</strong>
				<span>$o->primary_benefits</span>
			</div>
			<div class="form-control">
				<strong class="form-label">Uses:</strong>
				<span>$o->uses</span>
			</div>

			<div class="form-control">
				<strong class="form-label">Directions for use:</strong>
				<span>$o->directions_for_use</span>
			</div>

			<div class="form-control">
				<strong class="form-label">Cautions:</strong>
				<span>$o->cautions</span>
			</div>
			
		</div>
HTML;


$form = <<<HTML
	<form method="post" action="{$_SERVER['PHP_SELF']}?id=$id&action=$createorupdate">
		<h2>$addoredit Product</h2>
		<div class="form-control">
			<label for="" class="form-label" for="product-name">Product Name</label>
			<input type="text" placeholder="Enter the Product Name" class="form-input" name="product-name" id="product-name" value="$o->name" />
		</div>
		<div class="form-control">
			<label for="" class="form-label" for="product-price">Price</label>
			<input type="number" min="0" max="1000" step="0.01" placeholder="Enter the Product Price" class="form-input" name="product-price" id="product-price" value="$o->price" />
		</div>
		
		<div class="form-control">
			<label for="" class="form-label" for="product-category">Product Category</label>
			<input type="text" placeholder="Enter the Product Category" class="form-input" name="product-category" id="product-category" value="$o->category" />
		</div>
		<div class="form-control">
			<label for="" class="form-label" for="product-size">Product size</label>
			<input type="text" placeholder="Enter the Product size" class="form-input" name="product-size" id="product-size" value="$o->size" />
		</div>
		<div class="form-control">
			<label for="" class="form-label" for="product-description">Product Description</label>
			<textarea  placeholder="Enter the Product Description" class="form-input" name="product-description" id="product-description" >$o->description</textarea>
		</div>
		
		<div class="form-control">
			<label for="" class="form-label" for="product-thumbnail">Product Thumbnail</label>
			<input type="text" placeholder="Upload Thumbnail Image" class="form-input" name="product-thumbnail" id="product-thumbnail" value="$o->thumbnail" />
		</div>

		<div class="form-control">
			<label for="" class="form-label" for="product-primary_benefits">Primary Benefits</label>
			<textarea  placeholder="Enter the Primary Benefits" class="form-input" name="product-primary_benefits" id="product-primary_benefits" >$o->primary_benefits</textarea>
		</div>

		<div class="form-control">
			<label for="" class="form-label" for="product-uses">Uses</label>
			<textarea  placeholder="Enter the usage" class="form-input" name="product-uses" id="product-uses" >$o->uses</textarea>
		</div>

		<div class="form-control">
			<label for="" class="form-label" for="product-directions_for_use">Directions for use</label>
			<textarea  placeholder="Enter The Directions For Use" class="form-input" name="product-directions_for_use" id="product-directions_for_use" >$o->directions_for_use</textarea>
		</div>

		<div class="form-control">
			<label for="" class="form-label" for="product-cautions">Cautions</label>
			<textarea  placeholder="Enter The Cautions" class="form-input" name="product-cautions" id="product-cautions" >$o->cautions</textarea>
		</div>

		

		<div class="form-control">
			<input type="submit" id="adminProductSubmit" class="form-button" style='padding:0.3em 2em' value="{$createorupdate}">
		</div>
	</form>
HTML;

$output = $id == "new" ? "<div class='card soft'>$form</div>" :
"<div class='grid gap'>
	<div class='col-xs-12 col-md-7 card soft'>$display</div>
	<div class='col-xs-12 col-md-5 card soft'>$form</div>
</div>
";

$delete = $id =="new" ? "" : "<a href='{$_SERVER['PHP_SELF']}?id=$id&action=delete' class='form-button' style='padding:0.3em 2em'>Delete</a>";

		//heredoc
echo <<<HTML
	<nav class="nav nav-crumbs" style="margin: 1em 0;">
		<div class="display-flex">
			<div class="flex-stretch"><a href="{$_SERVER['PHP_SELF']}">< Back</a></div>
			<div class="flex-none">$delete</div>
		</div>
	</nav>
	$output
HTML;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "../parts/meta.php" ?>

	<!-- Page Title -->
	<title>Product Admin Page</title>
</head>
<body>
	<!-- admin page navigation bar -->
	<header class="navbar">
		 <div class="container display-flex flex-align-center">
		 	<div class="flax-none"><h1>Product Admin</h1></div>
		 	<div class="flex-stretch"></div>
		 	<nav class="nav nav-flex flax-none">
		 		<ul>
		 			<li><a href="<?= $_SERVER['PHP_SELF'] ?>">Product List</a></li>
		 			<li><a href="<?= $_SERVER['PHP_SELF'] ?>?id=new">Add New Product</a></li>
		 		</ul>
		 	</nav>
		 </div>
	</header>

	<div class="container">
		
		<?php

			if(isset($_GET['id'])){
				echo showProductPage(
					$_GET['id'] == "new"? 
					$empty_product :
					makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0]);

			}else{	

		?>
		<h2>Product List</h2>
		<div class='display-flex gap prodict-edit-list-container'>
			<?php
				
			$result = makeQuery(makeConn(), "SELECT * FROM `products`ORDER BY `date_create` DESC");

			echo array_reduce($result, 'productListItem');

			}
				
			?>
		</div>

	</div>
</body>