<?php

//Step 1 - connect to database
    $conn = new mysqli('localhost','fuj1-admin','password','fuj2');
    //check if NOT connected okay
    if($conn->connect_error){
        echo 'Connection Error:' . $conn->connection_error;
    exit();
    }

?>