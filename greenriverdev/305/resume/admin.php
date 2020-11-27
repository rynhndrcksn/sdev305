<?php
/**
 * Ryan Hendrickson
 * orders.php
 * Display an order summary for admins
 */
// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require ('check-login.php');

include ('includes/header.html');

// require cnxn because if it can't be found we need to terminate the script, not just let it run.
require ($_SERVER['HOME'].'/includes/cnxn.php');
?>
<body>
<!-- to guestbook.php -->
<a href="guestbook.php" class="badge badge-secondary float-left">Back to Guestbook</a>
<!-- to logout.php -->
<a href="logout.php" class="badge badge-secondary float-right">Logout</a>
<div class="container pb-5 border-bottom" id="main">
	<!-- jumbotron start -->
	<div class="jumbotron">
		<h1 class="display-4">GuestBook Entries</h1>
	</div>
	<table id="guestbook-submissions" class="display" data-order='[[11, "DESC"]]'>
		<thead>
		<tr>
			<th>First Name:</th>
			<th>Last Name:</th>
			<th>Job Title:</th>
			<th>Company:</th>
			<th>Email Address:</th>
			<th>LinkedIn Profile:</th>
			<th>How did we meet?:</th>
			<th>Other:</th>
			<th>Message:</th>
			<th>Mailing List:</th>
			<th>Email Format:</th>
			<th>DATETIME:</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sql = 'SELECT * FROM guestbook';
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

<?php include ('includes/footer.html'); ?>
<!-- add datatables.net js -->
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
	$('#guestbook-submissions').DataTable({
		'scrollX': true
	});
</script>
