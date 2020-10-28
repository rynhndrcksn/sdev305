<?php

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


echo "<pre>";
echo "Indexed arrays:<br>";

// indexed array
$movies = array("Lord of the Rings: Fellowship of the Ring", "Lord of the Rings: Two Tower", "Lord of the Rings: Return of the King");
var_dump($movies);

// indexed array just done one at a time
$shows[] = "Mr. Robot";
$shows[] = "The Office";
$shows[] = "Scrubs";
var_dump($shows);

// display all the elements in the $movies array
echo "<ul>";
foreach ($movies as $movie) {
	echo "<li>$movie</li>";
}
echo "</ul>";

// display all the elements in teh $shows array
echo "<ol>";
foreach ($shows as $show) {
	echo "<li>$show</li>";
}
echo "</ol>";

// associative array but adding 1 key/value pair at a time
$colors["Sarah"] = "Blue";
$colors["Kim"] = "Pink";
$colors["Alisa"] = "Mint Green";
var_dump($colors);

foreach ($colors as $person=>$color) {
	echo "<p>$person likes $color</p>";
}

// associative arrays but add everything at once
$classes = array (
	"SDEV301" => "Systems Programming",
	"SDEV305" => "Web Dev Frameworks",
	"SDEV378" => "Software Career Prep"
);

echo "<ul>";
// foreach is always the array name, the key name, and the value name
foreach ($classes as $courseNum => $courseTitle) {
	print "<li>$courseNum -> $courseTitle</li>";
}
echo "</ul>";

echo "</pre>";