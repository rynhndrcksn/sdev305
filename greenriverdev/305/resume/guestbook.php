<?php
/**
 * guestbook.php
 * handles the guestbook of https://rhendrickson.greenriverdev.com
 */

// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// set time zone
date_default_timezone_set('America/Los_Angeles');
$timestamp = date("Y/m/d H:i:s");

include ('includes/header.html');
require ($_SERVER['HOME'].'/includes/cnxn.php');
require('includes/validation.php');
?>
<body class="bg-primary-color">

<!-- BACK TO INDEX.php -->
<a href="index.php" class="badge badge-secondary">Back Home</a>

<!-- TO ADMIN.html -->
<a href="admin.php" class="badge badge-secondary float-right">Admin Login</a>

<!-- JUMBOTRON -->
<div class="jumbotron jumbotron-fluid bg-secondary-color">
	<div class="container text-dark">
		<h1 class="display-4">Sign my Guestbook!</h1>
		<p class="lead">Please enter your information below to be added to my guestbook</p>
	</div>
</div>

<?php

// make local variables for data collection
$fname = $lname = $title = $company = $email = $linkedin = $how_met = $specifyOther = $comment = $mailingList =
	$mailingType = "";
$fnameErr = $lnameErr = $titleErr = $companyErr = $emailErr = $linkedinErr = $how_metErr = $specifyOtherErr =
	$mailingListErr = $mailingTypeErr = "";

?>

<!-- FORM -->
<form action="submit-guestbook.php" method="post" id="guestbookForm"
			class="container text-color-secondary pb-5 border-bottom">
	<h2 class="text-center pt-5">Contact Information:</h2>
	<div class="row">
		<div class="col-md form-group">
			<label for="fname">First Name:</label>
			<input type="text" class="form-control" id="fname" name="fname" value="<?php echo htmlspecialchars($fname);?>">
			<span class="text-danger" id="err-fname"><?php echo $fnameErr;?></span>
		</div>
		<div class="col-md form-group">
			<label for="lname">Last Name:</label>
			<input type="text" class="form-control" id="lname" name="lname" value="<?php echo htmlspecialchars($lname);?>">
			<span class="text-danger" id="err-lname"><?php echo $lnameErr;?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md form-group">
			<label for="title">Job Title:</label>
			<input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($title);?>">
			<span class="text-danger" id="err-title"><?php echo $titleErr;?></span>
		</div>
		<div class="col-md form-group">
			<label for="company">Company:</label>
			<input type="text" class="form-control" id="company" name="company" value="<?php echo htmlspecialchars($company);?>">
			<span class="text-danger" id="err-company"><?php echo $companyErr;?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md form-group">
			<label for="email">Email Address:</label>
			<input type="text" class="form-control" id="email" name="email"  value="<?php echo htmlspecialchars($email);?>">
			<span class="text-danger" id="err-email"><?php echo $emailErr;?></span>
		</div>
		<div class="col-md form-group">
			<label for="linkedin">LinkedIn Profile:</label>
			<input type="text" class="form-control" id="linkedin" name="linkedin" value="<?php echo htmlspecialchars($linkedin);?>">
			<span class="text-danger" id="err-linkedin"><?php echo $linkedinErr;?></span>
		</div>
	</div>

	<h2 class="text-center mt-5">How did we Meet?</h2>
	<div class="row">
		<div class="col-md-6">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text" for="how-met">Options</label>
				</div>
				<select class="custom-select" id="how-met" name="how-met">
					<option selected disabled>Choose how we met</option>
					<option value="meetup" <?php if ($how_met == 'meetup'){echo 'selected';}?>>Meetup</option>
					<option value="jobfair" <?php if ($how_met == 'jobfair'){echo 'selected';}?>>Job Fair</option>
					<option value="class" <?php if ($how_met == 'class'){echo 'selected';}?>>Class</option>
					<option value="other" <?php if ($how_met == 'other'){echo 'selected';}?>>Other</option>
					<option value="nomeet" <?php if ($how_met == 'nomeet'){echo 'selected';}?>>We haven't met</option>
				</select>
			</div>
			<span class="text-danger" id="err-met"><?php echo $how_metErr;?></span>
		</div>
		<div class="col-md-6">
			<div class="input-group mb-3" id="display-other">
				<div class="input-group-prepend">
					<label for="specifyOther">
						<span class="input-group-text" id="basic-addon1">Specify other:</span>
					</label>
				</div>
				<input type="text" id="specifyOther" name="specifyOther" class="form-control" aria-label="specify how we met"
							 aria-describedby="basic-addon1" value="<?php echo htmlspecialchars($specifyOther);?>">
			</div>
			<span class="text-danger d-none" id="err-met-other">*Please enter the other way we met.</span>
			<span class="text-danger"><?php echo $specifyOtherErr;?></span>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label for="message">Leave a message:</label>
				<textarea class="form-control" id="message" name="message" rows="3"><?php echo htmlspecialchars($comment);?></textarea>
			</div>
		</div>
	</div>

	<h2 class="text-center mt-5">Mailing List:</h2>
	<div class="row">
		<div class="col-md-6">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="mailingList" name="mailingList" <?php if
				($mailingList){echo 'checked';}?>>
				<label class="custom-control-label" for="mailingList">Please add me to your mailing list</label>
			</div>
			<div class="form-group" id="email-formats">
				<span class="emailFormat">Please choose an email format:</span>
				<br>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="email-html" name="htmlORtext" class="custom-control-input" value="html" <?php if
					($mailingType == 'html'){echo 'checked';}?>>
					<label class="custom-control-label" for="email-html">HTML Email Format</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="email-text" name="htmlORtext" class="custom-control-input" value="text"<?php if
					($mailingType == 'text'){echo 'checked';}?>>
					<label class="custom-control-label" for="email-text">Text Email Format</label>
				</div>
			</div>
			<span class="text-danger d-none" id="err-email-format">*Please select an email format.</span>
			<span class="text-danger" id="err-email-format"><?php echo $mailingTypeErr;?></span>
		</div>
	</div>
	<button class="btn btn-primary" type="submit" name="submit">Submit form</button>
</form>

<?php include ('includes/footer.html'); ?>
<!--<script src="scripts/guestbook-validation.js"></script>-->
