<?php include('Server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Registration page</title>
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
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Login.php">Login/Register</a>
        </li>
      </ul>
      <span class="navbar-text">
        Welcome
      </span>
    </div>
  </nav>
<!-- Content -->
   <div class="container">
    <div class="header">
      <h2>Register</h2>
    </div>
    <form action="Registration.php" method="post">

      <?php include('error.php') ?>

    <div>
      <label for="username"> Username: </label>
      <input type="text" name="username" required>
    </div>
    <div>
      <label for="password"> Password: </label>
      <input type="password" name="password" required>
    </div>

    <div>
      <label for="email"> Email: </label>
      <input type="email" name="email" required >
    </div>

    <div>
      <label for="password2"> Confirm Password: </label>
      <input type="password" name="password2" required>
    </div>

    <button type="submit" name="Reg_user"> Submit </button>

    <P>Already a user?<a href="Login.php"><b> Log in</b></a></P>
    </form>
   </div>
</body>
</html>