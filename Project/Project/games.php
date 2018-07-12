<?php

//set the title for the page
$title = 'VGHS - Games';
include 'header.php';
require_once('dbconfig.php')
?>


    <br>
    <br>
    <div class="mainPage">
        <br>
        <h3><u>Games</u>
            <br>
            <a href="addGame.php"><button class="btn btn-success" class="addGameBtn" type="button">Add a Game</button></a>

        </h3>
        <div class="container table-responsive">
            <table class="table-bordered table-striped table">
                <thead>
                    <tr>
                        <th>Game Name</th>
                        <th>Genre</th>
                        <th>Release Date</th>
                        <th>Update</th>
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
                    echo '<td><a href="updateGames.php?game_id='.$row['game_id'].'">Update</a></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
include 'footer.php';
?>
