<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>
<?php

//set the title for the page
$title = 'PHP Course - Message Administration';
include '../includes/header.php';
?>
    <div class="container">
        <br>
        <form id="filterForm">
            <select id="category" class="form-control">
            <option value="all">All Catergories</option>
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
            <br>
            <div class="form-group">
                <input class="form-control" id="textFilter" placeholder="Filter by keywords...">
            </div>
            <br>
            <button type="submit" id="getBtn" class="btn btn-success">Get Messages</button>
        </form>
        <br>
        <table id="messagesTbl" class="table table-bordered table-striped" >
            <thead>
                <th>Email</th>
                <th>Category</th>
                <th>Message</th>
                <th>Date</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            //initially hide the table
            $('#messagesTbl').hide();
            
            
//-----------------------Listen for the user clicking the send Btn---------------------------------
//            $('#getBtn').click(function() {                                                    //
//                getMessagesViaAJAX();                                                          // 
//            }); //End of getBtn.click                                                          //
//                                                                                               //
//----------------------Listen for the user pressing the enter Btn---------------------------------
            $('#filterForm').submit(function(e){
                e.preventDefault();//Stops browser default behaviour
                getMessagesViaAJAX();
            })//End of submit.function
        }); //End of document.ready

        function getMessagesViaAJAX() {
            //Prepare the data to be sent to the server
            var dataObj = {
                catFilter: $('#category').val(),
                textFilter: $('#textFilter').val()
            } //End of dataObj

            //Send data to server side using AJAX
            $.ajax({
                url: 'getMessages.php',
                type: 'post',
                data: dataObj,
                dataType: 'json',
                success: function(data) {
                    renderMessages(data)
                },
                error: function(x, m, s) {
                    console.log(m)
                }
            }); //End of AJAX
        }; //End of getMessagesViaAJAX

        function renderMessages(data) {
            //initially hide the table
            $('#messagesTbl').hide();
            //Prepare obj for handlebars
            var hbObj = {
                messages: data
            };
            var source = $('#messagesTemplate').html();
            var template = Handlebars.compile(source);
            var html = template(hbObj);
            $('#messagesTbl tbody').html(html);
            //now show the table
            $('#messagesTbl').fadeIn();
        }

    </script>
    <script id="messagesTemplate" type="text/x-handlebars-template">
        {{#each messages}}
        <tr>
            <td>
                {{email}}
            </td>
            <td>
                {{cat_name}}
            </td>
            <td>
                {{message}}
            </td>
            <td>
                {{date}}
            </td>
        </tr>
        {{/each}}
    </script>

    <?php
    include '../includes/footer.php';
?>
