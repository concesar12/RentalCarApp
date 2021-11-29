<?php include_once 'Server.php'; 


$username =  $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

    $sqluser = "INSERT INTO user (Email, Username, Password, Role) VALUES ('$email','$username','$password','$role');";
    mysqli_query($db, $sqluser);

    header("location: Add_user.php?Add_user=success");
  ?>