<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?php echo $title; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script>
        //Decide whether admin links should be displayed    
        $(document).ready(function() {
            if (sessionStorage.getItem('permissions') != undefined) {
                if (sessionStorage.getItem('permissions') != 'admin') {
                    $('.admin').remove();
                }
            }

        }); //End of document.ready

    </script>
</head>

<body>
    
    <?php
    require_once('dbconfig.php');
            if(isset($_SESSION['user_id'])){
            $sql = "SELECT user_id,username FROM users WHERE user_id = $_GET[user_id]";
                $result = $conn->query($sql);
    
                while($row = $result->fetch_array()){
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                }
                
                echo $user_id;
                echo $username;
            }else{
                echo "no no no no no";
            }
?>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark justify-content-center">
        <a class="navbar-brand" href="/fuj2/index.php">PHP Course</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/fuj2/index.php">Home</a>
                </li>
                <li class="nav-item loggedIn">
                    <a class="nav-link" href="/fuj2/login.php">Sign in</a>
                </li>
                <li class="nav-item loggedIn">
                    <a class="nav-link" href="/fuj2/reg.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fuj2/calc.php">VAT Calculator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fuj2/users.php">Users</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fuj2/messaging/index.php">Send a message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fuj2/addCategory.php">Add Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fuj2/categories.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fuj2/uploadForm.php">Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fuj2/uploadForm.php">images</a>
                </li>
                <li class="nav-item admin">
                    <a class="nav-link" href="/fuj2/admin/index.php">Admin</a>
                </li>
            </ul>
        </div>
    </nav>
