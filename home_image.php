<?php
//include config file
include_once 'config.php';

//include header
include_once 'header.php';
?>
<!-- form to submit image path -->
<div class="clearfix"></div><br />

<div class="container">

<form method='post' enctype="multipart/form-data">

<input type="file" name="image" accept="image/jpeg, image/png">
<input value="Submit" name='btn-submit' type="submit">
</form>
<br>
<a href="index.php" class="btn btn-large btn-primary">Back to index</a>

<?php

//when submit button is clicked

//select image for individual invention by id (home page)


if(isset($_POST['btn-submit']))
{
  $image_id = $_GET['image_id'];
  $invention_image=$_POST['invention_image'];
  $image_name = $_FILES['image']['name'];
  $image_location = $_FILES['image']['tmp_name'];
  $image_server_location = '/Applications/MAMP/htdocs/inventorapp/images/' . $image_name;

  if(move_uploaded_file($image_location, $image_server_location))
  {
    //Run Update or Insert Query
    echo $db->update_with_home_image($image_id, 'images/'.$image_name);
     echo "image uploaded successfully.";
  }
  else
  {
    //Image Failed to Upload
    ?><script>alert('upload failed');</script><?php
  }

}
