<?php
  require_once('server.php');

    if(isset($_GET['id_car']) && isset($_POST['edit_car'])) {
      $id_car = $_GET['id_car'];  
      $name = $_POST['name'];
      $rego =  $_POST['rego'];
      $available = $_POST['available'];
      if(isset($_POST['available'])){
        //$available is checked and value = 1
        $available = 1;
      }
      else{
        //$Available is not checked and value=0
        $available=0;
      }

      $sql = "UPDATE `car` SET `name` = '$name',`rego` = '$rego',`available` = '$available' WHERE `car`.`id_car` = $id_car;";
       
       if($db->query($sql) === TRUE) {
         echo "Modified to database";
         header ('location: Edit_car.php');
       } else {
         echo "Something went wrong";
       }
      
      
    } else {
      echo "invalid";
  }

?>  