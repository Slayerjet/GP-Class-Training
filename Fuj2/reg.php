<?php

//set the title for the page
$title = 'PHP Course - Registration Page';
include 'includes/header.php';
?>
    <div class="container">
        <form action="registerAction.php" method="post">
            <h1>Register</h1>
            <br>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control">
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" class="form-control">
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" class="form-control">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Register</button>
        </form>
    </div>



    <?php
    include 'includes/footer.php';
