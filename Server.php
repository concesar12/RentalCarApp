<?php

 //initializing variables

$username = "";
$email = "";  

$errors = array(); 

  // Connect to the Database

  $db = mysqli_connect('localhost', 'root', '', 'rental_project','33065') or die ("Could not connect to the database");

  //Register users
  if (isset($_POST['Reg_user'])) {
  //Receive all input values from the form  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);


  //Form validation 

  if(empty($username)) {array_push($errors, "username is required"); }
  if(empty($email)) {array_push($errors, "email is required"); }
  if(empty($password)) {array_push($errors, "password is required"); }
  if($password != $password2) {
    array_push($errors, "the two passwords do not match");
  }

  // Check db for existing user with same username

  $user_check_query = "SELECT * FROM user where Username = '$username' or Email = '$email' LIMIT 1";

  $results = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($results);

if($user) {
  if ($user['username'] === $username) {
    array_push($errors, "username already exists");
  }
  if ($user['email'] === $email) {
    array_push($errors, "email has been already used");
  }
}

//Register the user if no error

  if(count($errors) == 0) {

    $password = md5($password); //Encrypting the password
    $query = "INSERT INTO user ( Email, Username, Password) VALUES ('$email', '$username', '$password')";
    mysqli_query($db, $query);

    //$_SESSION['username'] = $username;
    //$_SESSION['success'] = "You are now logged in";

    header ('location: Login.php');
  }// end of error counts
}

  //Login user

  if(isset($_POST['Log_user'])) {
    session_start();
 
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username)){
      array_push($errors, "Username is required");
    }

    if(empty($password)){
      array_push($errors, "A password must be typed");
    }

    if(count($errors) == 0) {
      //$password = md5($password); //Encription of the password
      $query = "SELECT * FROM user WHERE '$username' = Username AND Password = '$password'";
      $results = mysqli_query($db, $query );
       $row = mysqli_fetch_assoc($results);
      
      if(mysqli_num_rows($results) == 1){
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['Role'];
        $_SESSION['success'] = "Logged in successfully";

        header("location: customer.php");
      }else {
        array_push($errors, "Wrong Username/password combination");
      }
    }

  }

?>