<?php
    //Step 1 - connect to database
    require_once('dbconfig.php');

//set the title for the page
$title = 'PHP Course - Add Category Page';
include 'includes/header.php';
?>
    <div class="container">
        <h1>Categories</h1>
        <table class="table-bordered table-striped table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM catagories";
                $result = $conn->query($sql);
                //for dev purposes
                //var_dump($result->fetch_array());
                
                //loop through the results and display in the html table
                while($row = $result->fetch_array()){
                    echo '<tr>';
                    echo '<td>' . $row['cat_name'] . '</td>';
                    echo '<td><a class="deleteCategoryLink" href="deleteCategory.php?user_id='.$row['cat_id'].'">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>


        </div <?php include 'includes/footer.php';
