<?php

//set the title for the page
$title = 'VGHS - Admin';
include('../header.php');
$sql = "SELECT user_id,username,role,email FROM users";


if(isset($_SESSION['username'])) {
    if($_SESSION['username'] != 'slayerjet') {
        header('location: /project/project/index.php');
    }}
?>
    <br>
    <br>
    <h1 style="text-align:center;">Admin</h1>
    
    <div class="mainPage">
        <h3><u>Users</u><br><a href="../register.php"><button class="btn btn-success" class="addGameBtn" type="button">Add a User</button></a> </h3>
        <div class="container table-responsive">
            <table class="table-bordered table-striped table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php
                    
                $result = $conn->query($sql);
                //for dev purposes
                //var_dump($result->fetch_array());
                
                //loop through the results and display in the html table
                while($row = $result->fetch_array()){
                    echo '<tr>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['role'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td><a href="../updateUsers.php?user_id='.$row['user_id'].'">Update</a></td>';
                    echo '<td><a class="deleteUserLink" href="../deleteUser.php?user_id='.$row['user_id'].'">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function() {
                //Listen for the user clicking DelteUserLink
                $('.deleteUserLink').click(function(e) {
                    e.preventDefault(); //Stop browser performing default behaviour
                    var yes = confirm('Are you sure you want to delete this user?');
                    if (yes) {
                        console.log(e.target.href);
                        window.location = e.target.href; //Redirect to delete page
                    }
                });
            });

        </script>
    </div>
    
    
    

    <div class="mainPage">
        <h3><u>Consoles</u><br><a href="../addConsole.php"><button class="btn btn-success" class="addGameBtn" type="button">Add a Console</button></a> </h3>
        <div class="container table-responsive">
            <table class="table-bordered table-striped table">
                <thead>
                    <tr>
                        <th>Console</th>
                        <th>Description</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT console_id,console_name,console_description FROM consoles";
                $result = $conn->query($sql);
                //for dev purposes
                //var_dump($result->fetch_array());
                
                //loop through the results and display in the html table
                while($row = $result->fetch_array()){
                    echo '<tr>';
                    echo '<td>' . $row['console_name'] . '</td>';
                    echo '<td>' . $row['console_description'] . '</td>';
                    echo '<td><a href="../updateConsole.php?console_id='.$row['console_id'].'">Update</a></td>';
                    echo '<td><a class="deleteConsoleLink" href="../deleteConsole.php?console_id='.$row['console_id'].'">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>



        </div>

        <script>
            $(document).ready(function() {
                //Listen for the user clicking DelteConsoleLink
                $('.deleteConsoleLink').click(function(e) {
                    e.preventDefault(); //Stop browser performing default behaviour
                    var yes = confirm('Are you sure you want to delete this Console?');
                    if (yes) {
                        console.log(e.target.href);
                        window.location = e.target.href; //Redirect to delete page
                    }
                });
            });

        </script>

    </div>
    
    
    <div class="mainPage">
        <br>
        <h3>Games <br> <a href="../addGame.php?user_id='.$row['user_id'].'"><button class="btn btn-success" class="addGameBtn" type="button">Add a Game</button></a>
        </h3>
        <div class="container table-responsive">
            <table class="table-bordered table-striped table">
                <thead>
                    <tr>
                        <th>Game Name</th>
                        <th>Genre</th>
                        <th>Release Date</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT game_id,game_name,game_genre,game_date FROM games";
                $result = $conn->query($sql);
                //for dev purposes
                //var_dump($result->fetch_array());
                
                //loop through the results and display in the html table
                while($row = $result->fetch_array()){
                    echo '<tr>';
                    echo '<td>' . $row['game_name'] . '</td>';
                    echo '<td>' . $row['game_genre'] . '</td>';
                    echo '<td>' . $row['game_date'] . '</td>';
                    echo '<td><a href="../updateGames.php?game_id='.$row['game_id'].'">Update</a></td>';
                    echo '<td><a class="deleteGamesLink" href="../deleteGames.php?game_id='.$row['game_id'].'">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
            $(document).ready(function() {
                //Listen for the user clicking DelteConsoleLink
                $('.deleteGamesLink').click(function(e) {
                    e.preventDefault(); //Stop browser performing default behaviour
                    var yes = confirm('Are you sure you want to delete this Game?');
                    if (yes) {
                        console.log(e.target.href);
                        window.location = e.target.href; //Redirect to delete page
                    }
                });
            });

        </script>
        
        
        <div class="mainPage">
        <h3><u>Reviews</u><br><a href="../uploadReviewImage.php?user_id='.$row['user_id'].'"><button class="btn btn-success" class="addReviewBtn" type="button">Add a Review</button></a> </h3>
        <div class="container table-responsive">
            <table class="table-bordered table-striped table">
                <thead>
                    <tr>
                        <th>Game</th>
                        <th>Platform</th>
                        <th>Image</th>
                        <th>By</th>
                        <th>Review</th>
                        <th>Date</th>
                        <th>Rating</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT review_id,review_name,review_platform,review_image,review_by,review_review,review_date,review_rating FROM reviews";
                $result = $conn->query($sql);
                //for dev purposes
                //var_dump($result->fetch_array());
                
                //loop through the results and display in the html table
                while($row = $result->fetch_array()){
                    echo '<tr>';
                    echo '<td>' . $row['review_name'] . '</td>';
                    echo '<td>' . $row['review_platform'] . '</td>';
                    echo '<td>' . $row['review_image'] . '</td>';
                    echo '<td>' . $row['review_by'] . '</td>';
                    echo '<td>' . $row['review_review'] . '</td>';
                    echo '<td>' . $row['review_date'] . '</td>';
                    echo '<td>' . $row['review_rating'] . '</td>';
                    echo '<td><a class="deleteReviewLink" href="../deleteReview.php?review_id='.$row['review_id'].'">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>



        </div>

        <script>
            $(document).ready(function() {
                //Listen for the user clicking DelteConsoleLink
                $('.deleteReviewLink').click(function(e) {
                    e.preventDefault(); //Stop browser performing default behaviour
                    var yes = confirm('Are you sure you want to delete this Console?');
                    if (yes) {
                        console.log(e.target.href);
                        window.location = e.target.href; //Redirect to delete page
                    }
                });
            });

        </script>

    </div>

    <?php
    include '../footer.php';
?>
