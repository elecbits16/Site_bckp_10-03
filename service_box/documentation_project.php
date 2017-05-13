<html lang="en" >
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
      <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>

      
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <style>
  
        
      </style>
      <script language="javascript">
   angular
  .module('inputBasicDemo', ['ngMaterial', 'ngMessages'])
  .controller('DemoCtrl', function($scope) {
    $scope.user = {
      title: '',
      email_c: '',
      phone_c: '',
      lastName: '',
      company: '',
      address: '',
      city: '',
      biography: '',
      state:'',
     
    };

    $scope.states = ('').split(' ').map(function(state) {
        return {abbrev: state};
      });
  })
  .config(function($mdThemingProvider) {

    // Configure a dark theme with primary foreground yellow

    $mdThemingProvider.theme('docs-dark', 'default')
      .primaryPalette('yellow')
      .dark();

  });
             
      </script> 
    



   </head>

   <body ng-app="inputBasicDemo">

  <div ng-controller="DemoCtrl" layout="column" ng-cloak class="md-inline-form">

<p style="font-weight: 800;">DOCUMENTATION OF PROJECTS</p>
<form method="post" action="">
  <div  layout-gt-sm="row" >
    

      <md-input-container  class="md-block" flex-gt-sm>
        <label>Name</label>
        <input ng-model="user.title" type="name" name="title" required>
      </md-input-container>

      <md-input-container class="md-block" flex-gt-sm>
        <label>Email</label>
        <input ng-model="user.email_c" type="email" name="email_c" required>
      </md-input-container>
    </div>
 

  <md-content >
    <div>
      

     <div layout-gt-sm="row">
          <md-input-container class="md-block" flex-gt-sm>
            <label>Phone</label>
            <input ng-model="user.phone_c" name="phone_c" required>
          </md-input-container>

          <md-input-container class="md-block" flex-gt-sm>
            <label>Project Title </label>
            <input ng-model="theMax" name="pt" required>
          </md-input-container>
        </div>

 <div layout-gt-xs="row">

         <div flex-gt-xs>
         
          <p style="margin:0px">Delivery Date</p> <span style="font-size: 15px;"> (Closest date would be <?php echo date('d-m-Y', strtotime("+3 day")); ?>)</span>
          <br> <br>
          <input type="date" class="form-date" name="ddate1"  min='<?php echo date('Y-m-d', strtotime("+3 day")); ?>'  required>
     
      
    </div>

 </div>


<br>
       


      
<br>
 <div layout-gt-sm="row">
<div class="col-lg-6">

<label>Select Range :</label>
     <div class="radio">
  <label><input type="radio" name="range"   value="Synopsis">Synopsis  </label> 
       
</div>

<div class="radio">
  <label><input type="radio" name="range" value="Synopsis and Reports">Synopsis and Reports </label>
</div>

<div class="radio ">
  <label><input type="radio" name="range"  value="Presentation, synopsis and reports" >Presentation, synopsis and reports</label>
</div>

<div class="radio ">
  <label><input type="radio" name="range"  value="Other Services(Reasearch Paper)" >Other Services(Reasearch Paper) </label>
</div>
   </div>





</div>






<br>
  <div layout-gt-lg="row">
        <md-input-container class="md-block">
          <label>Project Description</label>
          <textarea ng-model="user.biography" name="biography" md-maxlength="150" rows="5" md-select-on-focus required></textarea>
        </md-input-container>

        </div>


   <div layout-gt-sm="row">
          <md-input-container class="md-block" flex-gt-sm>
            <label>Have a promocode ?</label>
            <input ng-model="user.promocode" name="promocode" >
          </md-input-container>

         
        </div>


<br>
<div style="float: right;">
<button  type="submit"  name="update1" class="btn btn-success btn-lg" >Submit</button>
</div>













</form>
    </div>
  </md-content>

</div>
   
   </body>
</html>


<?php

  if (isset($_POST['update1'])) {

    $ip= getIp();
 $promocode = $_POST['promocode'];


   $sys = 'Documentation';
  $name = $_POST['title'];
  
  $mailid = $_POST['email_c'];
  $range = $_POST['range'];


  $contact1 = $_POST['phone_c'];

  $ddate1 = $_POST['ddate1'];
  $title1 = $_POST['pt'];
  $desc = $_POST['biography'];
  


// echo  " $ip, $name, $sys, $mailid, $range, $contact1,    $ddate1, $title1 ,  $desc, $promocode ";

   $msg = "$ip,  $name, $sys, $mailid, $range, $contact1,     $ddate1, $title1 ,  $desc, $promocode ";

   $message = "Thanks for contacting Elecbits, we will respond to you soon.  Meanwhile visit us at http://elecbits.in";

    $from= "from: Info_Elecbits@elecbits.in";

if(filter_var($mailid, FILTER_VALIDATE_EMAIL)){

if( mail("saurav.rav67@gmail.com", "Project", $msg, $from) && mail("elecbits16@gmail.com", "Project", $msg, $from) &&mail($mailid, "We appreciate your concern", $message , $from) ) 
      {  
           echo "<script>alert('Your response has been added. Your response is important to us.')</script>";  
           echo "<script>window.open('services.php','_self')</script>";
      }  

}









}
?>