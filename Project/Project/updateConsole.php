<?php
$title = 'VGHS - Consoles';
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


if(isset($_GET['console_name'])){
    $sql = "UPDATE consoles SET console_name = '$_GET[console_name]', console_description = '$_GET[console_description]' WHERE console_id = $_GET[console_id]";
    
    $conn->query($sql);
}

$sql = "SELECT console_id,console_name,console_description FROM consoles WHERE console_id = " . $_GET['console_id'];

$result = $conn->query($sql);



while($row = $result->fetch_array()){
    $console_id = $row['console_id'];
    $console_name = $row['console_name'];
    $console_description = $row['console_description'];
}




?>
   <br>
   <br>
   <br>
    <div class="container">

        <h1>Update Console</h1>
        <form>
            <div class="form-group">
                <label for="console_name">Name</label>
                <input value="<?php echo $console_name; ?>" type="text" name="console_name" class="form-control">
                <label for="console_description">Description</label>
                <input value="<?php echo $console_description; ?>" type="text" name="console_description" class="form-control">
            </div>

            <input type="hidden" name="console_id" value="<?php echo $console_id ?>">

            <button type="submit" class="btn btn-success updateConsoleLink">Update Console</button>

            <script>
                $(document).ready(function() {
                    //Listen for the user clicking updateConsoleLink
                    $('.updateConsoleLink').click(function(e) {
                        alert("Console updated")
                    });
                });

            </script>


        </form>
    </div>
    <?php include('footer.php'); ?>
