<?php
/**
 * guestbook.php
 * handles the guestbook of https://rhendrickson.greenriverdev.com
 */

include ('includes/header.html');
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

<!-- FORM -->
<form action="submit-guestbook.php" method="post" id="guestbookForm"
			class="container text-color-secondary pb-5 border-bottom">
	<h2 class="text-center pt-5">Contact Information:</h2>
	<div class="row">
		<div class="col-md form-group">
			<label for="fname">First Name:</label>
			<input type="text" class="form-control" id="fname" name="fname">
			<span class="text-danger d-none" id="err-fname">*Please enter your first name.</span>
		</div>
		<div class="col-md form-group">
			<label for="lname">Last Name:</label>
			<input type="text" class="form-control" id="lname" name="lname">
			<span class="text-danger d-none" id="err-lname">*Please enter your last name.</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md form-group">
			<label for="title">Job Title:</label>
			<input type="text" class="form-control" id="title" name="title">
		</div>
		<div class="col-md form-group">
			<label for="company">Company:</label>
			<input type="text" class="form-control" id="company" name="company">
		</div>
	</div>
	<div class="row">
		<div class="col-md form-group">
			<label for="email">Email Address:</label>
			<input type="text" class="form-control" id="email" name="email">
			<span class="text-danger d-none" id="err-email-empty">*Please enter your email.</span>
			<span class="text-danger d-none" id="err-email-wrong">*Please enter a valid email address.</span>
		</div>
		<div class="col-md form-group">
			<label for="linkedin">LinkedIn Profile:</label>
			<input type="text" class="form-control" id="linkedin" name="linkedin">
			<span class="text-danger d-none" id="err-linkedin">*Please enter a valid URL to your LinkedIn.</span>
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
					<option selected disabled value="none">Choose how we met</option>
					<option value="meetup">Meetup</option>
					<option value="jobfair">Job Fair</option>
					<option value="class">Class</option>
					<option value="other">Other</option>
					<option value="nomeet">We haven't met</option>
				</select>
			</div>
			<span class="text-danger d-none" id="err-met">*Please enter a valid way we met.</span>
		</div>
		<div class="col-md-6">
			<div class="input-group mb-3 d-none" id="display-other">
				<div class="input-group-prepend">
					<label for="specifyOther">
						<span class="input-group-text" id="basic-addon1">Specify other:</span>
					</label>
				</div>
				<input type="text" id="specifyOther" name="specifyOther" class="form-control" aria-label="specify how we met"
							 aria-describedby="basic-addon1">
			</div>
			<span class="text-danger d-none" id="err-met-other">*Please enter the other way we met.</span>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label for="message">Leave a message:</label>
				<textarea class="form-control" id="message" name="message" rows="3"></textarea>
			</div>
		</div>
	</div>

	<h2 class="text-center mt-5">Mailing List:</h2>
	<div class="row">
		<div class="col-md-6">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="mailingList" name="mailingList">
				<label class="custom-control-label" for="mailingList">Please add me to your mailing list</label>
			</div>
			<div class="form-group d-none" id="email-formats">
				<span class="emailFormat">Please choose an email format:</span>
				<br>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="email-html" name="htmlORtext" class="custom-control-input" value="html">
					<label class="custom-control-label" for="email-html">HTML Email Format</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="email-text" name="htmlORtext" class="custom-control-input" value="text">
					<label class="custom-control-label" for="email-text">Text Email Format</label>
				</div>
			</div>
			<span class="text-danger d-none" id="err-email-format">*Please select an email format.</span>
		</div>
	</div>
	<button class="btn btn-primary" type="submit">Submit form</button>
</form>

<?php include ('includes/footer.html'); ?>
<!--<script src="scripts/guestbook-validation.js"></script>-->
