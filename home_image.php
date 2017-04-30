<?php
//include config file
include_once 'config.php';

//include header
include_once 'header.php';
?>
<!-- form to submit image path -->
<div class="clearfix"></div><br />

<div class="container">

<form method='post'>

<input type="file" name="image" accept="image/jpeg, image/png">
<input value="Submit" name='btn-submit' type="submit">
</form>
<br>
<a href="index.php" class="btn btn-large btn-primary">Back to index</a>

<?php

//when submit button is clicked

if(isset($_POST['btn-submit']))
{

//select image for individual invention by id (home page)
  $id = $_GET['image_id'];

  $filepath = $_POST['filepath'];
  $filetemp=$_FILES['image']['tmp_name'];
  $filename=$_FILES['image']['name'];
  $filetype=$_FILES['image']['type'];

  //include image path and name
  $filepath = "images/" . $filename;

  move_uploaded_file($filetemp, $filepath);
  //$file="/inventorapp/css/images/".$_FILES["image"]["name"];

//insert image path into database column home_image
$query = "INSERT INTO inventors (filepath) VALUES (:filepath)";

//checking if image is uploaded to database
if($query){
 echo $filename;
 echo "image uploaded successfully.";

}
else
{

 echo "something went wrong, insert to database failed";

   }
}
