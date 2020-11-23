<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

setcookie('first', 'Mickey');
setcookie('last', 'Mouse');
setcookie('occupation', 'Mouseketeer');
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cookie Demo 2</title>
</head>
<body>
	<h1>Loads a cookie for testing purposes.</h1>
	<?php echo "<p>Hello, ".$_COOKIE['first']." ".$_COOKIE['last']." the ".$_COOKIE['occupation']."</p>";?>
</body>
</html>