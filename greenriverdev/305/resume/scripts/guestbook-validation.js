document.getElementById("guestbookForm").onsubmit = validate;

// display email formats if they want to be added to the mailing list
document.getElementById("mailingList").onclick = emailFormat;

function emailFormat() {
	let mailingList = document.getElementById("mailingList");
	if (mailingList.checked) {
		let show = document.getElementById("email-formats");
		show.classList.remove("d-none");
	} else {
		let show = document.getElementById("email-formats");
		show.classList.add("d-none");
		let error = document.getElementById("err-email-format");
		error.classList.add("d-none");
	}
}

// display other text field if user selects 'other' under how we met
document.getElementById("how-met").onclick = metOther;

function metOther() {
	let met = document.getElementById("how-met").value;
	if (met === "other") {
		let message = document.getElementById("display-other");
		message.classList.remove("d-none");
	} else {
		let message = document.getElementById("display-other");
		message.classList.add("d-none");
		let error = document.getElementById("err-met-other");
		error.classList.add("d-none");
	}
}

// make all error messages invisible again
function clearErrors() {
	// create node list of all elements with text-danger class
	let errors = document.getElementsByClassName("text-danger");
	for (let i = 0; i < errors.length; i++) {
		errors[i].classList.add("d-none");
	}
}

function validate() {
	// clear all errors that may be on the page
	clearErrors();

	// starts true, if any validation fails then becomes false. Get returned
	let isValid = true;

	// validate first name
	let fname = document.getElementById("fname").value;
	if (fname === "") {
		let error = document.getElementById("err-fname");
		error.classList.remove("d-none");
		isValid = false;
	}

	// validate last name
	let lname = document.getElementById("lname").value;
	if (lname === "") {
		let error = document.getElementById("err-lname");
		error.classList.remove("d-none");
		isValid = false;
	}

	// validate email
	let email = document.getElementById("email").value;
	let emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (email === "") {
		let error = document.getElementById("err-email-empty");
		error.classList.remove("d-none");
		isValid = false;
	} else if (!email.match(emailRegex)) {
		let error = document.getElementById("err-email-wrong");
		error.classList.remove("d-none");
		isValid = false;
	}

	// validate LinkedIn
	let linkedin = document.getElementById("linkedin").value;
	// I had to hardcode the second slice for .com because if they use a valid LinkedIn address it wouldn't end in .com
	if (linkedin !== "" && (linkedin.slice(0,5) !== 'https' || linkedin.slice(20, 24) !== '.com')) {
		let error = document.getElementById("err-linkedin");
		error.classList.remove("d-none");
		isValid = false;
	}

	// validate how we met | validate other text field is filled out if 'other' is selected
	let met = document.getElementById("how-met").value;
	if (met === "none") {
		let error = document.getElementById("err-met");
		error.classList.remove("d-none");
		isValid = false;
	} else if (met === "other") {
		let other = document.getElementById("specifyOther").value;
		if (other === "") {
			let error = document.getElementById("err-met-other");
			error.classList.remove("d-none");
			isValid = false;
		}
	}

	// validate email format
	let emailHtml = document.getElementById("email-html");
	let emailText = document.getElementById("email-text");
	let mailingList = document.getElementById("mailingList");
	if (mailingList.checked) {
		if (!emailHtml.checked && !emailText.checked) {
			let error = document.getElementById("err-email-format");
			error.classList.remove("d-none");
			isValid = false;
		} else {
			let error = document.getElementById("err-email-format");
			error.classList.add("d-none");
			isValid = false;
		}
	}

	return isValid;
}