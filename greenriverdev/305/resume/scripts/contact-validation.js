document.getElementById("contactForm").onsubmit = validate;

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

	// validate phone number
	let phone = document.getElementById("phone").value;
	let phoneRegex = /^[0-9]+$/;
	if (!(phone === "")) {
		// determine is phone number is only numbers and its length is right
		let count = phone.length;
		if (!phone.match(phoneRegex) || count !== 10) {
			let error = document.getElementById("err-phone");
			error.classList.remove("d-none");
			isValid = false;
		}
	}

	// validate message
	let message = document.getElementById("message").value;
	if (message === "") {
		let error = document.getElementById("err-message");
		error.classList.remove("d-none");
		isValid = false;
	}

	return isValid;
}