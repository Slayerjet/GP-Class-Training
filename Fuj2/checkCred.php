<?php
    
$username = $_POST['username'];
$password = $_POST['password'];

require_once('dbconfig.php');

$sql = "SELECT username,permissions FROM users WHERE username = '$username' AND password = '$password'";

$result = $conn->query($sql);

$user = array();

while($row = $result->fetch_assoc()){
    array_push($user, $row);
};//End of while

echo json_encode($user);

?>