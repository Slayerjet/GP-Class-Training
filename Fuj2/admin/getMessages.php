<?php
    //connect to db
    require_once('../dbconfig.php');
    
    $catFilter = $_POST['catFilter'];
    $textFilter = $_POST['textFilter'];
    
    //create the SQLquery
    $sql = "SELECT * FROM messages, catagories WHERE messages.category = catagories.cat_id";
    
    //Check if the admin has selected a specific catagory
    if($catFilter != 'all'){
        $sql .= " AND category = " . $catFilter;
    }
    
    //Check if the admin had provided a text filter
    if($textFilter != ''){
        $sql .= " AND message LIKE '%" . $textFilter . "%'";
    }
    
    //Run the query
    $result = $conn->query($sql);
    
    //prepare an array for the response
    $messages = array();
    while($row = $result->fetch_assoc()){
        array_push($messages, $row);
    }//End of while
    
    echo json_encode($messages);
    
?>