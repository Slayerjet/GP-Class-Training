<?php
//set the title for the page
$title = 'VGHS - Home Page';
include('header.php');
require_once('dbconfig.php')
?>

<body>
    <div id="mainLogo">
        <figure class="mainLogo">
            <img src="images/logo.png" width="300px">
        </figure>
    </div>
    <div class="mainPage">
        <h3>Video Game Home Surveys</h3>
        <div class="welcome">
            <br> Welcome to VGHS - Your source for the latest in video game news, reviews, previews and features about Microsoft Xbox, Sony PlayStation, Nintendo Switch, and Next Generation consoles. Here you can read and write your own reviews on all things gaming for everyone to see. Register an account with VGHS so that you can write reviews for everyone to see.
        </div>
        <br>
    </div>



    <table class="mainPageTable">
        <tr>
            <td class="sidesTableLeft">
            <h4>Create Content</h4>
                On VGHS you can create your own reviews on any game for everyone to see. No matter what device you are on, you can write a review wherever you are.
                <br>
                <br>
                <a href="addReview.php">Click here to write your own review</a>
            </td>
            <td class="sidesTableMiddle">
                <br>   
            </td>
            <td class="sidesTableRight">
            <h4>Join the Community</h4>
                On VGHS you can meet new people and share your content with them. With hundreds of people online, there wont be a review unread!
                <br>
                <br>
                <a href="register.php">Click here to Sign up now!</a>
            </td>
        </tr>
    </table>




    <div class="mainPage">
        <h3><u>Recent Reviews</u></h3>
        <br>
        <div class="container table-responsive">
            <table class="table-bordered table-striped table">
                <tbody>
                    <?php
                        $sql = "SELECT review_id,review_image,review_platform,review_name,review_by,review_date,review_rating FROM reviews ORDER BY review_id DESC LIMIT 5";
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
    include('footer.php');
?>
