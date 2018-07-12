<?php

    //Step 1 - connect to database
    require_once('dbconfig.php');

    //Get the current date for the date_reg
    $now = date('r');


//------------------------------THIS WORKS BUT IS INSECURE-----------------------------------------
    //Insert user into the database - SQL (Structered Query Language)
//    $sql = "INSERT INTO users (f_name,l_name,username,email,password,date_reg) VALUES('$_POST[f_name]','$_POST[l_name]','$_POST[username]','$_POST[email]','$_POST[password]','$now')";
//    $conn->query($sql);
//    echo $sql;

//-------------------------------------------------------------------------------------------------

//------------------------It is more secure to use prepared statements-----------------------------
    
    $stmt = $conn->prepare("INSERT INTO catagories (cat_name) VALUES(?)");
    

    
    $stmt->bind_param('s',$_POST['category']);
$stmt->execute();
    

header('location:categories.php');

?>



