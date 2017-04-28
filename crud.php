<?php


class db{

private $db;

function __construct($db_connect)
{
 $this->db = $db_connect;
}


  public function create($firstname, $lastname, $bio, $home_image)
  {


      try
      {
          $stmt = $this->db->prepare("INSERT INTO inventors (firstname,lastname,bio, home_image) VALUES (:firstname,:lastname,:bio,:home_image)");
          $stmt->bindParam(':firstname', $firstname);
          $stmt->bindParam(':lastname',  $lastname);
          $stmt->bindParam(':bio',  $bio);
          $stmt->bindParam(':home_image',  $bio);
          $stmt->execute();
          return true;

  }

  catch(PDOException $e)
  {
      echo $e->getMessage();
      return false;
  }

}




public function getID($id)
{

 $stmt = $this->db->prepare("SELECT * FROM inventors WHERE id=:id");
 $stmt->execute(array(":id"=>$id));
 $editRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
 return $editRow;
}



public function update($id, $firstname, $lastname, $bio, $home_image)
{
  try

{
  $stmt=$this->db->prepare("UPDATE inventors SET firstname=:firstname,
                                                 lastname=:lastname,
                                                 bio=:bio,
                                                 home_image=:home_image


             WHERE id=:id ");

        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname',  $lastname);
        $stmt->bindParam(':bio',  $bio);
        $stmt->bindParam(':home_image',  $home_image);
        $stmt->bindParam(':id',  $id);
        $stmt->execute();
        return true;


}

 catch(PDOException $e)
 {
      echo $e->getMessage();
      return false;
  }
  }

public function delete($id)
{
  $stmt = $this->db->prepare("DELETE FROM inventors WHERE id=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  return true;
  }



public function dataview($query)
{
 $stmt = $this->db->prepare($query);
 $stmt->execute();

 if($stmt->rowCount()>0)
 {

  while($row=$stmt->fetch(PDO::FETCH_ASSOC))

  {
   ?>


               <tr>
               <td><?php print($row['id']); ?></td>
               <td><?php print($row['firstname']); ?></td>
               <td><?php print($row['lastname']); ?></td>
               <td><?php print($row['bio']); ?></td>



               <td align="center">
               <a href="update.php?edit_id=<?php print($row['id']); ?>">edit</a>
               </td>
               <td align="center">
               <a href="delete.php?delete_id=<?php print($row['id']); ?>">delete</a>
               </td>
               <td align="center">
               <a href="home_image.php?delete_id=<?php print($row['id']); ?>">image</a>
               </td>
               </tr>
               <?php

                 
  }
 }
 else
 {
  ?>
           <tr>
           <td>Nothing here...</td>
           </tr>
           <?php
 }

}

}

?>
