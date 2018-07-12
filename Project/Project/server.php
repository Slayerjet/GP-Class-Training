<?php
session_start();

// connect to the database
require_once('dbconfig.php');

// initializing variables
$username = "";
$email    = "";
$role     = "user";
$user_memo = "No Information given.";
$now = date('r');
$_SESSION['$errors'] = array(); 


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $user_memo = mysqli_real_escape_string($conn, $_POST['user_memo']);



  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($_SESSION['$errors'], "*Username is required"); }
  if (empty($email)) { array_push($_SESSION['$errors'], "*Email is required"); }
  if (empty($password)) { array_push($_SESSION['$errors'], "*Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($_SESSION['$errors'], "*Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($_SESSION['$errors'], "*Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($_SESSION['$errors']) == 0) {
//  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, role, date_reg, password, user_memo, user_name) 
  			  VALUES('$username', '$email', '$role', '$now', '$password', '$user_memo', '$user_name')";
  	mysqli_query($conn, $query);
  	
      header('location: signIn.php');
  } else {
      header('location: register.php');
  }
}


//..

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);  


  if (empty($username)) {
  	array_push($_SESSION['$errors'], "*Username is required");
  }
  if (empty($password)) {
  	array_push($_SESSION['$errors'], "*Password is required");
  }

  if (count($_SESSION['$errors']) == 0) {
//  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['role'] = mysqli_real_escape_string($conn, $_POST['role']);
      $_SESSION['email'] = mysqli_real_escape_string($conn, $_POST['email']);;
      $_SESSION['user_id'] = mysqli_real_escape_string($conn, $_POST['user_id']);;
      $_SESSION['date_reg'] = mysqli_real_escape_string($conn, $_POST['date_reg']);
      $_SESSION['password'] = $password;
      $_SESSION['user_name'] = mysqli_real_escape_string($conn, $_POST['user_name']);
      $_SESSION['user_memo'] = mysqli_real_escape_string($conn, $_POST['user_memo']);
      $_SESSION['user_image'] = mysqli_real_escape_string($conn, $_POST['user_image']);




  	  $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
  	}else {
      
      array_push($_SESSION['$errors'], "*Wrong username/password combination");
      header('location: signIn.php');
  	}
  }
}

?>









    <!---

////Step 1 - connect to database
//require_once('dbconfig.php');
//
////Get the current date for the date_reg
//$now = date('r');
//    
//$stmt = $conn->prepare("INSERT INTO users (username,role,f_name,l_name,email,password,date_reg) VALUES(?,?,?,?,?,?,?)");
//    
//$role = 'user';
//    
//$stmt->bind_param('sssssss',$_POST['username'],$role,$_POST['f_name'],$_POST['l_name'],$_POST['email'],$_POST['password'],$now);
//$stmt->execute();
//
//header('location: signin.php')
-->
