<?php 
 session_start();

 include_once 'Server.php'; 
  $id_request = $_SESSION['id'];
  $id_car = $_GET['id_car'];

  $sqlcar = "INSERT INTO request (id_car, id_user, status) VALUES ('$id_car','$id_request', 1 );";
  $sql_car_del = "UPDATE car SET available = 0 WHERE id_car = $id_car";
    mysqli_query($db, $sqlcar);
    mysqli_query($db, $sql_car_del);
    header("location: Rental.php?Rental=success");
  ?>
