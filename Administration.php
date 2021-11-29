<?php

  session_start();

  if(!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first to view this page";
    header("location: Login.php");
  }

  $rolS = $_SESSION['role'];
 
  if ($rolS !=1) {
    $_SESSION['msg'] = "You do not have permission to this page";
    header("location: Customer.php");
  }

  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Adminstration</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Rental_Car</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="customer.php">Home</a> 
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="Update_Profile.php">Profile</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="Rental.php">Cars to rent</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Administration.php">Administration<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customer.php?logout='1'">Logout</a>
          </li>
        </ul>
        <span class="navbar-text">
        <strong>Welcome</strong>
        <?php echo $_SESSION['username'];
        if($_SESSION['role']==1) {
          echo " (Administrator)";
        } else {
          echo "(Customer)";    
        }
        ?>
        </span>
      </div>
    </nav>
<h1>Welcome to the administration module</h1>
  <h2>Please select an option: </h2>
  <div class="container">
    <ul>
      <li>
        <a href="Display_user.php">Registered users</a>
      </li>
      <li>
        <a href="Edit_user.php">Edit/update user</a>
      </li>
      <li>
        <a href="Add_user.php">Add new user</a>
      </li>
      <li>
        <a href="add_car.php">Add new car</a>
      </li>
      <li>
        <a href="Edit_car.php">Edit car information</a>
      </li>
      <li>
        <a href="Approval.php">Car Requests </a>
      </li>
    </ul>
  </div>

</body>

</html>