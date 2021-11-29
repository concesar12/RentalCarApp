<?php include('Server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
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
  <!-- <div class="container"> -->
  <div class="header">
    <h2>Log in</h2>
  </div>
  <!-- Begining of the form -->
  <section class="form">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <img src="./Images/Login.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-7">
          <form action="Login.php" method="post">
            <div class="form-row">
                <div class="col-lg-7">
                  <input type="text">
                </div>
            </div>
            <?php include ('error.php'); ?>
            <div>
              <label for="username"> Username: </label>
              <input type="text" name="username">
            </div>
            <div>
              <label for="password"> Password: </label>
              <input type="password" name="password">
            </div>

            <div class="form-group">
              <div id="message" class="alert alert-danger mt-1 d-none align-middle text-center"></div>
            </div>
            <div>
              <button type="submit" name="Log_user" class="btn btn-success show_message"> Login </button>
              <div class="g-recaptcha mt-5" data-sitekey="6LdbCs8UAAAAAPl4LWXf19APgpiCqHS7zW6U9zwC"></div>
            </div>

            <P>Not a user? <a href="Registration.php"><b> Register Here</b></a></P>
          </form>
        </div>


      </div>
    </div>
  </section>

  <!-- En of the form -->
  <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
  <script src="js/jquery.validate.min.js" type="text/javascript"></script>
  <script src="js/jquery.form.js" type="text/javascript"></script>
  <script src="js/jquery-ui.js" type="text/javascript"></script>
  <script src="js/sweetalert2@8.js"></script>
  <script src='https://www.google.com/recaptcha/api.js' async defer></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="js/my.js"></script>
</body>

</html>