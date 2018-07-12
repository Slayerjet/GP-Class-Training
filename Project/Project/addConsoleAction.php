<?php
//Step 1 - connect to database
require_once('dbconfig.php');

//$console_name = $_POST['console_name'];
//$console_description = ,$_POST['console_description'];
//$console_review = $_POST['console_review'];

$stmt = $conn->prepare("INSERT INTO consoles (console_name,console_description) VALUES(?,?)");

$stmt->bind_param('ss',$_POST['console_name'],$_POST['console_description']);
$stmt->execute();


header('location: admin.php')
  
?>