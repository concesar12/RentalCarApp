<?php
  require_once('Server.php');

  if(isset($_GET['id_car'])) {

    $id_car = $_GET['id_car'];

    $sql = "DELETE FROM `car` WHERE id_car =$id_car";

    if($db->query($sql) === TRUE) {
      echo "Delete the data";
      header ('location: Edit_car.php');
    } else {
      echo "Something went wrong";
    }
  
  } else {
    die('id not provided');
  }



?>