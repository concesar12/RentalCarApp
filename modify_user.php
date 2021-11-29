<?php
  require_once('server.php');
  session_start();
  
    if(isset($_GET['id']) && isset($_POST['edit_user'])) {
      $id = $_GET['id'];  
      $username = $_POST['username'];
      $email =  $_POST['email'];
      $password = $_POST['password'];
      $role = $_POST['rol'];

      $sql = "UPDATE `user` SET `Email` = '$email',`Username` = '$username',`Password` = '$password',`Role` = '$role' WHERE `user`.`id` = $id;";
       
       if($db->query($sql) === TRUE) {
         echo "Modified to database";
        if($_SESSION['role'] == 1) { 
          header ('location: Administration.php');
          } else {
            header ('location: Update_Profile.php');
          }
       } else {
         echo "Something went wrong";
       }
      
      
    } else {
      echo "invalid";
  }

?>  