<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
	echo "hello world";

	//variables
	$a = 5;
	echo $a;

	// string interpolation
	echo "<div>I have $a things</div>";

	echo '<div>I have $a things</div>';

	// Number
	// Integer
	$b = 15;

	//Float
	$b = 0.576;

	//string
	$name = "Yerguy2";

	//boolean
	$isOn = true;

	//math
	echo 5 + 4 - 2;


	// concatenation
	echo "<div> b + a", " = c </div>";
	echo "<div> $b + $a = ".($a + $b). "</div>";

	?>

	<?php  

	$firstname = "Xingjian";
	$lastname = "Hu";

	$fullname = "$firstname $lastname";


	echo $fullname;


	?>

	<?php 
	//superglobal
	// ?name=Joey
	echo "<div> My name is {$_GET['name']} </div>";

	//?name=Joey&type=h1
	echo "<{$_GET['type']}> My name is {$_GET['name']} </{$_GET['type']}>";

	 ?>

	 <?php 
	 //array
	 $colors = array("red","green","blue");
	 echo $colors[0];

	 echo "	
	 	<br>$colors[0]
	 	<br>$colors[1]
	 	<br>$colors[2]

	 ";
	 echo count($colors);




 ?>
 	<div style="color: <?= $colors[1] ?>">
	 This text is green 
	 </div>

	 <?php  
	 // Associative array
	 $colorAssociative = [
	 	"red" => "#f00",
	 	"green" => "#0f0",
	 	"blue" => "#00f"
	 ];

	 echo $colorAssociative['green'];
	 ?>

	 <hr>

	 <?php 
	//Casting

	$c = "$a";
	$d = $c*1;

	$colorsObject = (object)$colorAssociative;

	//echo $colorsObject;
	echo "<hr>";

	// Array Index Notation
	echo $colors[0]."<br>";
	echo $colorAssociative['red']."<br>";
	echo $colorAssociative[$colors[0]]."<br>";

	//object property notation
	echo $colorsObject -> red."<br>";
	echo $colorsObject -> {$colors[0]}."<br>";


	  ?>


	 <?php 

	 print_r($colors);
	 echo "<hr>";
	 print_r($colorAssociative);
	 echo "<hr>";
	 echo "<pre>",print_r($colorsObject),"</pre>";

	 // function
	 function print_p($v) {
	 	echo "<pre>",print_r($v),"</pre>";
	 }

	 print_p();

	 ?>


</body>
</html>













