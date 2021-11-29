<?php
  require_once('Server.php');

  if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `user` WHERE id =$id";

    if($db->query($sql) === TRUE) {
      echo "Delete the data";
      header ('location: Edit_user.php');
    } else {
      echo "Something went wrong";
    }
  
  } else {
    die('id not provided');
  }



?>