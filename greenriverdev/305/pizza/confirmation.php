<?php
	/*
	 * confirmation.php
	 * gets data from pizza/index.php
	 * October 26th, 2020.
	 */

// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// redirect user if confirmation is empty | header redirects the user, and needs to be before ANY html
if (empty($_POST)) {
	header('location: index.php');
}

// set time zone
date_default_timezone_set('America/Los_Angeles');
$timestamp = date("Y/m/d h:i:s");

// include files
include ('includes/head.html');
// require cnxn because if it can't be found we need to terminate the script, not just let it run.
require ($_SERVER['HOME'].'/includes/cnxn.php');
require ('includes/pizzaFunctions.php');
?>
<body>
  <div class="container" id="main">
  	<!-- jumbotron start -->
    	<div class="jumbotron">
      	<h1 class="display-4">Welcome to Poppa's Pizza</h1>
				<p class="lead">Serving the Green River community since 1970!</p>
			</div>

      <h1>Thank you for your order!</h1>

			<h2>Order Summary:</h2>
	   	<?php
				$isValid = true;

				//Check first name
				if (validName($_POST['fname'])) {
					$fname = $_POST['fname'];
				}
				else {
					echo "<p>Invalid first name.</p>";
					return;
				}

				//Check last name
				if (validName($_POST['lname'])) {
					$lname = $_POST['lname'];
				}
				else {
					echo "<p>Invalid last name.</p>";
					return;
				}

	    	$fullName = $fname." ".$lname;

	    	// get the method
				if (isset($_POST['method']) && validMethod($_POST['method'])) {
					$method = $_POST["method"];
				} else {
					echo "<p>Please select a method.</p>";
					$method = null;
					return;
				}

				// validate address
				if ($method == 'delivery') {
					if (!empty($_POST['address'])) {
						$address = $_POST['address'];
					} else {
						echo '<p>Please enter and address for delivery.</p>';
						$address = null;
						return;
					}
				}

				// validate toppings
			  $toppings = 'cheese';
				if (isset($_POST['toppings'])) {
					if (!validToppings($_POST['toppings'])) {
						echo '<p>Rude</p>';
						// do return here because if this executes, we've been spoofed and there's no need to keep going
						return;
					}
					$toppings = implode(", ", $_POST['toppings']);
				}


	    	$size = $_POST['size'];
	    	$fromEmail = "rhendrickson11@mail.greenriver.edu";

	    	// calculate price of pizza
				$toppingCount = count($_POST['toppings']);
				define("TAX_RATE", 1.1);
				$price = 10;
				if($size == 'medium') {
					$price = 15;
				} elseif ($size == 'large') {
					$price = 20;
				} elseif ($size == 'family') {
					$price = 25;
				}

				$price += ($toppingCount * 0.5);
				$price *= TAX_RATE;
				$price = number_format($price, 2);

				// use mysql function to prevent sql injections
				$fname = mysqli_real_escape_string($cnxn, $fname);
				$lname = mysqli_real_escape_string($cnxn, $lname);
				$address = mysqli_real_escape_string($cnxn, $address);
				$size = mysqli_real_escape_string($cnxn, $size);
				$toppings = mysqli_real_escape_string($cnxn, $toppings);
				$method = mysqli_real_escape_string($cnxn, $method);
				$price = mysqli_real_escape_string($cnxn, $price);

				// save order to database
	    	$sql = "INSERT INTO pizza(`fname`, `lname`, `address`, `size`, `toppings`, `method`, `price`)
				VALUES ('$fname', '$lname', '$address', '$size', '$toppings', '$method', '$price')";
	    	$success = mysqli_query($cnxn, $sql);
	    	if (!$success) {
	    		echo '<p>Sorry, our wires got crossed </p>';
	    		return;
				}

	    	// print order summary
	    	echo "<p>Name: $fname $lname</p>";
	    	echo "<p>Address: $address</p>";
	    	echo "<p>Delivery or Pickup: $method</p>";
	    	echo "<p>Toppings: $toppings</p>";
	    	echo "<p>Size: $size</p>";
	    	echo "<p>Total: $$price</p>";

	    	// send email
				$to = "rhendrickson11@mail.greenriver.edu";
				$subject = "Pizza order placed";
				$message = "Order from $fullName\r\n";
				$message .="Address: $address\r\n";
				$message .="Toppings: $toppings\r\n";
				$message .="Total price: $price";
				$headers = "Name: $fullName <$fromEmail>";

				// $success = mail($to, $subject, $message, $headers);

				// check success
			/*
				if ($success) {
					echo "<p>Your order has been placed</p>";
				} else {
					echo "<p>Sorry, there was a problem.</p>";
				}
			*/
				// don't have to do it this way, just looks neater
				// echo $success ? "<p>Your order has been placed</p>" : "<p>Sorry, there was a problem.</p>";
	    ?>
  </div>
</body>
</html>