<?php
  require_once('server.php');

      $id_car = $_GET['id_car'];
      $name = $_GET['name'];
      $rego = $_GET['rego'];
      $username = $_GET['Username'];
      $id_user = $_GET ['id_user'];
      

      $sql = "UPDATE `request` SET `status` = 2 WHERE `request`.`id_car` = $id_car and `request`.`id_user` = $id_user;";
       
      
       if($db->query($sql) === TRUE) {
        //$sql_car_del = "UPDATE car SET available = 0";
         echo "Modified to database";
         header ('location: Approval.php');
       } else {
         echo "Something went wrong";
       }

?>  