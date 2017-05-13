<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    
    <!-- Tab panes -->
    <div class="container">
      <!-- Home tab content -->
      <div >

      <?php


$user= $_SESSION['customer_email'];

$get_customer = "SELECT * FROM learn WHERE customer_email='$user'";

$run_get_customer=mysql_query( $get_customer, $con);

while ($row_customer = mysql_fetch_array($run_get_customer)) {

$c_id = $row_customer['customer_id'];

$name = $row_customer['customer_name'];

$email = $row_customer['customer_email'];

$pass = $row_customer['customer_pass'];

$country = $row_customer['customer_country'];

$city= $row_customer['customer_city'];

$address = $row_customer['customer_address'];

$contact = $row_customer['customer_contact'];






?>
<br>
<br>

<p>Update your account</p>

You have 100 Points
<br>

<form method="post" enctype="multipart/formdata" action="">
  <div class="form-group">
    <label for="email">Name:</label>
    <br>
 <input type="text" name="c_name" value="<?php echo $name; ?>" required/> 
 </div>
 <div class="form-group">
    <label for="email"> Contact:</label>
    <br>
 <input type="text" name="c_contact"  value="<?php echo $contact; ?>" />
  </div>
 
 <div class="form-group">
    <label for="email"> Email:</label>
    <br>
 <input type="text" name="c_name" value="<?php echo $email; ?>" disabled>
  </div>

 
  <button type="submit" name="update" class="btn btn-default">Submit</button>
 

<?php
}
?>


</form>
        <h3 class="control-sidebar-heading">Downloads</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Elecduino</h4>

               
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Videos</h4>

               
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Buy Now</h4>

              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Enroll Now</h4>

             
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

     

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
  
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
    
      <!-- /.tab-pane -->
    </div>
  </aside>


</body>
</html>


 <?php
if (isset($_POST['update'])) {


  $ip= getIp();

  $customer_id= $c_id;

  $c_name= $_POST['c_name'];


 

 

  



  $c_contact= $_POST['c_contact'];





 $update_c ="UPDATE learn SET customer_name='$c_name',   customer_contact='$c_contact' WHERE customer_id ='$customer_id'  ";


$run_c= mysql_query( $update_c, $con);



if ($run_c) {
  echo "<script>alert('Your account is updated')</script>";
  

  echo "<script>window.open('index.php','_self')</script>";
}


}


?>




 






