<?php
/**
 *  greenriverdev/305/login-starter/login.php
 *  Ryan Hendrickson
 *  November 23rd, 2020.
 *  Login form for demo purposes
 */

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start the session and give them a new session id
session_start();
session_regenerate_id();

//initialize variables
$username = "";
$password = "";
$err = false;

//if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//get the username and password
	$username = strtolower(trim($_POST['username']));
	$password = trim($_POST['password']);

	// include login creds
	require('login-creds.php');

	// if they entered a correct login
	if ($username == $adminUser && $password == $adminPass) {
		$_SESSION['loggedin'] = true;
		// redirect to index.php
		if (isset($_SESSION['page'])) {
			header('location: ' . $_SESSION['page']);
		} else {
			header('location: index.php');
		}
	} else {
		// else set an error flag
		$err = true;
	}
}

var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <style>
        .err {
            color: darkred;
        }
    </style>
</head>
<body>
<div class="container">

    <h1>Login Page</h1>

    <form action="#" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"
									 value="<?php echo htmlspecialchars($username);?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
			<?php
				// ways to display errors
				if ($err) {
					echo '<span class="err">Incorrect login</span><br>';
				}
				// <?php if ($err){echo '<span class="err">Incorrect login</span><br>';}
			?>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>