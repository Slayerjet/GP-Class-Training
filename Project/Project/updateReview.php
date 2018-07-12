<?php
//set the title for the page
$title = 'VGHS - Update Games';
include('header.php');
require_once('dbconfig.php');

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: signIn.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: signIn.php");
  }


if(isset($_GET['review_name'])){
    $sql = "UPDATE reviews SET review_title = '$_GET[review_title]', review_name = '$_GET[review_name]', review_game = '$_GET[review_game]', review_by = '$_GET[review_by]', review_platform = '$_GET[review_platform]', review_image = '$_GET[review_image]', review_review = '$_GET[review_review]', WHERE game_id = $_GET[game_id]";
    
    $conn->query($sql);
}

$sql = "SELECT game_id,game_name,game_genre,game_date FROM games WHERE game_id = " . $_GET['game_id'];

$result = $conn->query($sql);

while($row = $result->fetch_array()){
    $game_id = $row['game_id'];
    $game_name = $row['game_name'];
    $game_genre = $row['game_genre'];
    $game_date = $row['game_date'];
}

?>
    <div class="container">
       <br>
       <br>
       <br>
        <h1>Update Game</h1>
        <form>
            <div class="form-group">
                <label for="game_name">Game Name</label>
                <input type="text" name="game_name" class="form-control" value="<?php echo $game_name; ?>">
                <label for="game_genre">Genre</label>
                <select name="game_genre" class="form-control">
                    <option value="<?php echo $game_genre; ?>"><?php echo $game_genre; ?></option>
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
                <input type="date" name="game_date" class="form-control" value="<?php echo $game_date; ?>">
            </div>

            <input type="hidden" name="game_id" value="<?php echo $game_id ?>">

            <button type="submit" class="btn btn-success updateGameLink">Update game</button>

            <script>
                $(document).ready(function() {
                    //Listen for the user clicking updategameLink
                    $('.updateGameLink').click(function(e) {
                        alert("Game updated")
                    });
                });
                

            </script>


        </form>
    </div>
    <?php include('footer.php'); ?>
