<?php




$con=mysql_connect ("localhost:3306", "elecbksb_aurav", "gtbit@1216", "mrmagicadam")
or die ('I cannot connect to the database.');
mysql_select_db ("elecbksb_lasthope");

//getting the IP address


function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//getting the carts

function carts()
{
    if (isset($_GET['rp_cart']))
     {
        global $con;

        $pro_id = $_GET['rp_cart'];

        $ip = getIp();

        $check_pro = "SELECT * FROM cart WHERE ip_add= '$ip' AND  p_id='$pro_id' ";

        $run_check = mysql_query( $check_pro, $con);

        if ( mysql_num_rows($run_check) > 0 ) {

        echo "";
            
        }

        else{

            $singlep ="SELECT * FROM products where product_id='$pro_id'";

            $run_singlep= mysql_query( $singlep,$con);

            $get_singlep = mysql_fetch_array($run_singlep);

            $uv = $get_singlep['product_price'];            

            $insert_pro = "INSERT INTO cart (p_id, ip_add, uv) VALUES ('$pro_id','$ip','$uv')";
            
            $drop_table = "ALTER TABLE cart DROP id ";

            $add_table=  "ALTER TABLE cart ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ";

            $run_pro = mysql_query($insert_pro, $con);
             $run_drop = mysql_query( $drop_table,$con);
          $run_add_table = mysql_query( $add_table,$con);

          if ($run_pro && $run_drop && $run_add_table) {

              echo "<script>window.open('cart.php','_self');</script>";
            
            
          }
          

        }

       }

        if (isset($_GET['diy_cart']))
     {
        global $con;

        $pro_id = $_GET['diy_cart'];

        $ip = getIp();

        $check_pro = "SELECT * FROM cart WHERE ip_add= '$ip' AND  p_id='$pro_id' ";

        $run_check = mysql_query( $check_pro, $con);

        if ( mysql_num_rows($run_check) > 0 ) {

        echo "";
            
        }

        else{

            $singlep ="SELECT * FROM products where product_id='$pro_id'";

            $run_singlep= mysql_query( $singlep,$con);

            $get_singlep = mysql_fetch_array($run_singlep);

            $uv = $get_singlep['product_diy_price'];            

            $insert_pro = "INSERT INTO cart (p_id, ip_add, uv) VALUES ('$pro_id','$ip','$uv')";
            
            $drop_table = "ALTER TABLE cart DROP id ";

            $add_table=  "ALTER TABLE cart ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ";

            $run_pro = mysql_query($insert_pro, $con);
             $run_drop = mysql_query( $drop_table,$con);
          $run_add_table = mysql_query( $add_table,$con);

          if ($run_pro && $run_drop && $run_add_table) {

             
            echo "<script>window.open('cart.php','_self');</script>";
            
          }
          

        }

       }

        if (isset($_GET['buy_now']))
     {
        global $con;

        $pro_id = $_GET['buy_now'];

        $ip = getIp();

        $check_pro = "SELECT * FROM cart WHERE ip_add= '$ip' AND  p_id='$pro_id' ";

        $run_check = mysql_query( $check_pro, $con);

        if ( mysql_num_rows($run_check) > 0 ) {

        echo "";
            
        }

        else{

            $singlep ="SELECT * FROM products where product_id='$pro_id'";

            $run_singlep= mysql_query( $singlep,$con);

            $get_singlep = mysql_fetch_array($run_singlep);

            $uv = $get_singlep['product_price'];            

            $insert_pro = "INSERT INTO cart (p_id, ip_add, uv) VALUES ('$pro_id','$ip','$uv')";
            
            $drop_table = "ALTER TABLE cart DROP id ";

            $add_table=  "ALTER TABLE cart ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ";

            $run_pro = mysql_query($insert_pro, $con);
             $run_drop = mysql_query( $drop_table,$con);
          $run_add_table = mysql_query( $add_table,$con);

          if ($run_pro && $run_drop && $run_add_table) {

              echo "<script>window.open('checkout.php','_self');</script>";
            
            
          }
          

        }

       }

}

//getting the total items

function total_items()
{
    if (isset($_GET['rp_cart'])&& isset($_GET['diy_cart']) && isset($_GET['buy_now']) ) {

        global $con;

        $count_items = 0;

        $ip = getIp();

        $get_items = "SELECT * FROM cart WHERE ip_add='$ip'";

        $run_items = mysql_query ($get_items , $con);

        $count_items = mysql_num_rows($run_items);
    }

        else {

            global $con;

        $ip = getIp();

        $get_items = "SELECT * FROM cart WHERE ip_add='$ip'";

        $run_items = mysql_query( $get_items,$con);

        $count_items = mysql_num_rows($run_items);

        }

        echo $count_items;

    
}

//getting the total price

function total_price()
{
   $total = 0;
   global $con;

   $ip= getIp();

   $sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";

   $run_price = mysql_query( $sel_price,$con);

   while ($p_price = mysql_fetch_array($run_price)) {

       $pro_id = $p_price['p_id'];

       $pro_price = "SELECT * FROM products WHERE product_id='$pro_id' ";

       $run_pro_price = mysql_query( $pro_price, $con);

       while ($pp_price=mysql_fetch_array($run_pro_price)) {
           
           $product_price =  array($pp_price['product_price']);

           $values = array_sum($product_price);

           $total += $values;
       }
   }

echo $total;

}

//getting the categories

function getcats()
{
	global $con ;
    
    $get_cats = "select * from categories order by cat_title";
    $run_cats = mysql_query( $get_cats,$con);


    while ($row_cats = mysql_fetch_array($run_cats) ) 
    {
    	$cat_id = $row_cats['cat_id'];
    	$cat_title = $row_cats['cat_title'];

        
          
        echo "  <ul ><a href='category.php?cat=$cat_title' style='color:black;'><strong>$cat_title <strong></a></ul>";
         
        

    	
        

    } 

}


//getting the products

function getpro()
{
    if(!isset($_GET['cat'])){

    global $con;

    $get_pro = "SELECT * FROM products ORDER BY RAND() LIMIT 0,6";

    $run_pro = mysql_query( $get_pro, $con) or die(mysql_error());



    while ($row_pro = mysql_fetch_array($run_pro)) 
    {
        $pro_id = $row_pro['product_id'];
        $pro_cat1 = $row_pro['product_cat1'];
        $pro_price = $row_pro['product_price'];

        $pro_title = $row_pro['product_title'];
        $pro_image = $row_pro['product_image'];

      
        
      echo "
      <div class = col-lg-4 col-xs-12 col-md-6 col-sm-12 >  
      <div class='panel panel-default' style= 'font-family: 'Muli', sans-serif;' >
      <div class='panel-body'>
      
       <img src='admin_area/product_img/$pro_image'  width='200' height='180' />

       <div class='panel panel-default'style= 'font-family: 'Muli', sans-serif;' >
      <div class='panel-body'>

      <a href='details1.php?pro_id=$pro_id'>
      
      <div style='font-family: 'Muli', sans-serif;'><strong>$pro_title</strong> </div>

      </a>

      <p style='font-weight:900; float:left ; padding-top: 10px;'> ₹ $pro_price</p>

      <a href='index.php?rp_cart=$pro_id' style='float:right';> <img src='images/addtocart.png' width='30' height='30' /> </a>

     

      </div>
      </div>
      </div>



      </div>
      </div>

      ";

    }
}





}

//getting the new arrivals

function newgetpro()
{
    if(!isset($_GET['cat'])){

    global $con;

    $get_pro = "SELECT * FROM products WHERE product_where='New_arrivals' ORDER BY RAND() LIMIT 0,3";

    $run_pro = mysql_query( $get_pro, $con );

    

    while ($row_pro = mysql_fetch_array($run_pro)) 
    {
        $pro_id = $row_pro['product_id'];
        $pro_cat1 = $row_pro['product_cat1'];
        $pro_price = $row_pro['product_price'];

        $pro_title = $row_pro['product_title'];
        $pro_image = $row_pro['product_image'];



        
      echo "
      <div class = col-lg-4 col-xs-12 col-md-6 col-sm-12 >  
      <div class='panel panel-default' style='border-style:solid;border-color:black;border-width: 3px;'>
      <div class='panel-body'>
      
       <img src='admin_area/product_img/$pro_image'  width='200' height='180' />

       <div class='panel panel-default'>
      <div class='panel-body'>

      <a href='details1.php?pro_id=$pro_id'>
      
      <h5 style= 'font-family: 'Muli', sans-serif;'><strong>$pro_title</strong> </h5>

      </a>

      <p style='font-weight:900; float:left ; padding-top: 10px;'> ₹ $pro_price</p>

      <a href='index.php?rp_cart=$pro_id' style='float:right';> <img src='images/addtocart.png' width='30' height='30' /> </a>

      

      </div>
      </div>
      </div>



      </div>
      </div>

      ";

    }
}


}

//getting the trending now

function trendgetpro()
{
    if(!isset($_GET['cat'])){

    global $con;

   $get_pro = "SELECT * FROM products WHERE product_where='Trending_now' ORDER BY RAND() LIMIT 0,3";

    $run_pro = mysql_query( $get_pro, $con );

    while ($row_pro = mysql_fetch_array($run_pro)) 
    {
        $pro_id = $row_pro['product_id'];
        $pro_cat1 = $row_pro['product_cat1'];
        $pro_price = $row_pro['product_price'];

        $pro_title = $row_pro['product_title'];
        $pro_image = $row_pro['product_image'];
        
      echo "
      <div class = col-lg-4 col-xs-12 col-md-6 col-sm-12 >  
      <div class='panel panel-default'  style='border-style:solid;border-color:black;border-width: 3px;'>
      <div class='panel-body'>
      
       <img src='admin_area/product_img/$pro_image'  width='200' height='180' />

       <div class='panel panel-default'>
      <div class='panel-body'>

      <a href='details1.php?pro_id=$pro_id'>
      
      <h5 style= 'font-family: 'Muli', sans-serif;'><strong>$pro_title</strong> </h5>

      </a>

      <p style='font-weight:900; float:left ; padding-top: 10px;'> ₹ $pro_price</p>

      <a href='index.php?rp_cart=$pro_id' style='float:right';> <img src='images/addtocart.png' width='30' height='30' /> </a>

      

      </div>
      </div>
      </div>



      </div>
      </div>

      ";

    }
}


}




//getting the category page



function getcatpro()
{
    if(isset($_GET['cat'])){

        global $con;


        $cat_title = $_GET['cat'];

    $get_cat_pro = "SELECT * FROM products WHERE product_cat1='$cat_title' OR product_cat2='$cat_title' OR product_cat3='$cat_title' OR product_cat4='$cat_title' ";

    $run_cat_pro = mysql_query( $get_cat_pro, $con);

    $count_car = mysql_num_rows($run_cat_pro);

    if ($count_car == 0) {

        echo '<h3>No product in this category !</h3>';
    }

    while ($row_cat_pro = mysql_fetch_array($run_cat_pro)) 
    {
        $pro_id = $row_cat_pro['product_id'];
        $pro_cat1 = $row_cat_pro['product_cat1'];
        $pro_price = $row_cat_pro['product_price'];

        $pro_title = $row_cat_pro['product_title'];
        $pro_image = $row_cat_pro['product_image'];
        
      echo "
      <div class = 'col-lg-4 col-xs-12 col-sm-6 col-md-6' >
      <div class='panel panel-default' style='border-style:solid;border-color:black;border-width: 3px;' >
      <div class='panel-body'>
      
       <img src='admin_area/product_img/$pro_image' width='200' height='180' />

       <div class='panel panel-default'>
      <div class='panel-body'>

      <a href='details1.php?pro_id=$pro_id'>
      
       <h5 style= 'font-family: 'Muli', sans-serif;'><strong>$pro_title</strong> </h5>

      </a>

      <p style='font-weight:900; float:left ; padding-top: 10px;'> ₹ $pro_price</p>

      <a href='index.php?rp_cart=$pro_id' style='float:right';> <img src='images/addtocart.png' width='30' height='30' /> </a>

      <br>

      </div>
      </div>
      </div>



      </div>
      </div>

      

      





      ";

    }
}


}


//getting the category count


function getcatprocount()
{
    if(isset($_GET['cat'])){

        global $con;


        $cat_title = $_GET['cat'];

    $get_cat_pro_count = "SELECT * FROM products WHERE product_cat1='$cat_title' OR product_cat2='$cat_title' OR product_cat3='$cat_title' OR product_cat4='$cat_title' ";

    $run_cat_pro_count = mysql_query( $get_cat_pro_count, $con);

    $count_car_count = mysql_num_rows($run_cat_pro_count);

    if ($count_car_count != 0) {

        echo " Number of product in this category:  $count_car_count ";
    }

    

}

}

?>
