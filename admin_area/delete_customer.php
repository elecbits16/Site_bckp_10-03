<?php

if (isset($_GET['delete_customer'])) {
	

	include("includes/db.php");

	$delete_id = $_GET['delete_customer'];

	$delete_customer=" DELETE FROM customers WHERE customer_id= '$delete_id'";

	$run_delete = mysql_query( $delete_customer , $con );

	if ($run_delete) {
		
		echo "<script>alert('Product has been deleted !')</script>";
		echo "<script>window.open('index.php?view_customers','_self')</script>";
	}
}



?>