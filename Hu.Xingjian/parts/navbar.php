<?php

include_once "lib/php/functions.php";

?>

<header class="navbar">
		<div class="container display-flex flex-align-center">
			<div class="flex-none">
				<div class="logo"><a href="index.php">Essential Oils Shop</a></div>
			</div>
			<div class="flex-stretch"></div>
			
			   <div class="menu-button">
        <label for="menu">☰ Menu</label>
    </div>

			<nav class="nav nav-flex flex-none">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="product_list.php">Oils Store</a></li>
					<li>
						<a href="product_cart.php">
							<span>Cart</span>
							<span class="badge"><?= makeCartBadge(); ?></span>
						</a>
					</li>
				</ul>
			</nav>
		</div>

	</header>

	<script>document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.querySelector('.menu-button label');
    const nav = document.querySelector('.navbar .nav');

    menuButton.addEventListener('click', function() {
        nav.classList.toggle('active');
    });
});</script>