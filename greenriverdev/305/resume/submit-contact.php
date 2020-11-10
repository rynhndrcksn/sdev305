<?php
// error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

// redirect user if form is empty | header redirects the user, and needs to be before ANY html
if (empty($_POST)) {
	header('location: index.php');
}

// set time zone
date_default_timezone_set('America/Los_Angeles');
$timestamp = date("Y/m/d H:i:s");

include ('includes/header.html');
require ('includes/cnxn.php');
?>
<body>
<a href="index.php" class="badge badge-secondary">Back Home</a>
<!-- JUMBOTRON -->
<div class="jumbotron jumbotron-fluid bg-secondary-color">
	<div class="container text-dark">
		<h1 class="display-4">Thank you for reaching out!</h1>
		<p class="lead">I will respond to you within 48 hours.</p>
	</div>
</div>

<main class="container">

	<?php
	$isValid = true;
	// get data from post array
	if (!isset($_POST['fname'])) {
		return;
	}
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	$fromEmail = $email;

	// print signing summary
	echo "<p>Name: $fname $lname</p>";
	echo "<p>Email: $email</p>";
	echo "<p>Phone number: $phone</p>";
	echo "<p>Your message: $message</p>";

	// send email
	$to = "rhendrickson11@mail.greenriver.edu";
	$subject = "Message from greenriverdev";
	$body = "Name: $fname $lname\r\n";
	$body .="Email: $email\r\n";
	$body .="Phone: $phone\r\n";
	$body .="Message: $message\r\n";

	$headers = "Name: $fname <$fromEmail>";

	$mail = mail($to, $subject, $body, $headers);

	// check success
	if ($mail) {
		echo '<p>Your message was sent successfully!</p>';
	} else {
		echo '<p>Sorry, there was an error...</p>';
	}

	// save data to database
	$sql = "INSERT INTO contacts(`first_name`, `last_name`, `email`, `phone`, `message`, `contact_date`)
					VALUES ('$fname', '$lname', '$email', '$phone', '$message', '$timestamp')";
	$success = mysqli_query($cnxn, $sql);
	if (!$success) {
		echo '<p>Sorry, our wires got crossed </p>';
		return;
	}
	// don't have to do it this way, just looks neater
	// echo $success ? "<p>Your order has been placed</p>" : "<p>Sorry, there was a problem.</p>";

	?>
</main>

<?php include ('includes/footer.html'); ?>


