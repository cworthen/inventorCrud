<?php

include_once 'config.php';

//selecting all inventors from database
$query = "SELECT * FROM inventors";
echo $db->dataset($query);

?>