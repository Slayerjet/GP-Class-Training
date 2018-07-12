<?php

//set the title for the page
$title = 'VGHS - Consoles';
include 'header.php';

require_once('dbconfig.php');
?>
    <br>
    <br>
    <div class="mainPage">
    <br>
        <h3><u>Consoles</u><br><a href="addConsole.php"><button class="btn btn-success" class="addGameBtn" type="button">Add a Console</button></a> </h3>
        <div class="container table-responsive">
            <table class="table-bordered table-striped table">
                <thead>
                    <tr>
                        <th>Console</th>
                        <th>Description</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT console_id,console_name,console_description FROM consoles";
                $result = $conn->query($sql);
                //for dev purposes
                //var_dump($result->fetch_array());
                
                //loop through the results and display in the html table
                while($row = $result->fetch_array()){
                    echo '<tr>';
                    echo '<td>' . $row['console_name'] . '</td>';
                    echo '<td>' . $row['console_description'] . '</td>';
                    echo '<td><a href="updateConsole.php?console_id='.$row['console_id'].'">Update</a></td>';
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
