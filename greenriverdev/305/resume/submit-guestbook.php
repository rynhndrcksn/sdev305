<?php
// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// redirect user if form is empty | header redirects the user, and needs to be before ANY html
if (empty($_POST)) {
	header('location: guestbook.php');
}

// set time zone
date_default_timezone_set('America/Los_Angeles');
$timestamp = date("Y/m/d H:i:s");

include ('includes/header.html');
require ($_SERVER['HOME'].'/includes/cnxn.php');
require ('includes/validation.php')
?>
<body class="bg-primary-color">
<a href="index.php" class="badge badge-secondary">Back Home</a>
<!-- JUMBOTRON -->
<div class="jumbotron jumbotron-fluid bg-secondary-color">
	<div class="container text-dark">
		<h1 class="display-4">Thank you for signing my Guestbook!</h1>
		<p class="lead">Please review the information you entered below</p>
	</div>
</div>

<main class="container text-white border-bottom">

	<?php
	// make local variables for data collection
	$fname = $lname = $fullName = $title = $company = $email = $linkedin = $how_met = $specifyOther = $comment =
	$mailingList =
	$mailingType = "";

	$isValid = true;

	// validate first name
	if (validNames($_POST['fname'])) {
		$fname = prep_input($_POST['fname']);
		$fullName = $fname;
	} else {
		echo '<p>Please enter a valid first name</p>';
		$isValid = false;
	}

	// validate last name
	if (validNames($_POST['lname'])) {
		$lname = prep_input($_POST['lname']);
		$fullName .= " ".$lname;
	} else {
		echo '<p>Please enter a valid last name</p>';
		$isValid = false;
	}

	// validate title (if one is entered)
	if (isset($_POST['title'])) {
		if (validText($_POST['title'])) {
			$title = prep_input($_POST['title']);
		} else {
			$title = prep_input($_POST['title']);
			echo '<p>Please enter a valid title</p>';
			$isValid = false;
		}
	}

	// validate company (if one is entered)
	if (isset($_POST['company'])) {
		if (validText($_POST['company'])) {
			$company = prep_input($_POST['company']);
		} else {
			$company = prep_input($_POST['company']);
			echo '<p>Please enter a valid company</p>';
			$isValid = false;
		}
	}

	// validate email
	if (isset($_POST['email'])) {
		if (validEmail($_POST['email'])) {
			$email = prep_input($_POST['email']);
		} else {
			$email = prep_input($_POST['email']);
			echo '<p>Please enter a valid email</p>';
			$isValid = false;
		}
	}

	// validate linkedin
	if (isset($_POST['linkedin'])) {
		if (validURL($_POST['linkedin'])) {
			$linkedin = prep_input($_POST['linkedin']);
		} else {
			$linkedin = prep_input($_POST['linkedin']);
			echo '<p>Please enter a valid LinkedIn URL</p>';
			$isValid = false;
		}
	}

	// validate how we met
	if (!isset($_POST['how-met'])) {
		echo '<p>Please enter a valid way we met</p>';
		$isValid = false;
	} else {
		if (validMet($_POST['how-met'])) {
			$how_met = prep_input($_POST['how-met']);
		} else {
			echo '<p>Please enter a valid way we met</p>';
			$isValid = false;
		}
	}

	if (!($how_met == 'other') && !empty($_POST['specifyOther'])) {
		echo '<p>Please only fill "Specify Other" out if the way we met isn\'t listed.</p>';
		$isValid = false;
	} else if ($how_met == 'other' && empty($_POST['specifyOther'])) {
		echo '<p>Please fill out "Specify Other" so I know how we met</p>';
		$isValid = false;
	}

	// if the user put 'other' for how we met, get how we met
	if ($how_met == 'other') {
		$specifyOther = prep_input($_POST['specifyOther']);
	}

	// get their message
	$comment = prep_input($_POST['message']);

	// check mailing list
	if (isset($_POST['mailingList'])) {
		$mailingList = true;
	} else {
		$mailingList = false;
	}

	// ensure the email field is filled out if they want on the mailing list
	if ($mailingList) {
		if (empty($email) || !validEmail($email)) {
			echo '<p>If you want to be added to the mailing list, please toggle the button on.</p>';
			$isValid = false;
		}
	}

	// verify they picked html or text email formats, and verify mailing list is checked if they're clicking on html or
	// text format
	if ($mailingList) {
		if (validMail($_POST['htmlORtext'])) {
			$mailingType = $_POST['htmlORtext'];
		} else {
			echo '<p>You didn\'t enter a valid format for your emails...</p>';
			$isValid = false;
		}
	} else if (isset($_POST['htmlORtext'])) {
		echo '<p>You didn\'t sign up for the mailing list, do you can\'t pick a format.</p>';
		$isValid = false;
	}

	if ($isValid) {
		$fromEmail = "rhendrickson11@mail.greenriver.edu";

		// print signing summary
		echo "<p>Name: $fullName</p>";
		echo "<p>Job Title: $title</p>";
		echo "<p>Company: $company</p>";
		echo "<p>email: $email</p>";
		echo "<p>LinkedIn URL: $linkedin</p>";
		echo "<p>How we met: $how_met</p>";
		if ($how_met == 'other') {
			echo "<p>Other way we met: $specifyOther</p>";
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
			echo "<p>Preferred email format: $email</p>";
		}

		// send email
		$to = "rhendrickson11@mail.greenriver.edu";
		$subject = "Guestbook Signed";
		$message = "Signed by: $fullName\r\n";
		$message .="Job Title: $title\r\n";
		$message .="Company: $company\r\n";
		$message .="Email: $email\r\n";
		$message .="LinkedIn: $linkedin\r\n";
		$message .="How we met: $how_met\r\n";
		if ($how_met == 'other') {
			$message .="Other way we met: $specifyOther\r\n";
		}
		$message .="Message: $comment\r\n";
		$message .="Sign up for mailing list?: ";
		if (isset($_POST['mailingList'])) {
			$message .= "Yes \r\n";
		} else {
			$message .= "No \r\n";
		}
		if ($mailingList) {
			$message .="Email format: $email\r\n";
		}

		$headers = "Name: $fullName <$fromEmail>";

		$mail = mail($to, $subject, $message, $headers);

		// check success
		if ($mail) {
			echo '<p>You have signed the guestbook!</p>';
		} else {
			echo '<p>Sorry, there was a problem signing the guestbook.</p>';
		}

		// save data to database
		$sql = "INSERT INTO guestbook(`first_name`, `last_name`, `job_title`, `company`, `email`, `linkedin`, `how_met`, `other`, `message`, `mailing_list`, `email_format`, `contact_date`)
					VALUES ('$fname', '$lname', '$title', '$company', '$email', '$linkedin', '$how_met', '$specifyOther', '$comment', '$mailingList', '$email', '$timestamp')";
		$success = mysqli_query($cnxn, $sql);
		if (!$success) {
			echo '<p>Sorry, our wires got crossed </p>';
			return;
		}
	}
	?>

</main>

<?php
	// don't have to do it this way, just looks neater
	// echo $success ? "<p>Your order has been placed</p>" : "<p>Sorry, there was a problem.</p>";

	include ('includes/footer.html');
	?>

