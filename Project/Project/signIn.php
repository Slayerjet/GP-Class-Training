<?php
//set the title for the page
$title = 'VGHS - Sign in';
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
                echo "*Username or Password is missing or incorrect";
            }
//            var_dump($_SESSION);
            }
            ?>
               </div>

            <div class="form-group">
                <div>
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <br>
                <div>
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <br>
                <div class="input-group">
                    <button type="submit" class="btn btn-success" name="login_user">Login</button>
                </div>
            </div>
        </form>

        <script>
            //                   $(document).ready(function() {
            //                       e.pre
            //                       $('form').submit(function(e) {
            //                           signInViaAJAX();
            //                       }) //End of submit.function
            //                   }); //End of document.ready
            //           
            //                   function signInViaAJAX() {
            //                       var dataObj = {
            //                           username: $('#username').val(),
            //                           password: $('#password').val()
            //                       } //End of dataObj
            //                       //Now try to sign in with an AJAX request to the server
            //                       $.ajax({
            //                           url: 'checkCred.php',
            //                           type: 'post',
            //                           dataType: 'json',
            //                           data: dataObj,
            //                           success: function(data) {
            //                               console.log(data);
            //                               if (data.length > 0) {
            //                                   sessionStorage.setItem('role', data[0].role);
            //                                   window.location = "index.php"
            //                               } else {
            //                                   alert('Username or Password Incorrect - Try again');
            //                               }
            //                           },
            //                           error: function(x, m, s) {
            //                               console.log(m)
            //                           }
            //                       }); //End of ajax
            //                   } //End of signInViaAJAX

        </script>

        <?php
    include('footer.php');
?>
