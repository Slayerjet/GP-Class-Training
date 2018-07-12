<?php

session_start(); 

$target_dir = "gamePics/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
//        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["file"]["size"] > 100000000) {
//    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file

} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";



// Save to the database
        require_once('dbconfig.php');
        
        $username = $_SESSION['username'];
            
            
        
        $now = date('l dS F Y');
        
        $stmt = $conn->prepare("INSERT INTO reviews (review_image,review_title,review_name,review_platform,review_by,review_review,review_date,review_rating) VALUES(?,?,?,?,?,?,?,?)");
        $image_file = basename( $_FILES["file"]["name"]);
        $stmt->bind_param('ssssssss',$image_file,$_POST['review_title'],$_POST['review_name'],$_POST['review_platform'],$username,$_POST['review_review'],$now,$_POST['review_rating']);
        $stmt->execute();
        
        header('location:reviews.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

include('footer.php');
?>