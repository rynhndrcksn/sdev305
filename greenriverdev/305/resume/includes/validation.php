<?php

/**
 * takes a parameter, strips any white spaces, strips \\'s and //'s, and converts any HTML to it's ASCII code.
 * is used on its own, but also acts as a helper function
 * @param $data
 * @return string
 */
function prep_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function validNames($data) {
	if (empty($data)) {
		return false;
	} else {
		return preg_match("/^[a-zA-z-' ]*$/", prep_input($data));
	}
}

function validText($data) {
	if (empty($data)) {
		return true;
	} else {
		return preg_match("/^[0-9a-zA-z-' ]*$/" , prep_input($data));
	}
}

function validEmail($data) {
	if (empty($data)) {
		return true;
	} else {
		return filter_var(prep_input($data), FILTER_VALIDATE_EMAIL);
	}
}

function validURL($data) {
	if (empty($data)) {
		return true;
	} else {
		return filter_var($data, FILTER_VALIDATE_URL);
	}
}

function validMet($data) {
	if (empty($data)) {
		return false;
	} else {
		$validMets = ['placeholder', 'meetup', 'jobfair', 'class', 'other', 'nomeet'];
		return array_search(prep_input($data), $validMets);
	}
}

function validMail($data) {
	if (empty($data)) {
		return false;
	} else {
		$validMail = ['placeholder', 'html', 'text'];
		return array_search(prep_input($data), $validMail);
	}
}