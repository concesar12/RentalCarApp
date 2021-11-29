<?php
  include_once('Server.php');
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Car Approval</title>
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

<h2>Car approval</h2>

<div class="container-fluid">
  <div class="d-flex justify-content-center">
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Car_id</th>
          <th scope="col">Car name</th>
          <th scope="col">Rego</th>
          <th scope="col">Username</th>
          <th scope="col">User_id</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $car_table = "SELECT request.id_car, car.name, car.rego, user.Username, request.id_user 
        FROM car, user, request WHERE request.id_car = car.id_car and request.id_user = user.id and request.status = 1;";       
        $car_result = mysqli_query($db, $car_table);
      if(mysqli_num_rows($car_result) > 0) {
        while ($row = mysqli_fetch_assoc($car_result)) {
          echo "<tr>";
            echo "<td>". $row["id_car"] ."</td>
                  <td>". $row["name"] ."</td>
                  <td>". $row["rego"] ."</td>
                  <td>". $row["Username"] ."</td>
                  <td>". $row["id_user"] ."</td>
                  <td>". "<div class='btn-group'>
                  <a class='btn btn-success' href='app_car.php?id_car=". $row['id_car'] ."
                  &name=". $row['name'] ."
                  &rego=". $row['rego'] ."
                  &Username=". $row['Username'] ."
                  &id_user=". $row['id_user'] ."'>Approve</a>
                  <a class='btn btn-danger' href='reject.php?id_car=". $row['id_car'] ."'>Reject</a>
                  </div></td>";
          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
      } else {
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "<h1>No pending requests</h1>";
      }    
?>
</body>
</html>