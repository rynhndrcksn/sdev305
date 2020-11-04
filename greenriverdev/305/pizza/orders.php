<?php
/**
 * Ryan Hendrickson
 * orders.php
 * Display an order summary for admins
 */
// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// connect to DB
$database = 'rhendric_grc';
$username = 'rhendric_grcuser';
$password = 'zAStnkyomLBzW&6ASMcNmKZ5btTct*uXScoY3V@r$wXx6t783L2@4XKF^Z6V&$vHdY^b*Zj$taJz&P6ajs4u8rn27Vj5t#@9wMr%y6jZ76LEMj8r7YwP7TRbcqV!D*Pf';
$hostname = 'localhost';

// if mysqli fails fails then die() runs and says there was a problem
// adding a @ in front of mysqli suppresses the error message to reduce the chance of anything leaking
$cnxn = @mysqli_connect($hostname, $username, $password, $database)
	or die('Oops, there was a problem.');
/*
echo '<pre>';
var_dump($cnxn);
echo '</pre>';
*/
include ('includes/head.html');
?>

<body>
<div class="container" id="main">
	<!-- jumbotron start -->
	<div class="jumbotron">
		<h1 class="display-4">Order Summary</h1>

	</div>
	<table id="order-table" class="display">
		<thead>
		<tr>
			<th>Order ID:</th>
			<th>First Name:</th>
			<th>Last Name:</th>
			<th>Address:</th>
			<th>Size:</th>
			<th>Toppings:</th>
			<th>Method:</th>
			<th>Price:</th>
			<th>Order Date:</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sql = 'SELECT * FROM pizza';
		$result = mysqli_query($cnxn, $sql);

		foreach ($result as $row) {
			echo '<tr>';
			foreach ($row as $value) {
				echo "<td>$value</td>";
			}
			echo '</tr>';
		}
		?>
		</tbody>
	</table>

</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

<!-- add datatables.net js -->
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
	$('#order-table').DataTable();
</script>
<!-- import local scripts -->
<script src="scripts/pizza.js"></script>
</body>
</html>