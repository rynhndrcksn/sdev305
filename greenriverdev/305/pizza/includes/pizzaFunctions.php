<?php

echo "<p>pizzaFunctions.php is loaded</p>";

// validate first and last name
function validName($name) {
	return !empty($name); // && ctype_alpha($name);
}

// validate method
function validMethod($method) {
	return $method == 'pickup' || $method == 'delivery';
}

// validate toppings: an array
function validToppings($toppings) {
	$validToppings = array('olives', 'mushrooms', 'pepperoni', 'sausage');

	foreach ($toppings as $topping) {
		if (!in_array($topping, $validToppings)) {
			return false;
		}
	}
	// all toppings are valid
	return true;
}