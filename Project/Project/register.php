<?php
//set the title for the page
$title = 'VGHS - Register';
include('header.php');
?>

    <br>
    <br>
    <br>
    <div class="container">
        <form method="post" action="server.php">
          <div style="color: red;">
           <?php 
            if(isset($_SESSION['$errors'])){
            if(count($_SESSION['$errors']) > 0){
                echo "*Feild is missing";
            }
//            var_dump($_SESSION);
            }
            ?>
               </div>
            <div class="form-group">
                <br>
                <div>
                    <label>Username</label>
                    <input class="form-control" type="text" name="username">
                </div>
                <br>
                <div>
                    <label>Name</label>
                    <input class="form-control" type="text" name="user_name">
                </div>
                <br>
                <div>
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" >
                </div>
                <br>
                <div>
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <br>
                <div>
                    <label>Memo</label>
                    <input class="form-control" type="text" name="user_memo">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-success" name="reg_user">Register</button>
                </div>
            </div>
        </form>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <?php
    include('footer.php');
?>
