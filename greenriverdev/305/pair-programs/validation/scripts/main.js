document.getElementById("main-form").onsubmit = validate;

// make all error messages invisible again
function clearErrors() {
	// create node list of all elements with text-danger class
	let errors = document.getElementsByClassName("text-dark");
	for (let i = 0; i < errors.length; i++) {
		errors[i].classList.add("d-none");
		errors[i].classList.remove("d-block");
	}
}

function validate() {
	clearErrors();

	let isValid = true;

	// error check first name
	let fname = document.getElementById("fname").value;
	if(fname === "") {
		let errFname = document.getElementById("err-fname");
		errFname.classList.remove("d-none");
		isValid = false;
	}

	// error check if email is absent or wrong format
	let emailAbsent = document.getElementById("email").value;
	let emailWrong = document.getElementById("email").value;
	// emailFormat regex (my limited knowledge of regex)
	let emailFormat = /\S+@\S+\.\S+/;
	if(emailAbsent === "") {
		let errEmail = document.getElementById("err-emailAbsent");
		errEmail.classList.remove("d-none");
		isValid = false;
	} else if(!emailWrong.match(emailFormat)) {
		let errEmail = document.getElementById("err-emailWrong");
		errEmail.classList.remove("d-none");
		isValid = false;
	}

	// error check password
	let pass = document.getElementById("pass").value;
	if(pass.length < 12) {
		let errPass = document.getElementById("err-pass");
		errPass.classList.remove("d-none")
		isValid = false;
	}

	// error check password confirmation
	let passConf = document.getElementById("passConf").value;
	if(pass !== passConf) {
		let errPassConf = document.getElementById("err-passConf");
		errPassConf.classList.remove("d-none");
		isValid = false;
	}

	// error check agreement
	if(!document.getElementById("agreement").checked) {
		let errAgreement = document.getElementById("err-agreement");
		errAgreement.classList.remove("d-none");
		errAgreement.classList.add("d-block");
		isValid = false;
	}

	return isValid;
}