<?php

//set the title for the page
$title = 'VGHS - Register';
include 'header.php';
?>

    <br>
    <br>
    <br>
    <div class="container">
        <form action="addConsoleAction.php" method="post">
            <h1>Add Console</h1>
            <br>
            <div class="form-group">
                <label for="console_name">Console Name</label>
                <input type="text" name="console_name" class="form-control" required>
                <label for="console_description">Description</label>
                <input type="text" name="console_description" class="form-control" id="console_description">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>

    
<?php include 'footer.php'; ?>
