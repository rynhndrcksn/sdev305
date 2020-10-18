document.getElementById("form-main").onsubmit = validate;

let formZip = document.getElementById("zip").value;
if (formZip !== "zipNotListed" || formZip !== "none") {
	showForms();
}

// make all error messages invisible again
function clearErrors() {
	// create node list of all elements with text-danger class
	let errors = document.getElementsByClassName("text-danger");
	for (let i = 0; i < errors.length; i++) {
		errors[i].classList.add("d-none");
	}
}

function showForms() {
	let contactInfo = document.getElementById("contactInfoDiv");
	let services = document.getElementById("servicesDiv");
	contactInfo.classList.remove("d-none");
	services.classList.remove("d-none");
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

	// error check last name
	let lname = document.getElementById("lname").value;
	if(lname === "") {
		let errLname = document.getElementById("err-lname");
		errLname.classList.remove("d-none");
		isValid = false;
	}

	// error check agreement -- CURRENTLY BROKE - always displays error
	// let agreement = document.getElementById("agreement").checked;
	// if (!agreement.checked) {
	// 	let errAgreement = document.getElementById("err-agreement");
	// 	errAgreement.classList.remove("d-none");
	// 	errAgreement.classList.add("d-block");
	// 	isValid = false;
	// }

	return isValid;
}
