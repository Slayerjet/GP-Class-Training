<?php
$title = 'VGHS - Reviews';

include('header.php');


  
require_once('dbconfig.php');


$sql = "SELECT review_id,review_image,review_banner,review_title,review_name,review_platform,review_by,review_review,review_date,review_rating FROM reviews WHERE review_id = $_GET[review_id]";
$result = $conn->query($sql);


while($row = $result->fetch_array()){
    $review_id = $row['review_id'];
    $review_banner = '<img align="middle" width="" src="gameBanners/' . $row['review_banner'] . '">';
    $review_image = '<img align="middle" width="" src="gamePics/' . $row['review_image'] . '">';
    $review_title = $row['review_title'];
    $review_name = $row['review_name'];
    $review_by = $row['review_by'];
    $review_review = $row['review_review'];
    $review_date = $row['review_date'];
    $review_rating = $row['review_rating'];
    $review_platform = $row['review_platform'];

}

?>

    <br>
    <br>
    <br>
    <div class="mainPage">
    

        <h9 style="font-size: 34px; font-weight: 900; text-align: left;"><?php echo $review_title ?></h9><h4 style="color: #adabaa; font-style: italic;"><?php echo $review_name ?> | <?php echo $review_platform ?></h4><h5 style="color: #adabaa; font-size: 15px">By <?php echo $review_by ?> | <?php echo $review_date ?> | <?php 
        if($review_rating == '1') {
            echo '<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating1">';
        }
        if($review_rating == '2') {
            echo '<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating2">'.'<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating2">';
        }
        if($review_rating == '3') {
            echo '<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating3">'.'<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating3">'.'<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating3">';
        }
        if($review_rating == '4') {
            echo '<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating4">'.'<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating4">'.'<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating4">'.'<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating4">';
        }
        if($review_rating == '5') {
            echo '<img src="/project/project/images/star.png" style="padding-bottom: 2px; padding-bottom: 2px; height: 20px;" alt="review_rating5">'.'<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating5">'.'<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating5">'.'<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating5">'.'<img src="/project/project/images/star.png" style="padding-bottom: 2px; height: 20px;" alt="review_rating5">';
        }
        
        ?></h5>
        <div class="container table-responsive">
            <table>
                <tr>
                    <th style="text-align: center;"><?php echo $review_image ?></th>
                </tr>
                <tr>
                    <td> <br>  </td>
                </tr>
                <tr>
                    <td><?php echo $review_review ?></td>
                </tr>
                <tr align="center">
                    <td> <?php if($review_by == $_SESSION['username']){echo '<button href="updateReview.php?review_id='.$row['review_id'].'" class="btn btn-success"> Edit Review </button>';} ?> </td>
                </tr>
            </table>
            </table>
            <br>
        </div>
    </div>

    <?php
    include 'footer.php';
?>
