<?php

//Step 1 - connect to database
    $conn = new mysqli('localhost','vghs-admin','Rebreb123','vghs');
    //check if NOT connected okay
    if($conn->connect_error){
        echo 'Connection Error:' . $conn->connection_error;
    exit();
    }

?>