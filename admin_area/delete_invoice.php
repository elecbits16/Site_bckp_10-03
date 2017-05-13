<?php

if (isset($_GET['delete_pro'])) {
	

	include("includes/db.php");

	$delete_id = $_GET['delete_pro'];

	$delete_pro=" DELETE FROM invoice WHERE invoice_no= '$delete_id'";

	$run_delete = mysql_query( $delete_pro, $con);
 $drop_table = " ALTER TABLE invoice DROP serial_no ";

          $add_table=  "ALTER TABLE invoice ADD serial_no INT NOT NULL AUTO_INCREMENT PRIMARY KEY ";

         
	$run_delete = mysql_query( $delete_pro, $con);
 $run_drop = mysql_query( $drop_table, $con);
          $run_add_table = mysql_query( $add_table, $con);



	  if (($run_delete)&&($run_drop)&&($run_add_table)) {
		
		echo "<script>alert('Invoice has been deleted !')</script>";
		echo "<script>window.open('index.php?view_invoice','_self')</script>";
	}
}



?>