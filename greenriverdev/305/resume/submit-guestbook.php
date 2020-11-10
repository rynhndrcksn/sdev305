<?php
// error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

// redirect user if form is empty | header redirects the user, and needs to be before ANY html
if (empty($_POST)) {
	header('location: guestbook.php');
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
		<h1 class="display-4">Thank you for signing my Guestbook!</h1>
		<p class="lead">Please review the information you entered below</p>
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
	$fullName = $fname." ".$lname;
	$job_title = $_POST["title"];
	$company = $_POST["company"];
	$email = $_POST['email'];
	$linkedin = $_POST['linkedin'];
	$how_met = $_POST['how-met'];
	$other = $_POST['specifyOther'];
	$comment = $_POST['message'];
	if (isset($_POST['mailingList'])) {
		$mailingList = true;
	} else {
		$mailingList = false;
	}
	if ($mailingList) {
		$email_format = $_POST['htmlORtext'];
	} else {
		$email_format = 'null';
	}
	$fromEmail = "rhendrickson11@mail.greenriver.edu";

	// print signing summary
	echo "<p>Name: $fullName</p>";
	echo "<p>Job Title: $job_title</p>";
	echo "<p>Company: $company</p>";
	echo "<p>email: $email</p>";
	echo "<p>LinkedIn URL: $linkedin</p>";
	echo "<p>How we met: $how_met</p>";
	if ($how_met == 'other') {
		echo "<p>Other way we met: $other</p>";
	}
	echo "<p>Your message: $comment</p>";
	echo "<p>Sign up for mailing list?: ";
	if ($mailingList) {
		echo 'Yes';
	} else {
		echo 'No';
	}
	echo "</p>";
	if ($mailingList) {
		echo "<p>Preferred email format: $email_format</p>";
	}

	// send email
	$to = "rhendrickson11@mail.greenriver.edu";
	$subject = "Guestbook Signed";
	$message = "Signed by: $fullName\r\n";
	$message .="Job Title: $job_title\r\n";
	$message .="Company: $company\r\n";
	$message .="Email: $email\r\n";
	$message .="LinkedIn: $linkedin\r\n";
	$message .="How we met: $how_met\r\n";
	if ($how_met == 'other') {
		$message .="Other way we met: $other\r\n";
	}
	$message .="Message: $comment\r\n";
	$message .="Sign up for mailing list?: ";
	if (isset($_POST['mailingList'])) {
		$message .= "Yes \r\n";
	} else {
		$message .= "No \r\n";
	}
	if ($mailingList) {
		$message .="Email format: $email_format\r\n";
	}

	$headers = "Name: $fullName <$fromEmail>";

	$mail = mail($to, $subject, $message, $headers);

	// check success
	if ($mail) {
		echo '<p>You have signed the guestbook!</p>';
	} else {
		echo '<p>Sorry, there was a problem signing the guestbook</p>';
	}

	// save data to database
	$sql = "INSERT INTO guestbook(`first_name`, `last_name`, `job_title`, `company`, `email`, `linkedin`, `how_met`, `other`, `message`, `mailing_list`, `email_format`, `contact_date`)
					VALUES ('$fname', '$lname', '$job_title', '$company', '$email', '$linkedin', '$how_met', '$other', '$comment', '$mailingList', '$email_format', '$timestamp')";
	$success = mysqli_query($cnxn, $sql);
	if (!$success) {
		echo '<p>Sorry, our wires got crossed </p>';
		return;
	}
	// don't have to do it this way, just looks neater
	// echo $success ? "<p>Your order has been placed</p>" : "<p>Sorry, there was a problem.</p>";

	include ('includes/footer.html');
	?>

</main>
