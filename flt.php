<!DOCTYPE html>
<html>
<head>
<!-- CSS -->	
<style>

.floating-menu {
font-family: sans-serif;
width: 300px;
z-index: 100;
position: fixed;
bottom: 0px;
right: 0px;
color: white;
}

.floating-menu a, 
.floating-menu h3 {
font-size: 0.9em;
display: block;
}

</style>

</head>
<body>

<!-- HTML -->
<main>

<nav class="floating-menu" >


<div class="panel-group"  >
  <div class="panel panel-default" >
    <div class="panel-heading" >
      <h4 class="panel-title"  >
        <a data-toggle="collapse" href="#collapse1" style="color: black; font-size: 16px;"  ><strong>REQUEST A CALLBACK</strong></a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body" style="background-color: white; color: black; font-family: 'Muli', sans-serif;">
      	
   <form method="post"  action=" ">
 <div class="form-group">
    <label for="email">Name:</label>
    <input type="text" class="form-control" name="name" id="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Phone No:</label>
    <input type="tel" class="form-control" name="phone" id="pwd" required>
  </div>
    <div class="form-group">
    <label for="pwd">Message</label>
    <textarea type="text" class="form-control" name="msg" required> </textarea>
  </div>
  
  <button type="submit" class="btn btn-default" name="submit">Submit</button>





   </form>

   <?php
   if (isset($_POST['submit']))

    {

      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $msg = $_POST['msg'];
     
      $messgage = "$name,  $phone, $msg";

       $from= "from: Callback_Elecbits@elecbits.in";

       if( mail("saurav.rav67@gmail.com", "Project", $messgage, $from) && mail("elecbits16@gmail.com", "Project", $messgage, $from)  ) 
      {  
           echo "<script>alert('Your response has been added. Your response is important to us.')</script>";  
      }  

   }


?>




      </div>
    
    </div>
  </div>
</div>

</nav>

</main>

</body>
</html>