<?php

if (isset($_GET['delete_comp'])) {
	

	include("includes/db.php");

	$delete_id = $_GET['delete_comp'];
	

	$delete_cat = " DELETE FROM components WHERE comp_id= '$delete_id'";

	$drop_table = " ALTER TABLE components DROP comp_id ";

    $add_table =  "ALTER TABLE components ADD comp_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ";


	$run_delete = mysql_query($delete_cat, $con);

	$run_drop = mysql_query($drop_table , $con);
    $run_add_table = mysql_query($add_table, $con);

	 if (($run_delete)&&($run_drop)&&($run_add_table)) {
		
		echo "<script>alert('components has been deleted !')</script>";
		echo "<script>window.open('index.php?view_comp','_self')</script>";
	}
}



?>