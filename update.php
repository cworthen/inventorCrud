<?php
include_once 'config.php';
if(isset($_POST['btn-update']))
{
  $id = $_GET['edit_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $bio = $_POST['bio'];
  $year = $_POST['year'];



  if($db->update($id,$firstname,$lastname,$bio,$year))
{
  $msg = "<div class='alert alert-info'>
   <strong>WOW!</strong> Record was updated successfully <a href='index.php'>HOME</a>!
   </div>";
}
else{
  $msg = "<div class='alert alert-warning'>
   <strong>SORRY!</strong> ERROR while updating record !
   </div>";
}
}

if(isset($_GET['edit_id']))
{
  $id = $_GET['edit_id'];
  extract($db->getID($id));
}

?>

<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">

<?php
if(isset($msg))
{
  echo $msg;
}

?>
</div>

<div class="clearfix"></div><br />

<div class="container">

     <form method='post'>

    <table class='table table-bordered'>

        <tr>
            <td>First Name</td>
            <td><input type='text' name='firstname' class='form-control' value="<?php echo $firstname; ?>" required></td>
        </tr>

        <tr>
            <td>Last Name</td>
            <td><input type='text' name='lastname' class='form-control' value="<?php echo $lastname; ?>" required></td>
        </tr>

        <tr>
            <td>Bio</td>
            <td><input type='text' name='bio' class='form-control' value="<?php echo $bio; ?>" required></td>
        </tr>

        <tr>
            <td>Year</td>
            <td><input type='text' name='year' class='form-control' value="<?php echo $year; ?>" required></td>
        </tr>

        



        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
       <span class="glyphicon glyphicon-edit"></span>  Update this Record
    </button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>

    </table>
</form>


</div>

<?php include_once 'footer.php'; ?>
