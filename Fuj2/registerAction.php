<?php

    //Step 1 - connect to database
    require_once('dbconfig.php');

    //Get the current date for the date_reg
    $now = date('r');


//------------------------------THIS WORKS BUT IS INSECURE-----------------------------------------
    //Insert user into the database - SQL (Structered Query Language)
//    $sql = "INSERT INTO users (f_name,l_name,username,email,password,date_reg) VALUES('$_POST[f_name]','$_POST[l_name]','$_POST[username]','$_POST[email]','$_POST[password]','$now')";
//    $conn->query($sql);
//    echo $sql;

//-------------------------------------------------------------------------------------------------

//------------------------It is more secure to use prepared statements-----------------------------
    
    $stmt = $conn->prepare("INSERT INTO users (username, permissions,f_name,l_name,email,password,date_reg) VALUES(?,?,?,?,?,?,?)");
    
    $role = 'user';
    
    $stmt->bind_param('sssssss',$_POST['username'],$role,$_POST['f_name'],$_POST['l_name'],$_POST['email'],$_POST['password'],$now);
$stmt->execute();
    
?>





<?php

//set the title for the page
$title = 'PHP Course - Sign in Page';
include 'includes/header.php';
?>
    <div class="container">
    <h1>Users</h1>
        <table class="table-bordered table-striped table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT f_name,l_name,username,email FROM users";
                $result = $conn->query($sql);
                //for dev purposes
                //var_dump($result->fetch_array());
                
                //loop through the results and display in the html table
                while($row = $result->fetch_array()){
                    echo '<tr>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['f_name'] . '</td>';
                    echo '<td>' . $row['l_name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    
    
    </div 
    
    
    
<?php
    include 'includes/footer.php';
