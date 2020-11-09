<?php

// connect to DB
$database = 'rhendric_grc';
$username = 'rhendric_grcuser';
$password = 'zAStnkyomLBzW&6ASMcNmKZ5btTct*uXScoY3V@r$wXx6t783L2@4XKF^Z6V&$vHdY^b*Zj$taJz&P6ajs4u8rn27Vj5t#@9wMr%y6jZ76LEMj8r7YwP7TRbcqV!D*Pf';
$hostname = 'localhost';

// if mysqli fails fails then die() runs and says there was a problem
// adding a @ in front of mysqli suppresses the error message to reduce the chance of anything leaking
$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die('Oops, there was a problem.');