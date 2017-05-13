<!DOCTYPE html>
<html>
<head>
	<title></title>
 
</head>
<body>
  
    <!-- Content Header (Page header)

    
    <section class="content-header">
      <h1>
        
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">


      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
        
          <!-- /.nav-tabs-custom -->

          <?php

          if (isset($_GET['lesson_id'])) {
     

     include("lesson1.php");
   }

else

{
  echo "Hello World";
}



          ?>

          <!-- Chat box -->
    
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
        
          <!-- /.box -->

          <!-- quick email widget -->
        

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
         
          <!-- /.box -->

          <!-- solid sales graph -->
    
          <!-- /.box -->

          <!-- Calendar -->
     
          <!-- /.box 

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>



</body>
</html>


<?php
