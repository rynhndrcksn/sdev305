<?php
	/*
	 * confirmation.php
	 * gets data from pizza/index.php
	 * October 26th, 2020.
	 */

// error reporting
// ini_set('display_errors', 1);

include ('includes/head.html');
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
			// get data from post array
	  		$fname = $_POST["fname"];
	    	$lname = $_POST["lname"];
	    	$fullName = $fname." ".$lname;
	    	$fromName = $fullName;
	    	$address = $_POST["address"];
	    	$method = $_POST["method"];
	    	$toppings = implode(", ", $_POST['toppings']);
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
				$headers = "Name: $fromName <$fromEmail>";

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