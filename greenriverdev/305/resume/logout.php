<?php
// start a new session
session_start();
// destroy the session data
session_destroy();
// double destroy by setting the $_SESSION to an empty array
$_SESSION = array();
// redirect user to login.php
header('location: login.php');