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
require ($_SERVER['HOME'].'/includes/cnxn.php');
require ('includes/validation.php')
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

	// prep all of our input from the form
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// validate first name
		if (validText($_POST['fname'])) {
			$fname = prep_input($_POST['fname']);
			$fullName = $fname;
		} else {
			$fnameErr = '* Please enter a valid first name';
			$isValid = false;
		}

		// validate last name
		if (validText($_POST['lname'])) {
			$lname = prep_input($_POST['lname']);
			$fullName .= " ".$lname;
		} else {
			$lnameErr = '* Please enter a valid last name';
			$isValid = false;
		}

		// validate title (if one is entered)
		if (isset($_POST['title'])) {
			if (validText($_POST['title'])) {
				$job_title = prep_input($_POST['title']);
			} else {
				$titleErr = '* Please enter a valid title';
				$isValid = false;
			}
		}

		// validate company (if one is entered)
		if (isset($_POST['company'])) {
			if (validText($_POST['company'])) {
				$company = prep_input($_POST['company']);
			} else {
				$companyErr = '* Please enter a valid company';
				$isValid = false;
			}
		}

		// validate email
		if (isset($_POST['email'])) {
			if (validEmail($_POST['email'])) {
				$email = prep_input($_POST['email']);
			} else {
				$emailErr = '* Please enter a valid email';
				$isValid = false;
			}
		}

		// validate linkedin
		if (isset($_POST['linkedin'])) {
			if (validURL($_POST['linkedin'])) {
				$linkedin = prep_input($_POST['linkedin']);
			} else {
				$linkedinErr = '* Please enter a valid LinkedIn URL';
				$isValid = false;
			}
		}

		// validate how we met
		if (validMet($_POST['how-met'])) {
			$how_met = prep_input($_POST['how-met']);
		} else {
			$how_metErr = '* Please enter a valid way we met';
			$isValid = false;
		}

		// if the user put 'other' for how we met, get how we met
		if ($how_met == 'other') {
			$other = prep_input($_POST['specifyOther']);
		}

		// get their message
		$comment = prep_input($_POST['message']);
	}


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
		echo '<p>Sorry, there was a problem signing the guestbook.</p>';
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
