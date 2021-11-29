<?php include('Server.php');

session_start();

if(!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first to view this page";
  header("location: Login.php");
}

if(isset($_GET['logout']) == 1){
  session_destroy();
  unset($_SESSION['username']);
  header("location: Login.php");
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
  <title>Rental</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="Rental.php">Cars to rent<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Administration.php">Administration</a>
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
  <h1>Rental Site</h1>
  <div class="container-fluid">
  <div class="d-flex justify-content-center">
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Car_id</th>
          <th scope="col">Name</th>
          <th scope="col">Rego</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $car_table = "SELECT id_car, name, rego FROM car WHERE available = 1";       
        $car_result = mysqli_query($db, $car_table);
      if(mysqli_num_rows($car_result) > 0) {
        while ($row = mysqli_fetch_assoc($car_result)) {
          echo "<tr><td>". $row["id_car"] ."</td><td>". $row["name"]
           ."</td><td>". $row["rego"] ."</td><td>". "<div class='btn-group'>
           <a class='btn btn-secondary' href='rent_car.php?id_car=" .$row['id_car'] ."'>Rent Car</a>
           </div></td></tr>";
        }
        echo "</table>";
      } else {
        echo "no results";
      } 
      ?>
      </tbody>
</div>
</div>
</body>
</html>