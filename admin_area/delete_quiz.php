<?php

if (isset($_GET['delete_quiz'])) {
	

	include("includes/db.php");

	$delete_id = $_GET['delete_quiz'];

	$delete_pro=" DELETE FROM quiz WHERE quiz_id= '$delete_id'";

	$run_delete = mysql_query($delete_pro, $con);

	if ($run_delete) {
		
		echo "<script>alert('lesson has been deleted !')</script>";
		echo "<script>window.open('index.php?view_quiz','_self')</script>";
	}
}



?>