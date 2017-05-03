<?php

include_once 'config.php';
if(isset($_POST['btn-save']))
{
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$bio = $_POST['bio'];
$year = $_POST['year'];


if($db->create($firstname,$lastname,$bio,$year))
{
header("Location: create.php?inserted");
}
else
{
  header("Location: create.php?failure");
}
}
?>

<?php include_once 'header.php';?>
<div class="clearfix"></div>

<?php
  if(isset($_GET['inserted']))
  {
 ?>

<div class="container">
<div class="alert alert-info">
   <strong>WOW!</strong> Record was inserted successfully <a href="index.php">HOME</a>!
</div>
</div>

<?php
}
elseif(isset($_GET['failure']))
{
?>

 <div class="container">
<div class="alert alert-warning">
<strong>SORRY!</strong> ERROR while inserting record !
</div>
</div>

<?php
}
?>

<div class="clearfix"></div><br />

<div class="container">


  <form method='post'>

     <table class='table table-bordered'>

         <tr>
             <td>First Name</td>
             <td><input type='text' name='firstname' class='form-control' required></td>
         </tr>

         <tr>
             <td>Last Name</td>
             <td><input type='text' name='lastname' class='form-control' required></td>
         </tr>

         <tr>
             <td>Bio</td>
             <td><input type='text' name='bio' class='form-control' required></td>
         </tr>

         <tr>
             <td>Year</td>
             <td><input type='text' name='year' class='form-control' required></td>
         </tr>

         <tr>
             <td colspan="2">
             <button type="submit" class="btn btn-primary" name="btn-save">
       <span class="glyphicon glyphicon-plus"></span> Create New Record
    </button>
             <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
             </td>
         </tr>

     </table>
 </form>


 </div>

 <?php include_once 'footer.php'; ?>
