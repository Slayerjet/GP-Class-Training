<?php
$title = 'VGHS - Update Profile';
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
  

if(isset($_GET['username'])){
    $sql = "UPDATE users SET username = '$_GET[username]', user_name = '$_GET[user_name]', email = '$_GET[email]', password = '$_GET[password]', user_memo = '$_GET[user_memo]', user_image = '$_GET[user_image]' WHERE user_id = $_GET[user_id]";
    
    $conn->query($sql);
}

$sql = "SELECT user_id,username,user_name,user_memo,user_image,email,password FROM users  WHERE user_id = " . $_GET['user_id'];
$result = $conn->query($sql);

while($row = $result->fetch_array()){
  $user_id = $row['user_id'];
  $username = $row['username'];
  $email = $row['email'];
  $password = $row['password'];
  $user_name = $row['user_name'];
  $user_memo = $row['user_memo'];
  $user_image = '<img align="middle" width="200px" src="userImages/' . $row['user_image'] . '">';
}



?>
    <div class="container">
       <br>
       <br>
       <br>
       <br>
        <h1>Update Profile</h1>
        <br>
        <form>
            <div class="form-group">
                <!-- <div class="form-group">
                    <label for="user_image">Change Profile Picture</label>
                    <input type="file" name="file" class="form-control">
                </div> -->
                <label for="username">Username</label>
                <input name="username" class="form-control" value="<?php echo $username; ?>">
                <label for="email">Email</label>
                <input name="email" class="form-control" value="<?php echo $email; ?>">
                <label for="password">Password</label>
                <input name="password" class="form-control" value="<?php echo $password; ?>">
                <label for="user_memo">Slogan</label>
                <input type="text" name="user_memo" class="form-control" value="<?php echo $user_memo; ?>">
                <label for="user_name">Name</label>
                <input type="text" name="user_name" class="form-control" value="<?php echo $user_name; ?>">
            </div>

            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">

            <button type="submit" class="btn btn-success">Update Profile</button>
        
        <script>
        $(document).ready(function() {
                    //Listen for the user clicking updateUserLink
                    $('.updateProfileLink').click(function(e) {
                        alert("Profile Updated")
                    });
                });
        </script>
        
        
        </form>
    </div 
<?php include('footer.php'); ?>
