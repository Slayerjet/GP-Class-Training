<?php

//set the title for the page
$title = 'PHP Course - Home Page';
include 'includes/header.php';
require_once('dbconfig.php');
?>

<div class="container">
    <a href="login.php">Sign In</a>
        <?php
            if(isset($_GET['username'])){    
                $userName = $_GET['username'];
            }else{
                $userName = ' ';
            }
            echo '<h1>Welcome ' . $userName . '</h1>';
        ?>
</div>

<?php
    include 'includes/footer.php';
?>
