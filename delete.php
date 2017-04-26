<?php
include_once 'config.php';

if(isset($_POST['btn-del']))
{
  $id = $_GET['delete_id'];
  $db->delete($id);
  header("Location: delete.php?deleted");
}

 ?>

 <?php include_once 'header.php'; ?>

 <div class="clearfix"></div>

<div class="container">

  <?php

if(isset($_GET['deleted']))
{
  ?>

  <div class="alert alert-success">
     <strong>Success!record was deleted</strong>
  </div>

  <?php

}
else
{
   ?>

   <div class="alert alert-danger">
    <strong> Are you sure you want to remove the following record ?</strong>
 </div>

 <?php
}
?>
</div>

<div class="clearfix"></div>

<div class="container">

  <?php

if(isset($_GET['deleted_id']))
{
   ?>
   <table class='table table-bordered'>
         <tr>
         <th>#</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Bio</th>
         </tr>
         <?php
         $stmt = $db->prepare("SELECT * FROM inventors WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>

             <tr>
           <td><?php print($row['id']); ?></td>
           <td><?php print($row['firstname']); ?></td>
           <td><?php print($row['lastname']); ?></td>
           <td><?php print($row['bio']); ?></td>

         </tr>
          <?php
      }
      ?>
      </table>
      <?php
}
?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
?>
<form method="post">
 <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
 <button class="btn btn-large btn-primary" type="submit" name="btn-del">YES</button>
 <a href="index.php" class="btn btn-large btn-success">NO</a>
 </form>
<?php
}
else
{
?>
 <a href="index.php" class="btn btn-large btn-success">Back to index</a>
 <?php
}
?>
</p>
</div>
