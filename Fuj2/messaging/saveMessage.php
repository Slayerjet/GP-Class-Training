<?php
    
    require_once('../dbconfig.php');
    $email = $_POST['email'];
    $category = $_POST['category'];
    $message = $_POST['message'];
    $now = date('r');
    
//------------------------------THIS WORKS BUT IS INSECURE-----------------------------------------
//Insert user into the database - SQL (Structered Query Language)
//    $sql = "INSERT INTO users (f_name,l_name,username,email,password,date_reg) VALUES('$_POST[f_name]','$_POST[l_name]','$_POST[username]','$_POST[email]','$_POST[password]','$now')";
//    $conn->query($sql);
//    echo $sql;

//-------------------------------------------------------------------------------------------------

//------------------------It is more sequre to use prepared statements-----------------------------
    
    $stmt = $conn->prepare("INSERT INTO messages (category,message,email,date) VALUES(?,?,?,?)");
    $stmt->bind_param('isss',$_POST['category'],$_POST['message'],$_POST['email'],$now);
    $stmt->execute();
    
    echo 'Your message has been sent!';
    
?>