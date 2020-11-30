<?php

// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// define some arrays for showing off ajax
$adjs = array('funny', 'smart', 'talented', 'goofy', 'nerdy', 'gifted');
$names = array('Dana', 'Alisa', 'Ryan R.', 'Ryan H.', 'Tina', 'Shayna');

// get a random adjective
$adj = $adjs[rand(0, count($adjs)-1)];

// get name from $_POST, if it's empty then get a random one
$name = $_POST['name'];
if (empty($name)) {
	$name = $names[rand(0, count($adjs)-1)];
}

// connect to DB

// write SQL query

// execute query

// echo our name and random adjective
echo "<p>Hello $name, rumor is you're pretty $adj.";