<?php
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
  <title>Add User</title>
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
<h1>Add new User</h1>
<form action="UserAdd.php" method = "POST">
  <input type="text" name="username" placeholder="Username" required>
  <br>
  <input type="email" name="email" placeholder="Email@.company" required> 
  <br>
  <input type="password" name="password" placeholder="password" required> 
  <br>
  <input type="number" name="role" placeholder="Role 1:adm or 2:cust" required> 
  <br>
  <button type="submit" name="submit">Add user</button>
   

</form>

</body>
</html>