<?php

//set the title for the page
$title = 'PHP Course - Sign in Page';
include 'includes/header.php';
?>
    <div class="container">
       <form action="addCategoryAction.php" method="post">
           <h1>Add Category</h1>
               <div class="form-group">
                   <label for="category">Add Category</label>
                   <input class="form-control" type="text" name="category">
               </div>
               <button type="submit" class="btn btn-success">Add Category</button>
        </form>
    </div>



<?php
    include 'includes/footer.php';
?>
