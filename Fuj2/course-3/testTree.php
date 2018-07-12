<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Tree</title>
</head>
<body>
  <header style="background: blue; position: fixed; width: 100%; text-align: center;">
      <div>
          <h1>List of Files and Folders</h1>
      </div>
  </header>
  <br><br><br><br><br>
   
    
    <?php 
    
        require_once('Tree.php');
    
    
        $treeMenu = new Tree('.');
    
    
    ?>
    
</body>
</html>