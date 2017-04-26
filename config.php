<?php

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
   $dbname = 'slimapp';



  try

  {

        $db_connect = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
        $db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*** echo a message saying we have connected ***/
        echo 'Connected to database';

        }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }

        include_once 'crud.php';
        $db = new db($db_connect);


 ?>
