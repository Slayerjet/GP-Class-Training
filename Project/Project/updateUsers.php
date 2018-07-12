<?php
//Check if the url parameter username "is set" - If it isnt, then redirect the user to the correct starting point (users.php) - ! means ==false -


//Get the user data from the DB
require_once('dbconfig.php');//This provides us with the $conn connection object

//Check if the form has been posted

if(isset($_SESSION['username'])){
    $sql = "UPDATE users SET username = '$_GET[username]', f_name = '$_GET[f_name]', l_name = '$_GET[l_name]', email = '$_GET[email]', password = '$_GET[password]' WHERE user_id = $_GET[user_id]";
    
    $conn->query($sql);
}

$sql = "SELECT user_id,username,f_name,l_name,email,password FROM users WHERE user_id = " . $_GET['user_id'];

$result = $conn->query($sql);

while($row = $result->fetch_array()){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $f_name = $row['f_name'];
    $l_name = $row['l_name'];
    $email = $row['email'];
    $password = $row['password'];
}


//set the title for the page
$title = 'PHP Course - Update user form Page';
include 'includes/header.php';
?>
   <br>
   <br>
   <br>
    <div class="container">

        <h1>Update User</h1>
        <form>
        <div class="form-group">
            <label for="username">Username</label>
            <input value="<?php echo $username; ?>" type="text" name="username" class="form-control">
            <label for="f_name">First Name</label>
            <input value="<?php echo $f_name; ?>" type="text" name="f_name" class="form-control">
            <label for="l_name">Last Name</label>
            <input value="<?php echo $l_name; ?>" type="text" name="l_name" class="form-control"><label for="email">Email</label>
            <input value="<?php echo $email; ?>" type="text" name="email" class="form-control"><label for="password">Password</label>
            <input value="<?php echo $password; ?>" type="text" name="password" class="form-control">
        </div>
        
        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
        
        <button type="submit" class="btn btn-success updateUserLink">Update User</button>
        
        <script>
        $(document).ready(function() {
                    //Listen for the user clicking updateUserLink
                    $('.updateUserLink').click(function(e) {
                        alert("User Updated")
                    });
                });
        </script>
        
        
        </form>
        </div <?php include 'includes/footer.php'; ?>
