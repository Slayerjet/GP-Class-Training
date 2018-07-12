<?php

//set the title for the page
$title = 'PHP Course - Send us a message';
include '../includes/header.php';
?>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" class="form-control" placeholder="Enter your Email Address">
            </div>
            <div class="form-group">
                <select id="category" class="form-control">
                   <option value="null">Please select a category</option>
                    <?php
                        //Connect to DB
                        require_once('../dbconfig.php');
                        //Prepare sql query string
                        $sql = "SELECT * FROM catagories";
                        $result = $conn->query($sql);
                        //Loop through the results and create options for the select menu
                        while($row = $result->fetch_array()){
                            echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea maxlength="200" id="message" class="form-control" placeholder="Input your message..."></textarea>
                <br>
                <button id="sendBtn" type="button" class="btn btn-success">Send</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            //Listen for the user clicking the send Btn
            $('#sendBtn').click(function() {
                sendFormViaAJAX();
            }); //End of sendBtn.click
        }); //End of document.ready

        function sendFormViaAJAX() {
            var formValid = true;
            //check email is supplied
            if ($('#email').val() == '') {
                formValid = false;
            } else {
                var email = $('#email').val();
            }
            //check category is supplied
            if ($('#category').val() == 'null') {
                formValid = false;
            } else {
                var category = $('#category').val();
            }
            //check message is supplied
            if ($('#message').val() == '') {
                formValid = false;
            } else {
                var message = $('#message').val();
            }
            //if everything is okay
            if (formValid) {
                var dataObj = {
                    email:email,
                    category:category,
                    message:message
                }//end of dataObj
                //console.log(dataObj);
                //Send data to server side using AJAX
                $.ajax({
                    url: 'saveMessage.php',
                    type: 'post',
                    data: dataObj,
                    dataType: 'text',
                    success: function(data){console.log(data)},
                    error: function(x,m,s){console.log(m)}
                });//End of AJAX
            }
        } //End of sendFormViaAJAX

    </script>



    <?php
    include '../includes/footer.php';
?>
