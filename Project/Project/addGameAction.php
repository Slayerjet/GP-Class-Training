<?php
//Step 1 - connect to database
require_once('dbconfig.php');

//$console_name = $_POST['console_name'];
//$console_description = ,$_POST['console_description'];
//$console_review = $_POST['console_review'];

$stmt = $conn->prepare("INSERT INTO games (game_name,game_genre,game_date) VALUES(?,?,?)");

$stmt->bind_param('sss',$_POST['game_name'],$_POST['game_genre'],$_POST['game_date']);
$stmt->execute();

header('location: games.php');
?>