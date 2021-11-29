<?php include_once 'Server.php'; 


$name =  $_POST['name'];
$rego = $_POST['rego'];

if(isset($_POST['available'])){
  //$available is checked and value = 1
  $available = 1;
}
else{
  //$Available is not checked and value=0
  $available=0;
}

    $sqlcar = "INSERT INTO car (name, rego, available) VALUES ('$name','$rego','$available');";
    mysqli_query($db, $sqlcar);
    header("location: add_car.php?add_car=success");
  ?>