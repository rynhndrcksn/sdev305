<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Successfully created an account.</title>
</head>
<body>
<h1>Account successfully created <?php echo $_GET['fname'];?></h1>

<h2>This is just a var_dump for debugging</h2>
<pre>
	<?php
  	var_dump($_GET);
  	?>
</pre>
</body>
</html>