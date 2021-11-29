<?php include('Server.php'); 

  session_start();
  //Getting the Id necessary to know which row update
  // validation fo id not NULL
  if(!isset($_GET['id'])) {
      die('id not provided');
  }

  $id = $_GET['id'];
  $user_table = "SELECT Email, Username, Password, Role FROM user where id = $id";       
  $user_result = mysqli_query($db, $user_table);
  if(mysqli_num_rows($user_result) != 1) {
    die('id is not correct');
  }
  $user_data = mysqli_fetch_assoc($user_result);
  
  //print_r($user_data); -->Test of the data retrieved
  
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Edit user</title>
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
   <div class="container">
    <div class="header">
      <h2>Edit user</h2>
    </div>
    <form action="modify_user.php?id=<?= $id ?>" method="post">

    <div>
      <label for="username"> Username: </label>
      <input type="text" name="username" value="<?=$user_data['Username']?>" required>
    </div>
    <div>
      <label for="password"> Password: </label>
      <input type="password" name="password" value="<?=$user_data['Password']?>" required>
    </div>

    <div>
      <label for="email"> Email: </label>
      <input type="email" name="email" value="<?=$user_data['Email']?>" required >
    </div>

    <div>
      <label for="rol"> Role: </label>
      <input type="number" name="rol" value="<?=$user_data['Role']?>" required >
    </div>
    <br>
    <button type="submit" name="edit_user" value="submit"> Submit </button>

    </form>
   </div>
</body>
</html>