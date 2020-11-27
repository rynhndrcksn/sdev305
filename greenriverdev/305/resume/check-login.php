<?php
// Start the session and give them a new session id
session_start();
session_regenerate_id();

// if the user isn't logged in, send them to login.php
if (!isset($_SESSION['loggedin'])) {
	// store the page the user is on so we can redirect them after a successful login
	$_SESSION['page'] = $_SERVER['SCRIPT_URI'];
	// redirect to login
	header('location: login.php');
}