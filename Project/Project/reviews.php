<?php
//set the title for the page
$title = 'VGHS - Reviews';
include('header.php');
require_once('dbconfig.php');
?>
<br>
    <br>
    <div class="mainPage">
    <br>
        <h3><u>Reviews</u><br><a href="addReview.php"><button class="btn btn-success" class="addReviewBtn" type="button">Add a Review</button></a></h3>
        
        <table>
            
        </table>
        
        <div class="container table-responsive">
            <table class="table-bordered table-striped table">
                <thead>
                    <tr>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT review_id,review_image,review_platform,review_name,review_by,review_date,review_rating FROM reviews";
                $result = $conn->query($sql);
                //for dev purposes
                //var_dump($result->fetch_array());
                
                //loop through the results and display in the html table
                while($row = $result->fetch_array()){
                    echo '<tr>';
                    echo '<td><a class="reviewLink" href="reviewsPage.php?review_id='.$row['review_id'].'">' . '<img style="float:left;" width="20%" src="gamePics/' . $row['review_image'] . '">' . '<h2>' .  $row['review_name'] . '</h2>' . 'By ' . $row['review_by'] . ' | ' . $row['review_date'] . '<br>' . '</a></td>';
                    echo '<td>' . $row['review_platform'] . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>



        </div>
    </div>

    <?php
    include 'footer.php';
?>
