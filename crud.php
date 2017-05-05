<?php


class db{

private $db;

function __construct($db_connect)
{
 $this->db = $db_connect;
}


  public function create($firstname, $lastname, $bio, $year)
  {


      try
      {
          $stmt = $this->db->prepare("INSERT INTO inventors (firstname,lastname,bio, year) VALUES (:firstname,:lastname,:bio, :year)");
          $stmt->bindParam(':firstname', $firstname);
          $stmt->bindParam(':lastname',  $lastname);
          $stmt->bindParam(':bio',  $bio);
          $stmt->bindParam(':year',  $year);

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



public function update($id, $firstname, $lastname, $bio, $year)
{
  try

{
  $stmt=$this->db->prepare("UPDATE inventors SET firstname=:firstname,
                                                 lastname=:lastname,
                                                 bio=:bio,
                                                 year=:year



             WHERE id=:id ");

        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname',  $lastname);
        $stmt->bindParam(':bio',  $bio);
        $stmt->bindParam(':year',  $year);
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


  public function update_with_home_image($id, $invention_image)
  {
    try {
      $stmt=$this->db->prepare("UPDATE inventors SET invention_image=:invention_image WHERE id=:id ");
      $stmt->bindParam(':invention_image', $invention_image);
      $stmt->bindParam(':id',  $id);
      $stmt->execute();
      return true;
    } catch(PDOException $e) {
        echo $e->getMessage();
        return false;
    }
  }

  public function update_with_inventor_image($id, $inventor_image)
  {
    try {
      $stmt=$this->db->prepare("UPDATE inventors SET inventor_image=:inventor_image  WHERE id=:id ");
      $stmt->bindParam(':inventor_image', $inventor_image);
      $stmt->bindParam(':id',  $id);
      $stmt->execute();
      return true;
    } catch(PDOException $e) {
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
               <td colspan="3"><?php print($row['bio']); ?></td>
               <td><?php print($row['year']); ?></td>
               <td><?php print($row['invention_image']); ?></td>
               <td><?php print($row['inventor_image']); ?></td>




               <td align="center">
               <a href="update.php?edit_id=<?php print($row['id']); ?>">edit</a>
               </td>
               <td align="center">
               <a href="delete.php?delete_id=<?php print($row['id']); ?>">delete</a>
               </td>
               <td align="center">
               <a href="home_image.php?image_id=<?php print($row['id']); ?>">image</a>
              </td>
             <td align="center">
             <a href="inventor_image.php?image_id=<?php print($row['id']); ?>">image</a>
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


public function dataset($query) {

  $stmt = $this->db->prepare($query);
  $stmt->execute();
  $jsonArray = array();

  if($stmt->rowCount() > 0)
  {

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

      array_push($jsonArray, array(
        'id' => $row['id'],
        'firstname' => $row['firstname'],
        'lastname' => $row['lastname'],
        'bio' => $row['bio'],
        'year' => $row['year'],
        'invention_image'=> $row['invention_image'],
        'inventor_image'=> $row['inventor_image']

      ));

    }
  }
	return json_encode($jsonArray, JSON_UNESCAPED_SLASHES);
}

}

?>
