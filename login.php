<!DOCTYPE html>
<?php

session_start();


if (isset($_SESSION['customer_email'])) {

echo "<script>alert('You have already logged in successfully')</script>";  
echo "<script>window.open('index.php','_self')</script>";

}

else{



?>



<?php

session_start();
include("functions/functions.php");
include("includes/db.php");



?>
<html >
  <head>
    <meta charset="UTF-8">
    <title> Elecbits Accounts</title>
    
    
    <link rel="stylesheet" href="styles/css/reset.css">
    
    <meta name="viewport"> 
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#0070FF">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#0070FF">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="styles/css/stylelogin.css">

    
    
    
  </head>

  <body>

    
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <a href="index.php"><img src="images/transymbol.png" width="100px" height="100px"></a>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Sign Up</div>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form method="post" action="" >
      <input type="email"   name="email"  placeholder="Email" required/>
      <input type="password" name="pass" placeholder="Password" required/>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
  <div class="form">
    <h2>Create an account</h2>
    <form method="post" action=" ">
      <input type="text" name="c_name" placeholder="Name"  required/>
      <input type="password"  name="c_pass" placeholder="Password" required/>
      <input type="email" name="c_email" placeholder="Email Address" required/>
      <input type="tel"  name="c_contact" placeholder="Phone Number"  required/>
      <button type="submit" name="register" >Register</button>
    </form>
  </div>
 
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


        <script src="styles/js/login.js"></script>

    
    
    
  </body>
</html>


<?php

if (isset($_POST['login'])) {
  

  $c_email = $_POST['email'];
  $c_pass = $_POST['pass'];

  $sel_c="SELECT * FROM customers WHERE customer_email='$c_email' AND customer_pass = '$c_pass' ";

  $run_c = mysql_query( $sel_c, $con );

  $check_customer = mysql_num_rows($run_c);

  if ($check_customer == 0) {
    
    echo "<script>alert('Password or email is incorrect !')</script>";
    exit();
  }


$ip = getIp();

$sel_cart ="SELECT * FROM cart WHERE ip_add='$ip'";

$run_cart= mysql_query( $sel_cart, $con );

$check_cart = mysql_num_rows($run_cart);

if ($check_customer > 0 AND $check_cart == 0)  {
  
   $_SESSION['customer_email']= $c_email;

echo "<script>alert('You logged in successfully')</script>";
echo "<script>window.open('account.php','_self')</script>";
}

else{

$_SESSION['customer_email']= $c_email;

echo "<script>alert('You logged in successfully')</script>";
echo "<script>window.open('checkout.php','_self')</script>";
}
}


?>




 <?php
if (isset($_POST['register'])) {


  $ip= getIp();

  $c_name= $_POST['c_name'];


  $c_email= $_POST['c_email'];
  
  $confemail = "SELECT * FROM customers WHERE customer_email='$c_email'";
  
  $run_email = mysql_query($confemail,$con);
  
  $count_email= mysql_num_rows($run_email);
  
  if( $count_email > 0 )
  {
  
  echo "<script>alert('Account with this email already exist.')</script>";
echo "<script>window.open('customer/logout.php','_self')</script>";
    die();
  }
  
  else

  $c_pass= $_POST['c_pass'];

  $c_contact= $_POST['c_contact'];

  $check = "The message is $ip, $c_name, $c_email,  $c_contact";
  
  $from = "from: Support@elecbits.in";
  
   $msg = "Thanks for contacting Elecbits, Have a great shopping experience.  Meanwhile visit us at http://elecbits.in";

  
  if((mail("saurav.rav67@gmail.com", "New Addition", $check, $from)) && (mail("$c_email", "Registration successful", $msg, $from))&&(mail("elecbits16@gmail.com", "New Addition", $check, $from)) ){


 $insert_c ="INSERT INTO customers (customer_ip, customer_name, customer_email, customer_pass, customer_contact) VALUES ('$ip', '$c_name','$c_email','$c_pass', '$c_contact')";


$run_c= mysql_query( $insert_c, $con );


$sel_cart ="SELECT * FROM cart WHERE ip_add='$ip'";

$run_cart= mysql_query( $sel_cart, $con );

$check_cart = mysql_num_rows($run_cart);



if ($check_cart == 0) {

  $_SESSION['customer_email']= $c_email;
  
 

echo "<script>alert('Account has been successfully created')</script>";
echo "<script>window.open('account.php','_self')</script>";

}
  
  

  else
  {
    $_SESSION['customer_email']= $c_email;
    
   
echo "<script>alert('Account has been successfully created')</script>";
echo "<script>window.open('checkout.php','_self')</script>";
  
  }
}

}
}


?>

