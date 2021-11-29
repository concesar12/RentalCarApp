
  <?php

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
    <title>Admin Page</title>
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
            <a class="nav-link" href="customer.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Update_Profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Rental.php">Cars to rent</a>
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

    <h1>This is the hompage</h1>

    <?php
    if(isset($_SESSION['success'])) : ?>

    <h3> 
        <?php

        echo $_SESSION['success'];
        unset ($_SESSION['success']);

        ?>

    </h3>

    <?php endif ?>

    <!-- if the user logs in print information about him -->

    <?php if(isset($_SESSION['username'])) : ?>
      <h3>Welcome <strong> <?php echo $_SESSION['username']; ?></strong></h3>
      <p> <a href="customer.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif?>


  </body>
  </html>