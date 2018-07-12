<?php

//set the title for the page
$title = 'VGHS - Add Games';
include 'header.php';
require_once('dbconfig.php');
?>

    <br>
    <br>
    <br>
    <div class="container">
        <form action="addGameAction.php" method="post">
            <h1>Add Game</h1>
            <br>
            <div class="form-group">
                <label for="game_name">Game Name</label>
                <input type="text" name="game_name" class="form-control">
                
                <label for="game_genre">Genre</label>
                <select name="game_genre" class="form-control">
                    <option value="No genre set">Select Genre</option>
                    <option value="MMO">MMO</option>
                    <option value="Simulation">Simulation</option>
                    <option value="Real-Time Strategy">Real-Time Strategy</option>
                    <option value="Puzzle">Puzzle</option>
                    <option value="Action">Action</option>
                    <option value="Shooter">Shooter</option>
                    <option value="Sports">Sports</option>
                    <option value="RPG">RPG</option>
                    <option value="Educational">Educational</option>
                </select>
                <label for="game_date">Release Date</label>
                <input type="date" name="game_date" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>

    
<?php include 'footer.php'; ?>



<!-- <label for="game_platform">Platform</label>
                <select name="game_platform" class="form-control">
                   <option value="No platform set">Select Platform</option>
                    <?php
                        // //Prepare sql query string
                        // $sql = "SELECT console_id,console_name FROM consoles";
                        // $result = $conn->query($sql);
                        // //Loop through the results and create options for the select menu
                        // while($row = $result->fetch_array()){
                        //     echo '<option value="'.$row['console_name'].'">'.$row['console_name'].'</option>';
                        // }
                    ?>
                </select> -->