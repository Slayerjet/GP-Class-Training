<?php

//set the title for the page
$title = 'PHP Course - Upload Page Page';
include 'includes/header.php';
?>
    <div class="container">
        <h1>Upload an image file and store reference in Database</h1>
        <form action="uploadAction.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="image_title" placeholder="Image Title" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="image_tags" placeholder="Image Tags" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" name="file" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Upload</button>
        </form>

    </div>



<?php
    include 'includes/footer.php';
?>
