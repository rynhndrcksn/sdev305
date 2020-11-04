<?php
	include ('includes/head.html');
?>
<body>
<div class="container" id="main">

	<!-- jumbotron start -->
	<div class="jumbotron">
		<h1 class="display-4">Welcome to Poppa's Pizza</h1>
		<p class="lead">Serving the Green River community since 1970!</p>
	</div>

	<!-- order form -->
	<form id="pizza-form" method="post" action="confirmation.php">
		<fieldset class="form-group border p-2">
			<legend>Contact Info</legend>
			<div class="form-group">
				<label for="fname">First Name:</label>
				<input type="text" class="form-control" id="fname" name="fname">
				<span class="text-danger d-none" id="err-fname">* Please enter a first name.</span>
			</div>
			<div class="form-group">
				<label for="lname">Last Name:</label>
				<input type="text" class="form-control" id="lname" name="lname">
				<span class="text-danger d-none" id="err-lname">* Please enter a last name.</span>
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<textarea class="form-control" id="address" name="address" rows="3"></textarea>
				<span class="text-danger d-none" id="err-address">* Please enter a address.</span>
			</div>
		</fieldset>

		<fieldset class="form-group border p-2">
			<legend>Pickup or Delivery?</legend>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="method" id="pickup" value="pickup" checked>
				<label class="form-check-label" for="pickup">
					Pickup
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="method" id="delivery" value="delivery">
				<label class="form-check-label" for="delivery">
					Delivery
				</label>
			</div>
			<span class="text-danger d-none" id="err-method">* Please enter either pickup or delivery.</span>
		</fieldset>

		<fieldset class="form-group border p-2">
			<legend>Select your toppings</legend>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="olives" value="olives" name="toppings[]">
				<label class="form-check-label" for="olives">
					Olives
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="mushrooms" value="mushrooms" name="toppings[]">
				<label class="form-check-label" for="mushrooms">
					Mushrooms
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="pepperoni" value="pepperoni" name="toppings[]">
				<label class="form-check-label" for="pepperoni">
					Pepperoni
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="sausage" value="sausage" name="toppings[]">
				<label class="form-check-label" for="sausage">
					Sausage
				</label>
			</div>
		</fieldset>

		<fieldset class="form-group border p-2">
			<legend>Select your pizza size</legend>
			<div class="form-group">
				<label for="size">Pizza Size</label>
				<select class="form-control" id="size" name="size">
					<option value="none" selected disabled>Select a size</option>
					<option value="small">Small - 8"</option>
					<option value="medium">Medium - 12"</option>
					<option value="large">Large - 16"</option>
					<option value="family">Family - 24"</option>
				</select>
				<span class="text-danger d-none" id="err-size">* Please select a size.</span>
			</div>
		</fieldset>

		<!-- agreement -->
		<div class="checkbox">
			<input type="checkbox" id="agreement" name="agreement">
			<label for="agreement">
				I agree to the terms and conditions.
			</label>
			<span class="text-danger d-none" id="err-agreement">* Please agree to the terms and conditions.</span>
		</div>

		<!-- order button -->
		<input type="submit" value="Submit your order" class="btn btn-dark btn-lg">
	</form>
	<!-- end of order form -->
</div>

<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
				integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
				crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
				integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
				crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
				integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
				crossorigin="anonymous"></script>
<!-- import local scripts -->
<script src="scripts/pizza.js"></script>
</body>
</html>