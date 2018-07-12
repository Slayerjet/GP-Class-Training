<?php
$title = 'VGHS - My Account';
include('header.php');

//set the title for the page


require_once('dbconfig.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];

$sql = "SELECT user_id,username,user_name,user_memo,user_image,role,email,password,date_reg FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);


while($row = $result->fetch_array()){
  $user_id = $row['user_id'];
  $username = $row['username'];
  $role = $row['role'];
  $email = $row['email'];
  $password = $row['password'];
  $date_reg = $row['date_reg'];
  $user_name = $row['user_name'];
  $user_memo = $row['user_memo'];
  $user_image = '<img align="middle" width="200px" src="userImages/' . $row['user_image'] . '">';
}

// if(empty($user_image)) {
//     echo '<img src="/project/project/images/user.png">';
// }

// if (empty($user_image)) $user_image = '<img src="/project/project/images/user.png">';

if (($user_image) !== false) {
    $user_image = '<img width="200px" src="/project/project/images/user.png">';
}

?>
                    

    <br>
    <br>
        <div class="mainPage">
            <div style="text-align: right; padding-top: 3px;">
               <!-- <a href="/project/project/updateProfile.php?username=<?php 
            //    echo $username
                ?>"><button class="btn">Edit Profile</button></a> -->
            </div>
            <div>
                <table>
                    <tr>
                        <td valign="top">
                        <h8><?php echo $user_image; ?></h8>
                        </td>
                        
                        <td valign="top">
                        <h8 style="font-size: 50px; font-weight: 900;"><?php echo $username?></h8><h4 style="color: #adabaa;"><?php echo $user_name ?></h4><h5><?php echo $user_memo ?></h5>
                        </td>
                    </tr>
                    
                </table>
            </div>
            <div>
            <table>
                <tr>
                    <td style="width: 200px;"></td>
                    <td>
                        <a onclick="myFunction()" class="personalInfo">Click to toggle user information</a>
                        <div id="myDIV" style="display: none;">
                            Username: <?php echo $username ?><br>
                            Email Address:  <?php echo $email ?><br>
                            Role: <?php echo $role ?><br>
                            Name: <?php echo $user_name ?><br>
                            Password: <?php echo $password ?><br>
                            Date Joined: <?php echo $date_reg ?><br>
                        </div>
                    </td>
                    
                </tr>
            </table>
            <br>
            </div>
                <script>
                    function myFunction() {
                        var x = document.getElementById("myDIV");
                        if (x.style.display === "none") {
                        x.style.display = "block";
                        } else {
                        x.style.display = "none";
                        }
                    }
                </script>
            </div>
        </div>
        <div class="mainPage">
            <div>
                <h1>Recent Activity</h1>
            </div>
        </div>
   
<?php
    include('footer.php');
?>
