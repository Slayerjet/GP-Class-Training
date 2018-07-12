<?php
    //Step 1 - connect to database
    require_once('dbconfig.php');

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
                    <th>Role</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT user_id,username,permissions,f_name,l_name,email FROM users";
                $result = $conn->query($sql);
                //for dev purposes
                //var_dump($result->fetch_array());
                
                //loop through the results and display in the html table
                while($row = $result->fetch_array()){
                    echo '<tr>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['permissions'] . '</td>';
                    echo '<td>' . $row['f_name'] . '</td>';
                    echo '<td>' . $row['l_name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td><a href="updateUsers.php?user_id='.$row['user_id'].'">Update</a></td>';
                    echo '<td><a class="deleteUserLink" href="deleteUser.php?user_id='.$row['user_id'].'">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>    
</div>
   
    <script>
        
        $(document).ready(function(){
            //Listen for the user clicking DelteUserLink
            $('.deleteUserLink').click(function(e){
                e.preventDefault();//Stop browser performing default behaviour
                var yes = confirm('Are you sure you want to delete this user?');
                if(yes){
                    console.log(e.target.href);
                    window.location = e.target.href;//Redirect to delete page
                }
            });
        });
        
    </script>
    
    
    
<?php
    include 'includes/footer.php';
?>