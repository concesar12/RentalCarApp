<?php
  require_once('Server.php');

  if(isset($_GET['id_car'])) {

    $id_car = $_GET['id_car'];

    $sql = "DELETE FROM `request` WHERE id_car =$id_car";
    $sql_car_back = "UPDATE car SET available = 1 WHERE id_car =$id_car";

    mysqli_query($db, $sql_car_back);

    if($db->query($sql) === TRUE) {
      echo "Delete the data";
      header ('location: Approval.php');
    } else {
      echo "Something went wrong";
    }
  
  } else {
    die('id not provided');
  }



?>