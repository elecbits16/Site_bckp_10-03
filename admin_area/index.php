<?php

session_start();
include("../functions/functions.php");
if (!isset($_SESSION['user_email'])) {
  
  echo "<script>window.open('login.php?not_admin=You are not an admin !','_self')</script>";
}

else{


?>



<!DOCTYPE html>


<html>
<head>  <!-- Links of sheet -->
  <title>Elecbits</title>
  <meta charset="utf-8">
  <meta name="viewport"> 

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles/custom.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">


  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Links of sheet end -->
<!--Top bar start-->

<div class="container-fluid" style="font-family: 'Montserrat', sans-serif; font-size: 12px;   background-color: #ECECEB; padding:10px 0px 0px 0px; margin: 0px 0px 
0px 0px;">

<!-- Top bar start -->


<!--Top bar end-->

	

<!--Logo bar start-->
<div id="logobar" >
<div class="container">
    <div id="tag121"  class="col-lg-12">
          <a href="index.php">  <img src="../images/logo.png" width="250" style="padding: 20px 0px 20px 10px; "></a>

<h3 style="float: right; padding: 10px 100px 0px 100px; ">MANAGE YOUR CONTENT</h3>
     
    
     
    </div>
    
</div>
</div>
<!--Logo bar end-->

<!--Menu bar start-->

   <!-- Menu bar end--> 

<!--Panel1--> 
  <div class="body" >
  <div class="container">
  
  <div class="panel panel-default">
 
    <div id="pb1" class="panel-body" style=" padding: 100px 0px 100px 20px; ">
    
   
     <div class="tag126" class="col-lg-12 bg-primary">
     
 <div class="sidebar">

<div id="tag31" class="col-lg-3" style=" padding: 0px 10px 10px 10px ; "> 
   


<div style=" text-align: center; color: white ; background-color:#0070FF; padding: 10px 0px 10px 0px ; font-size: 18px;  "> ADMIN PANEL </div> 

<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?insert_product" style=" color: black; ">Insert Products</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?insert_product_pic" style=" color: black; ">Insert Products Pic</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?insert_block" style=" color: black; ">Insert Block diagram</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?insert_doc" style=" color: black; ">Insert Doc file</a></div>

<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?software" style=" color: black; ">Insert software</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?insert_software_pic" style=" color: black; ">Insert Software Pic</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?insert_output_pic1" style=" color: black; ">Insert Output Pic1</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?insert_output_pic2" style=" color: black; ">Insert Software code</a></div>

<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?view_products" style=" color: black; ">View Products</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?view_soft" style=" color: black; ">View Software</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?insert_cat" style=" color: black; ">Insert Categories</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?view_cats" style=" color: black; ">View Categories</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?view_customers" style=" color: black; ">View Customers</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?view_orders" style=" color: black; ">View orders</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?view_payments" style=" color: black; ">View Payments</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="create_invoice.php" target="_blank" style=" color: black; ">Create Invoice</a></div>

<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?view_invoice" style=" color: black; ">View Invoice</a></div>


<hr>
Elecduino
<hr>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?insert_lesson" style=" color: black; ">Insert Lesson</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?view_lesson" style=" color: black; ">View Lesson</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?insert_quiz" style=" color: black; ">Insert Quiz</a></div>
<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="index.php?view_quiz" style=" color: black; ">View Quiz</a></div>







<div style=" text-align: center;  background-color: #99ff99; padding: 10px 0px 10px 0px ; font-size: 16px;"><a href="logout.php" style=" color: black; ">Admin Logout</a></div>


 





</div>
</div>
<div id="tag91" class="col-lg-9 ">


   

  <div class="panel panel-default"> 
 
    <div id="pb1" class="panel-body" style=" padding: 10px 20px 100px 20px; ">

   <?php echo @$_GET['logged_in']; ?>

   
   <?php

   if (isset($_GET['insert_product'])) {
     

     include("insert_products.php");
   }

   

   if(isset($_GET['insert_product_pic'])) {
     

     include("picuploadtest.php");
   }


   if(isset($_GET['view_products'])) {
     

     include("view_products.php");
   }

  
   if(isset($_GET['edit_pro'])) {
     

     include("edit_pro.php");
   }


   if(isset($_GET['insert_cat'])) {
     

     include("insert_cat.php");
   }
   if(isset($_GET['view_cats'])) {
     

     include("view_cats.php");
   }

   if(isset($_GET['edit_cat'])) {
     

     include("edit_cat.php");
   }

   if(isset($_GET['view_customers'])) {
     

     include("view_customers.php");
   }

   if (isset($_GET['view_orders'])) {
     
     include("view_orders.php");
   }
if (isset($_GET['track_order'])) {
     
     include("track_order.php");
   }

   if (isset($_GET['insert_doc'])) {
     
     include("doctest.php");
   }
 if (isset($_GET['insert_block'])) {
     
     include("blockpic.php");
   }
 if (isset($_GET['software'])) {
     
     include("insoft.php");
   }


     if (isset($_GET['view_soft'])) {
     
     include("view_soft.php");
   }

    if (isset($_GET['edit_soft'])) {
     
     include("edit_soft.php");
   }

      if (isset($_GET['insert_software_pic'])) {
     
     include("multi_upload.php");
   }


      if (isset($_GET['insert_output_pic1'])) {
     
     include("multi_upload1.php");
   }

       if (isset($_GET['insert_output_pic2'])) {
     
     include("multi_upload2.php");
   }
   
   if (isset($_GET['insert_output_pic3'])) {
     
     include("multi_upload3.php");
   }


    if (isset($_GET['view_invoice'])) {
     
     include("view_invoice.php");
   }


    if (isset($_GET['insert_lesson'])) {
     

     include("insert_lesson.php");
   }


    if (isset($_GET['insert_quiz'])) {
     

     include("insert_quiz.php");
   }


    if (isset($_GET['view_lesson'])) {
     

     include("view_lesson.php");
   }

    if (isset($_GET['view_quiz'])) {
     

     include("view_quiz.php");
   }


 

 if (isset($_GET['edit_lesson'])) {
     

     include("edit_lesson.php");
   }


 if (isset($_GET['edit_quiz'])) {
     

     include("edit_quiz.php");
   }



   ?>

      

   </div>

   </div>

    </div>
       
</div>
    
  
</div>
</div>
</div>
</div>
<!--Panel1 end-->  

<!--footer start-->

<div class="container-fluid" style="font-family: 'Montserrat', sans-serif; font-size: 12px;   background-color: #0070FF; padding:10px 0px 0px 0px; margin: 0px 0px 
0px 0px;">

<!-- footer start -->
<div id="footbar">
  <div class="nav navbar-nav" style=" float: left;  padding: 0px 40px 10px 40px; margin: 0px 0px 0px 0px; ">

  <a href="#" style="padding-left: 20px; "><span id="g2" class="glyphicon glyphicon-bookmark" style="vertical-align: text-top; padding-right:10px;"></span>&nbspTerms & Condition</a>
    <a href="#" style="padding-left: 20px; "><span id="g2" class="glyphicon glyphicon-heart" style="vertical-align: text-top; padding-right:10px;"></span>&nbspPrivacy policy</a>
    <a href="#" style="padding-left: 20px; "><span id="g2" class="glyphicon glyphicon-phone-alt" style="vertical-align: text-top; padding-right:10px; ">
    </span>&nbspCustomer Service</a> 
    <a href="#" style="padding-left: 20px; "><span  id="g2" class="glyphicon glyphicon-thumbs-up" style="vertical-align: text-top; padding-right:10px; ">
    </span>&nbspPartner Us</a> 
    <a href="#" style="padding-left: 20px; "><span id="g2" class="glyphicon glyphicon-envelope" style="vertical-align: text-top; padding-right:10px; ">
    </span>&nbspContact Us</a> 
  
   
    </div>
 </div> 

</div> 

<!--footer end-->

</div>








</body>
</html>

<?php } ?> 