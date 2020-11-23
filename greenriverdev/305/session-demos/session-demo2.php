<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
$_SESSION['first'] = 'Daffy';
$_SESSION['last'] = 'Duck';
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Session Demo 2</title>
</head>
<body>
	<h1>Loads a session for testing purposes.</h1>
	<?php echo "<p>Hello, ".$_SESSION['first']." ".$_SESSION['last']."."."</p>";?>
</body>
</html>