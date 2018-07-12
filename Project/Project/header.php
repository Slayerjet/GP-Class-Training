<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<!--VGHS-->
<head>
    <title>
        <?php
        echo $title; 
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/project/project/styles.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/project/project/addOns/bootstrap.min.css">
    <script src="/project/project/addOns/jquery.min.js"></script>
    <script src="/project/project/addOns/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="/project/project/addOns/handlebars.min.js"></script>
    <script src="/project/project/addOns/popper.min.js"></script>
    <script src="/project/project/addOns/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <?php
require_once('dbconfig.php');
    
$sql = "SELECT user_id,username FROM users";
$result = $conn->query($sql);



while($row = $result->fetch_array()){
    echo '<nav style="text-transform: uppercase;" class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">';
    
    
    echo '<a class="navbar-brand" href="/project/project/index.php">' . '<img src="/project/project/images/logo.png" width="40">' . '</a>';
    
    echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">' . '<span class="navbar-toggler-icon"></span>' . ' </button>';
    
    
    echo '<div class="collapse navbar-collapse" id="collapsibleNavbar">' . '<ul class="navbar-nav">';
    
    echo '<li class="nav-item">' . '<a class="nav-link" href="/project/project/index.php">Home</a>' . '</li>';
    
    echo '<li class="nav-item">' . '<a class="nav-link" href="/project/project/reviews.php">Reviews</a>' . '</li>';
    
    echo '<li class="nav-item">' . '<a class="nav-link" href="/project/project/games.php">Games</a>' . '</li>';
    
    echo '<li class="nav-item">' . '<a class="nav-link" href="/project/project/consoles.php">'.'Consoles'.'</a></li>';
    
    echo '<li class="nav-item dropdown">' . '<a class="nav-link dropdown" href="#" id="navbardrop" data-toggle="dropdown">Search</a>' . '<div class="dropdown-menu">'.'<input class="dropdown-item" type="text" name="search" placeholder="Search...">'.'</div></li>';
    
    if(isset($_SESSION['username'])) {
    if($_SESSION['username'] == 'slayerjet') {
    echo '<li class="nav-item">'.'<a class="nav-link" href="/project/project/admin/admin.php">'. 'Admin' .'</a></li>';
    }}
    if(isset($_SESSION['username'])) {
    echo '<li class="nav-item dropdown">'.'<a class="nav-link dropdown" href="#" id="navbardrop" data-toggle="dropdown">'. $_SESSION['username'] .'</a>'.'<div class="dropdown-menu">'.'<a class="dropdown-item " href="/project/project/myAccount.php">'.'My Account'.'</a>'.'<a class="dropdown-item " href="/project/project/logout.php">'.'Log out'.'</a>'.'</div>'.'</li>';
    }
    if(!isset($_SESSION['username'])) {
    echo '<li class="nav-item dropdown">'.'<a class="nav-link dropdown" href="#" id="navbardrop" data-toggle="dropdown">'.'Sign in'.'</a>'.'<div class="dropdown-menu">'.'<a class="dropdown-item" href="/project/project/signIn.php">'.'Sign in'.'</a>'.'<a class="dropdown-item" href="/project/project/register.php">'.'Register'.'</a></div></li>';
    }
    echo '</ul></div></nav>';
    
}?>