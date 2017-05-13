<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	
include "conn.php";

showproduct();



}



function showproduct(){


global $con;

$my_query = "SELECT * FROM products";

$run_pro= mysql_query($my_query, $con);

$num_rows = mysql_num_rows($run_pro);

$temp_value = array();


if ($num_rows>0) {
	

while ($row_pro = mysql_fetch_assoc($run_pro)) {

$temp_value[]= $row_pro;

	
}

}





header('Content-Type: application/json');
echo json_encode(array("products"=>$temp_value));

}




?>