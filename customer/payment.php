<?php



if(!isset($_SESSION['customer_email'])) {
  
echo "<script>window.open('../checkout.php','_self')</script>";

}

else{



?>  

<?php carts(); ?>

   

 

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" enctype="mutlipart/form-data" > 
  
  
   

    <?php

    $total = 0;
    $single_price=0; 
   global $con;

   $ip= getIp();

   $sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";

   $run_price = mysql_query( $sel_price, $con);

   while ($p_price = mysql_fetch_array($run_price)) {

        $pxq =  $p_price['pxq'];

       $pro_id = $p_price['p_id'];

       $qty2 = $p_price['qty'];

       $single_price = $p_price['uv'];

       $pro_price = "SELECT * FROM products WHERE product_id='$pro_id' ";

       $run_pro_price = mysql_query( $pro_price, $con );

       while ($pp_price=mysql_fetch_array($run_pro_price)) {
           
           $product_price =  array($pp_price['product_price']);

           $product_title = $pp_price['product_title'];

           $product_image = $pp_price['product_image'];

           $pro_cat1 = $pp_price['product_cat1'];

           $pro_cat2 = $pp_price['product_cat2'];
           $pro_cat3 = $pp_price['product_cat3'];
           $pro_cat4 = $pp_price['product_cat4'];
          
          $pro_high = $pp_price['product_high'];

          $test[] = $single_price;

          foreach ($test as $key => $txn) {
             
            
            
       $pxq_price = "UPDATE cart SET pxq = '$txn' WHERE p_id='$pro_id' and ip_add= '$ip' ";
            
       $run_pxq_price = mysql_query(  $pxq_price , $con   );
       
}
                  
             

    ?>

  
  
  <div class="panel panel-default hidden-xs" >
    
    <div class="panel-body">
      
      <div class="col-lg-12 col-xs-12" style="border-style: solid;  border-color: grey ; padding: 5px 5px 5px 5px ; ">

      <div class= "col-lg-2 col-xs-12"  style="border-style: solid;  border-color: #D0D3D4 ; padding: 30px 20px 30px 10px ; " "  >
         
        <img src="admin_area/product_img/<?php echo $product_image ;?>" width="90" height = "90" />
        
      </div>

      <div class= "col-lg-8 col-xs-12" style="border-style: solid;  border-color: white ; padding: 0px 20px 10px 20px ; " >

       <strong style="font-size:25px;"><?php echo $product_title; ?></strong>
         
      <div style="font-size:13px"><?php echo $pro_cat1; ?>,<?php echo $pro_cat2; ?>,  <?php echo $pro_cat3; ?> and  <?php echo $pro_cat4; ?> </div>

       <br>

      
        
       <strong style="font-size:25px;">₹ <?php echo $single_price; ?></strong>  
       <button   value=" <?php echo $pro_id; ?>" type="submit" name="delete_cart[]" >Remove Item</button>
        
      </div>
       <div class= "col-lg-2 col-xs-12" style="border-style: solid;  border-color: white ; padding: 10px 10px 10px 10px ; " >
       

        
       
      

    </div>
       
       

        
      
     </div>
   
          

       
</div>
</div>

   
          

       
</div>
</div>

  

   <div class="panel panel-default hidden-lg">
    
    <div class="panel-body">
      
      <div class="col-xs-12" style="border-style: solid;  border-color: white ; padding: 0px 0px 0px 0px ; ">

      <div class= "col-xs-4"   style="border-style: solid;  border-color: #D0D3D4 ; padding: 7px 7px 7px 7px ; " >

        <img src="admin_area/product_img/<?php echo $product_image ;?>" width="80" height = "80" />
        
      </div>

      <div class= "col-xs-8" style="border-style: solid;  border-color: white ; padding: 0px 10px 0px 10px ; " >

       <strong style="font-size:15px;" class="word-break: break-word; " ><?php echo $product_title; ?></strong> 
       <br>
        &nbsp<strong style="font-size:20px;">₹ <?php echo $single_price; ?></strong> 
       
      </div>
       <div class= "col-xs-8" style="border-style: solid;  border-color: white ; padding: 0px 10px 0px 10px ; " >

       
         <button type="submit"  name="delete_cart[]" style="padding : 7px 7px 7px 7px; background-color: #0070FF; color: white; font-size:12px; " value=" <?php echo $pro_id; ?>" >Remove Item</button>

        
      </div>
     </div>
   
          

       
</div>
</div>

     
       
      
     
       
       

     
     

      <?php 
  global $con;



  $ip = getIp();
      
      if (isset($_POST['delete_cart'])) {

        foreach ($_POST['delete_cart'] as $remove_id) {
          
          $delete_product ="DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add='$ip'";

          $drop_table = " ALTER TABLE cart DROP id ";

          $add_table=  "ALTER TABLE cart ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ";

         

          $run_delete = mysql_query( $delete_product, $con);
          $run_drop = mysql_query( $drop_table, $con );
          $run_add_table = mysql_query( $add_table, $con );

          if (($run_delete)&&($run_drop)&&($run_add_table)) {
            
            echo "<script>window.open('cart.php','_self')</script>";
          }


        }

        
      }



      

     ?>
  
      
     

             
      
  
  
  

  
      

    
  <?php

 
   } } 

  
  

 ?>


<?php

$ip = getIp();

        $get_item = "SELECT * FROM cart WHERE ip_add='$ip'";

        $run_item = mysql_query( $get_item, $con );

        $count_item = mysql_num_rows($run_item);

        $t = $count_item;

    $l = $t-1;
 $total_value=0;
     
       
for ($j=0; $j < $t ; $j++) { 

 
  $total_value += $test[$j];
  
}
     


     
?>       
        
     
    
      

<div class="panel panel-default" >
    
   
<div style="padding: 20px 20px 20px 20px; float: right; ">

<h3><strong> Sub Total: ₹

<?php

echo  $total_value; 

?>

 </strong> </h3>
  
 
       
      <div style="padding: 0 10px 10px 10px; " >

    

<?php if ($t >0) {
  
 ?>

  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal77">Place Order</button>
   

  <?php 
}
  ?>
  
<br>
<br>
 <button> <a href="index.php" style="text-decoration: none; color: black; ">Continue shopping </a> </button>   
 
  <div class="modal fade" id="myModal77" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
         <?php include ("payment_success.php"); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</div>
</div>




  <div  style="padding: 20px 20px 20px 20px; float: right; ">


  
  
  </div> 



  

  



 

  </form>

  
      


      






   </div>

   </div>

  
    
  




  
      

 <?php
if (isset($_GET['place_order']) )  {

  ?>
  




<?php

}



}

?>



