<?php

// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// connect to db
require ($_SERVER['HOME'].'/includes/cnxn.php');

// get SID from Ajax call | trim the sid then run it through the function to prevent sql injections
$sid = mysqli_real_escape_string($cnxn, trim($_POST['sid']));

// query the db
$sql = "SELECT `sid`, `last`, `first`, `birthdate`, `gpa`, `advisor` FROM `student` WHERE sid = '$sid'";

// assign the results to $result
$result = mysqli_query($cnxn, $sql);

// count all our rows
$count = mysqli_num_rows($result);

if ($count == 0) {
	echo 'No match found :/';
} else {
	// since we know we're only getting one row, assign the first(only) row to $row
	$row = mysqli_fetch_array($result);
	// echo our SID then first and last name from $row
	echo "SID: $sid belongs to {$row['first']} {$row['last']}<br>";
}
