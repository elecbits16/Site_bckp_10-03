<!DOCTYPE html>

<?php

session_start();
include("../functions/functions.php");

?>



<html>
<head>
  <title>Quiz test</title>

  <?php
   

   include("../public/link.php");

  ?>

<style>
.error {color: #FF0000;}
</style>

</head>
<body>


<div class="container" style="padding-top: 100px;">


<?php

$get_quiz = "SELECT * FROM quiz where quiz_id ='QZ24'";

$run_quiz = mysql_query($get_quiz, $con);

$row_quiz = mysql_fetch_array($run_quiz) ;

  $question_id1 = $row_quiz['question_id1'];
 $question1 = $row_quiz['question1'];
   $opt_A1 = $row_quiz['opt_A1'];
   $opt_B1 = $row_quiz['opt_B1'];
  
   $opt_C1 = $row_quiz['opt_C1'];

   $opt_D1 = $row_quiz['opt_D1'];
   $correct_opt1 = $row_quiz['correct_opt1'];




  $question_id2 = $row_quiz['question_id2'];
 $question2 = $row_quiz['question2'];
   $opt_A2 = $row_quiz['opt_A2'];
   $opt_B2 = $row_quiz['opt_B2'];
  
   $opt_C2 = $row_quiz['opt_C2'];

   $opt_D2 = $row_quiz['opt_D2'];
   $correct_opt2 = $row_quiz['correct_opt2'];



   $question_id3 = $row_quiz['question_id3'];
 $question3 = $row_quiz['question3'];
   $opt_A3 = $row_quiz['opt_A3'];
   $opt_B3 = $row_quiz['opt_B3'];
  
   $opt_C3 = $row_quiz['opt_C3'];

   $opt_D3 = $row_quiz['opt_D3'];
   $correct_opt3 = $row_quiz['correct_opt3'];




   $question_id4 = $row_quiz['question_id4'];
 $question4 = $row_quiz['question4'];
   $opt_A4 = $row_quiz['opt_A4'];
   $opt_B4 = $row_quiz['opt_B4'];
  
   $opt_C4 = $row_quiz['opt_C4'];

   $opt_D4 = $row_quiz['opt_D4'];
   $correct_opt4 = $row_quiz['correct_opt4'];

$opt_11err =  $opt_22err = $opt_33err = $opt_44err = " ";




if (isset($_POST['update'])) {

$opt_11 = $_POST['opt_11'] ; 
$opt_22 = $_POST['opt_22'] ; 
$opt_33 = $_POST['opt_33'] ; 
$opt_44 = $_POST['opt_44'] ; 

   




if ( ($opt_11 == $correct_opt1) && ($opt_22 == $correct_opt2) && ($opt_33 == $correct_opt3) &&  ($opt_44 == $correct_opt4) ) {


   echo "<script>alert('Correct Ansswers')</script>";  
  
}


else

{
  

 if (($opt_11 != $correct_opt1)) {

    $opt_11err = "Incorrect answer" ;
   
   }


   if (($opt_22 != $correct_opt2)) {

    $opt_22err = "Incorrect answer" ;
   
   }

if (($opt_33 != $correct_opt3)) {

    $opt_33err = "Incorrect answer" ;
   
   }

if (($opt_44 != $correct_opt4)) {

    $opt_44err = "Incorrect answer" ;
   
   }






}

}







?>




<form action="" method="post">

<div class="col-lg-6">
<p><?php echo $question1 ?>  <span class="error">* <?php echo $opt_11err ?></span> </p>
  
      <div class="radio">
      <label><input type="radio" name="opt_11" value="A" required><?php echo $opt_A1; ?></label>
    </div>
    <div class="radio">
      <label><input type="radio" name="opt_11" value="B"><?php echo $opt_B1; ?></label>
    </div>
    <div class="radio ">
      <label><input type="radio" name="opt_11" value="C" ><?php echo $opt_C1; ?></label>
    </div>
<div class="radio ">
      <label><input type="radio" name="opt_11" value="D" ><?php echo $opt_D1; ?></label>
    </div>



<p><?php echo $question2 ?>  <span class="error">* <?php echo $opt_22err ?></span> </p>
  
    <div class="radio">
      <label><input type="radio" name="opt_22" value="A" required><?php echo $opt_A2; ?></label>
    </div>
    <div class="radio">
      <label><input type="radio" name="opt_22" value="B"><?php echo $opt_B2; ?></label>
    </div>
    <div class="radio ">
      <label><input type="radio" name="opt_22" value="C" ><?php echo $opt_C2; ?></label>
    </div>
<div class="radio ">
      <label><input type="radio" name="opt_22" value="D" ><?php echo $opt_D2; ?></label>
    </div>


</div>

<div class="col-lg-6">

<p><?php echo $question3 ?>  <span class="error">* <?php echo $opt_33err ?></span> </p>
  
    <div class="radio">
      <label><input type="radio" name="opt_33" value="A" required><?php echo $opt_A3; ?></label>
    </div>
    <div class="radio">
      <label><input type="radio" name="opt_33" value="B"><?php echo $opt_B3; ?></label>
    </div>
    <div class="radio ">
      <label><input type="radio" name="opt_33" value="C" ><?php echo $opt_C3; ?></label>
    </div>
<div class="radio ">
      <label><input type="radio" name="opt_33" value="D" ><?php echo $opt_D3; ?></label>
    </div>




<p><?php echo $question4 ?>  <span class="error">* <?php echo $opt_44err ?></span> </p>
  
    <div class="radio">
      <label><input type="radio" name="opt_44" value="A" required><?php echo $opt_A4; ?></label>
    </div>
    <div class="radio">
      <label><input type="radio" name="opt_44" value="B"><?php echo $opt_B4; ?></label>
    </div>
    <div class="radio ">
      <label><input type="radio" name="opt_44" value="C" ><?php echo $opt_C4; ?></label>
    </div>
<div class="radio ">
      <label><input type="radio" name="opt_44" value="D" ><?php echo $opt_D4; ?></label>
    </div>


</div>










<div >
      <button type="submit" name="update" style="padding : 10px 10px 10px 10px; "">Submit</button>
    </div>

</form>








</div>











</body>
</html>







