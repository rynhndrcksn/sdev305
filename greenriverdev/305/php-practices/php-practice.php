<?php
/*
 * a block comment at the top of your HTML page is normal and considered good to use because this is where we
 * would load server/database settings or anything else we would want to do like below:
 *
 * connect to db
 *
 * get the username and password from login form
 *
 * query the db to see if user is valid
 *
 * if admin, redirect to another page
 */

	// turn on error reporting so we can see what's wrong in the browser
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Practicing with PHP</title>
</head>
<body>
<?php // PHP doesn't have to be in one block and can be spread out instead
	/*
	echo "<h1>Hello World</h1>";
	$name = "Bob";
	$age = 19;
	$isStudent = true;

	echo "<p>$name is $age.</p>";
	 */
	echo "<p>Let's go!</p>";
	echo '<p>Let\'s go!</p>';
	echo '<p>Columbus arrived on 10/12/1492</p>';
	echo "<br>";

?>

<h2>Below is more PHP in a second code block</h2>
<?php
	echo "<p>This is a paragraph in PHP</p>";
?>
</body>
</html>