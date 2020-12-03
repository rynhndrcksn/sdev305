<?php
/**
 * index.php
 * homepage for https://rhendrickson.greenriverdev.com
 */

include ('includes/header.html');
?>
<body>
<!-- INSPIRATION https://startbootstrap.com/themes/freelancer/ -->

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-secondary-color fixed-top">
<div class="container">
	<a class="navbar-brand" href="#">Ryan Hendrickson</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
					aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-link" href="#header">Back to top</a>
			<a class="nav-link" href="#about">About</a>
			<a class="nav-link" href="#contact">Get in Contact</a>
			<a class="nav-link" href="guestbook.php">GuestBook</a>
		</div>
	</div>
</div>
</nav>



<!-- HEADER -->
<header class="bg-primary-color text-white text-center pt-5" id="header">
	<div class="container d-flex align-items-center flex-column">
		<img src="images/avataaars.png" alt="Avataar of Ryan Hendrickson" class="avatar-size">
		<h1 class="text-uppercase mb-3 mt-3">Ryan Hendrickson</h1>
	</div>
</header>



<!-- PORTFOLIO -->
<section class="page-section portfolio mt-3 mb-3 container" id="portfolio">
	<div class="card-deck justify-content-center">
		<!-- Take col-4 class out when adding more cards to portfolio -->
		<div class="card col-md-4">
			<a href="https://dar2.greenriverdev.com" target="_blank">
				<img src="images/kent_outreach_preview.png" class="card-img-top"
						 alt="Screenshot of Kent Outreach's website">
			</a>
			<div class="card-body">
				<h5 class="card-title">Kent Outreach</h5>
				<p class="card-text">Client wanted a website to assist low income/homeless individuals from their community.
					Client wanted individuals to be able to read about the outreach project, discover what kind of services
					were offered, and request assistance from the outreach.</p>
			</div>
			<div class="card-footer">
				<small class="text-muted">Last updated: Current project</small>
			</div>
		</div>
		<!--
		<div class="card">
			<img src="..." class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Another Project</h5>
				<p class="card-text">Text for when I add another project</p>
			</div>
			<div class="card-footer">
				<small class="text-muted">Last updated: Never</small>
			</div>
		</div>
		<div class="card">
			<img src="..." class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Another project</h5>
				<p class="card-text">Text for when I add another project</p>
			</div>
			<div class="card-footer">
				<small class="text-muted">Last updated: Never</small>
			</div>
		</div>
		-->
	</div>
</section>



<!-- ABOUT -->
<section class="page-section bg-primary text-white pt-5 pb-5" id="about">
	<div class="container">
		<!-- About Section Heading-->
		<h2 class="page-section-heading text-center text-uppercase text-white pt-3">About Ryan</h2>
		<!-- About Section Content-->
		<div class="row">
			<div class="col-lg-5 ml-auto"><p class="lead">Ryan was born and raised in the Greater Seattle area.
				He is currently a Junior in Green River College's Software Development Bachelors program.</p>
			</div>
			<div class="col-lg-5 mr-auto"><p class="lead">Ryan is proficient with:</p>
				<ul>
					<li>Front end web development (HTML5, CSS3, SASS, Bootstrap, & JavaScript)</li>
					<li>Back end web development (PHP7, MariaDB 10)</li>
					<li>Java</li>
				</ul>
			</div>
		</div>
	</div>
</section>



<!-- CONTACT -->
<section class="page-section mt-3" id="contact">
	<div class="container mb-3">
		<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 pt-5">Contact Me</h2>
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<form id="contactForm" method="post" action="submit-contact.php">
					<div class="row">
						<div class="col-md form-group">
							<label for="fname">*First Name:</label>
							<input type="text" class="form-control" id="fname" name="fname">
							<span class="text-danger d-none" id="err-fname">*Please enter your first name.</span>
						</div>
						<div class="col-md form-group">
							<label for="lname">*Last Name:</label>
							<input type="text" class="form-control" id="lname" name="lname">
							<span class="text-danger d-none" id="err-lname">*Please enter your last name.</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md form-group">
							<label for="email">*Email Address:</label>
							<input type="text" class="form-control" id="email" name="email">
							<span class="text-danger d-none" id="err-email-empty">*Please enter your email.</span>
							<span class="text-danger d-none" id="err-email-wrong">*Please enter a valid email address.</span>
						</div>
						<div class="col-md form-group">
							<label for="phone">Phone Number:</label>
							<input type="text" class="form-control" id="phone" name="phone">
							<span class="text-danger d-none" id="err-phone">*Please enter a valid phone number format 1234567890.</span>
						</div>
					</div>
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label for="message">*Message</label>
							<textarea class="form-control" id="message" rows="5" name="message"></textarea>
							<span class="text-danger d-none" id="err-message">*Please enter a message.</span>
						</div>
					</div>
					<br />
					<div id="success"></div>
					<div class="form-group">
						<button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>



<!-- FOOTER -->
<?php include ('includes/footer.html');?>