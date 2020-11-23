<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// links this page to a session
session_start();
// this changes the session id to help prevent session hijacking
session_regenerate_id();
$_SESSION['first'] = 'Daffy';
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Session Demo</title>
</head>
<body>
	<h1>Loads a session for testing purposes.</h1>
</body>
</html>