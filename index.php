<?php include('Server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <style></style>
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
<div class="grid-container">
  <div class="grid-item grid-item-1"> 
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
    </table>
  </div>
</div>

<!-- Enquiry request form -->
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


  <main class="container">

    <div class="row justify-content-center">
      <div id="googleMap" style="width:100%;height:400px;"></div>
    </div>
  </main>

  <script>
  var infowindow;

  function myMap() {

    infowindow = new google.maps.InfoWindow();

    var mapProp = {
      center: new google.maps.LatLng(-43.535162, 172.644536),
      zoom: 15,
    };

    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

    var marker = new google.maps.Marker({
      map: map,
      data: {
        name: 'Rental_Car',
        url: 'https://www.youtube.com/watch?v=CXSE89JGnek&ab_channel=AntonioSarosi'
      },
      position: new google.maps.LatLng(-43.535162, 172.644536)
    });


    var contentString =
      '<div class="fusion-text fusion-no-large-visibility"><div class="sp__title"><h3 data-fontsize="21" data-lineheight="29">Aspire2 International Christchurch Campus</h3><hr></div><img src="https://aspire2international.ac.nz/wp-content/uploads/2019/11/640x300-stuart-murray.jpg" class="rounded img-thumbnail" alt="" id="xxx" width="150" height="100"><div class="sp pink"><div class="sp__details"><br><div><strong>Phone</strong>:&nbsp; 09 555 5490</div><div><strong>Address</strong>: 289 Tuam Street, Christchurch Central 8011</div><p></p></div></div></div>';


    google.maps.event.addListener(marker, 'click', function() {
      infowindow.setContent(marker.data.name);
      window.location.href = marker.data.url; //Executes url
      //infowindow.setContent(contentString);
      infowindow.open(map, marker);
    });

    var infowindow = new google.maps.InfoWindow({
      content: "Aspire2 International Christchurch Campus"
    });

    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map, marker);
    });

  };
  </script>
</body>

<script src="/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/js/jquery.form.js" type="text/javascript"></script>
<script src="/js/jquery-ui.js" type="text/javascript"></script>
<script src="/js/sweetalert2@8.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=myMap"></script>
<!-- <script src="js/maps.js"></script> -->

</html>