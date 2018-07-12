<?php

//set the title for the page
$title = 'PHP Course - Sign in Page';
include 'includes/header.php';
?>
   <br>
   <br>
   <br>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="userName">Username: </label>
                <input class="form-control" type="text" id="username">

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>

        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('form').submit(function(e) {
            e.preventDefault(); //Stops browser default behaviour
            signInViaAJAX();
            }) //End of submit.function
        }); //End of document.ready
        
        function signInViaAJAX(){
            var dataObj = {
                username: $('#username').val(),
                password: $('#password').val()
            }//End of dataObj
            //Now try to sign in with an AJAX request to the server
            $.ajax({
                url: 'checkCred.php',
                type: 'post',
                dataType: 'json',
                data: dataObj,
                success: function(data){
                    console.log(data);
                    if(data.length>0){
                        sessionStorage.setItem('loggedIn','1');
                        sessionStorage.setItem('permissions',data[0].permissions);
                        window.location = 'index.php'
                    }else{
                        alert('Username or Password Incorrect - Try again');
                    }
                },
                error: function(x,m,s){console.log(m)}
            });//End of ajax
        }//End of signInViaAJAX

    </script>



    <?php
    include 'includes/footer.php';
?>
