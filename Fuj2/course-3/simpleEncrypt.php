<form action="#" method="get">
   
    <input type="text" name="pwd">
    <button type="submit" name="submitBtn">Login</button>
    <br>
    
</form>
   

   <?php 

    $encryptedPassword = md5('fujitsu');
    
    if(isset($_GET['submitBtn'])){
        $password = $_GET['pwd'];
        if(md5($password) == $encryptedPassword){
            echo 'The password is correct';
        } else {
            echo 'The password is incorrect, Please try again!';
        }
//        $md5Password = md5($password);
//        echo $md5Password;
    }
    
    

    
    
?>