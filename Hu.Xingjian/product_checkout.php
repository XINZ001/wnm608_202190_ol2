<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout Page</title>
	<?php include "parts/meta.php"; ?>
</head>

<body>
	
	<?php include "parts/navbar.php"; ?>

	<div class="container">
		<div class="card soft">
			<div class="col-xs-12 col-md-7">
			<div class="checkOutForm">
				<h2 class="form-legend">Product Checkout</h2>
				<p class="form-legal"><span class="form-indicator">*</span> Indicates required field</p>
				<div class="gapL"></div>
				<form id="checkout-form">
					<h3>ADDRESS</h3>
					<div class="form-control">
						<label for="address_street" class="form-label">Street<span class="form-indicator">*</span></label>
						<input id="address_street" type="text" class="form-input interactive"/>
						
					</div>
					<div class="form-control">
						<div class="grid gap">
							<div class="col-xs-12 col-md-6">
								<label for="address_city" class="form-label interactive">City<span class="form-indicator">*</span></label>
								<input id="address_city" type="text" class="form-input interactive"/>
							</div>
							<div class="col-xs-12 col-md-6">
								<label for="address_state" class="form-label">State<span class="form-indicator">*</span></label>
								<input id="address_state" type="text" class="form-input interactive"/>
								
							</div>
						</div>
					</div>
					<div class="form-control">
						<div class="grid gap">
							<div class="col-xs-12 col-md-6">
								
								<label for="address_zip" class="form-label">Zip Code<span class="form-indicator">*</span></label>
								<input id="address_zip" type="text" class="form-input interactive"/>
							</div>
							<div class="col-xs-12 col-md-6">
								
								<label for="address_country" class="form-label">Country<span class="form-indicator">*</span></label>
								<input id="address_country" type="text" class="form-input interactive"/>
							</div>
						</div>
					</div>
				<div class="gapL"></div>

					<div class="line"></div>

					<h3>PAYMENT</h3>

					<div class="form-control">
						<label for="payment_name" class="form-label">Full Name<span class="form-indicator">*</span></label>
						<input id="payment_name" type="text" class="form-input interactive"/>
						
					</div>
					<div class="form-control">
						<label for="payment_number" class="form-label">Card Number<span class="form-indicator">*</span></label>
						<input id="payment_number" type="text" class="form-input interactive"/>
						
					</div>
					<div class="form-control">
						<div class="grid gap">
							<div class="col-xs-12 col-md-6">
								<label for="payment_expiration" class="form-label">Expiration Date<span class="form-indicator">*</span></label>
								<input id="payment_expiration" type="text" class="form-input interactive"/>
								
							</div>
							<div class="col-xs-12 col-md-6">
								<label for="payment_cvv" class="form-label">CVV<span class="form-indicator">*</span></label>
								<input id="payment_cvv" type="text" class="form-input interactive"/>
								
							</div>
						</div>
					</div>
					<div class="form-control col-xs-12 col-md-6">
						<label for="payment_zip" class="form-label">Zip Code<span class="form-indicator">*</span></label>
						<input id="payment_zip" type="text" class="form-input interactive"/>
						
					</div>

					<div class="form-control">
						<a class="form-button" href="product_confirmation.php">Complete Check Out</a>
					</div>

				</form>
			</div>
		</div>

		</div>
	</div>


</body>

</htmlP