<?php
session_start();

// connect to the database
require_once('dbconfig.php');

// initializing variables
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$email    = $_SESSION['email'];
$user_memo = $_SESSION['user_memo'];
$user_image = $_SESSION['user_image'];
$user_name = $_SESSION['user_name'];



// REGISTER USER
if (isset($_POST['updateUser'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "*Username is required"); }
  if (empty($email)) { array_push($errors, "*Email is required"); }
  if (empty($password)) { array_push($errors, "*Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "*Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "*Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
//  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "UPDATE users (username, email, role, date_reg, password, user_memo, user_image) 
  			  VALUES('$username', '$email', '$role', '$user_name', '$password', '$user_memo', '$user_image')";
  	mysqli_query($conn, $query);
  	
      header('location: myAccount.php');
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
