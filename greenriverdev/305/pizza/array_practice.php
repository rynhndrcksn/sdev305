<?php

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
echo "<pre>";
echo "Indexed arrays:<br>";

$movies = array("Lord of the Rings: Fellowship of the Ring", "Lord of the Rings: Two Tower", "Lord of the Rings: Return of the King");
var_dump($movies);

$shows[] = "Mr. Robot";
$shows[] = "The Office";
$shows[] = "Scrubs";
var_dump($shows);

echo "<ul>";
foreach ($movies as $movie) {
	echo "<li>$movie</li>";
}
echo "</ul>";

echo "<ol>";
foreach ($shows as $show) {
	echo "<li>$show</li>";
}
echo "</ol>";

echo "</pre>";