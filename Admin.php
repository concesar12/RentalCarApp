<?php include('Server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>Document</title>
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
<!-- Table of cars starts here -->
  <div class="d-flex justify-content-center">
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Car_id</th>
          <th scope="col">name</th>
          <th scope="col">Rego</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $car_table = "SELECT id_car, name, rego FROM car WHERE available=1";       
        $car_result = mysqli_query($db, $car_table);
      if(mysqli_num_rows($car_result) > 0) {
        while ($row = mysqli_fetch_assoc($car_result)) {
          echo "<tr><td>". $row["id_car"] ."</td><td>". $row["name"]
           ."</td><td>". $row["rego"] ."</td></tr>";
        }
        echo "</table>";
      } else {
        echo "no results";
      } 
      ?>
      </tbody>

<!-- tarts the form  -->
    </table>

  </div>


  <h2>Contact Us <span class="badge badge-secondary">New</span></h2>
  <div class="container-fluid">
    <form>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationServer01">First name</label>
          <input type="text" class="form-control is-valid" id="validationServer01" value="" required>
          <div class="valid-feedback">

          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationServer02">Last name</label>
          <input type="text" class="form-control is-valid" id="validationServer02" value="" required>
          <div class="valid-feedback">

          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="mb-3">
          <label for="validationTextarea">Textarea</label>
          <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea"
            required></textarea>
          <div class="invalid-feedback">
            Please enter a message in the textarea.
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="input-group has-validation">
          <div class="input-group-prepend">
            <span class="input-group-text">@</span>
          </div>
          <input type="email" class="form-control" required>
          <div class="invalid-feedback">
            Please choose a email.

          </div>
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
  </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</html>