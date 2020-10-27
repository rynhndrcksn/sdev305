<?php
	/*
	 * confirmation.php
	 * gets data from pizza/index.html
	 * October 26th, 2020.
	 */

// error reporting
// ini_set('display_errors', 1);


?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

  <title>Poppa's Pizza</title>
  <link rel="icon" type="image/png" href="images/pizza.ico">
</head>
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
	    	$size = $_POST['size'];
	    	$toppings = implode(", ", $_POST['toppings']);
	    	$fromEmail = "rhendrickson11@mail.greenriver.edu";

	    	// print order summary
	    	echo "<p>Name: $fname $lname</p>";
	    	echo "<p>Address: $address</p>";
	    	echo "<p>Size: $size</p>";
	    	echo "<p>Toppings: $toppings</p>";

	    	// send email
				$to = "rhendrickson11@mail.greenriver.edu";
				$subject = "Pizza order placed";
				$message = "Order from $fullName\r\n";
				$message .="Address: $address\r\n";
				$message .="Toppings: $toppings";
				$headers = "Name: $fromName <$fromEmail>";

				$success = mail($to, $subject, $message, $headers);

				// check success
			/*
				if ($success) {
					echo "<p>Your order has been placed</p>";
				} else {
					echo "<p>Sorry, there was a problem.</p>";
				}
			*/
				// don't have to do it this way, just looks neater
				echo $success ? "<p>Your order has been placed</p>" : "<p>Sorry, there was a problem.</p>";
	    ?>
  </div>
</body>
</html>