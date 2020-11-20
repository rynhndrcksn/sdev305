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


function validText($data) {
	return empty($data) && prep_input(preg_match("/^[a-zA-z-' ]*$/", $data));
}

function validEmail($data) {
	return filter_var(prep_input($data), FILTER_VALIDATE_EMAIL);
}

function validURL($data) {
	return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", prep_input
	($data));
}

function validMet($data) {
	$validMets = array('meetup', 'jobfair', 'class', 'other', 'nomeet');
	return array_search(prep_input($data), $validMets);
}