document.getElementById("pizza-form").onsubmit = validate;

// make all error messages invisible again
function clearErrors() {
	// create node list of all elements with text-danger class
	let errors = document.getElementsByClassName("text-danger");
	for (let i = 0; i < errors.length; i++) {
		errors[i].classList.add("d-none");
	}
}

// check each required element in the form and display error message if not done
function checkForm() {
	let checker = document.getElementsByClassName("text-danger");
	for (let i = 0; i < checker.length; i++) {
		if (checker[i].toString() === "") {
			checker[i].classList.remove("d-none");
		}
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

	// error check last name
	let lname = document.getElementById("lname").value;
	if(lname === "") {
		let errLname = document.getElementById("err-lname");
		errLname.classList.remove("d-none");
		isValid = false;
	}

	// error check address
	let address = document.getElementById("address").value;
	if(address === "") {
		let errAddress = document.getElementById("err-address");
		errAddress.classList.remove("d-none");
		isValid = false;
	}

	// error check delivery/pickup method
	let method = document.getElementsByName("method");
	let count = 0;
	for (let i = 0; i < method.length; i++) {
		if (method[i].checked) {
			count++;
		}
	}
	if (count === 0) {
		let errMethod = document.getElementById("err-method");
		errMethod.classList.remove("d-none");
		isValid = false;
	}

	// error check size
	let size = document.getElementById("size").value;
	if (size === "none") {
		let errSize = document.getElementById("err-size");
		errSize.classList.remove("d-none");
		isValid = false;
	}

	// error check agreement
	/*
	let agreement = document.getElementById("agreement").checked;
	if (!agreement.checked) {
		let errAgreement = document.getElementById("err-agreement");
		errAgreement.classList.remove("d-none");
		isValid = false;
	}
	 */

	return isValid;
}