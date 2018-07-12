<?php

//set the title for the page
$title = 'PHP Course - VAT Calculator Page';
include 'includes/header.php';
?>
    <div class="container">
        <h1>VAT Calculater</h1>
        <form>

            <div class="form-group">
                <lable>Amount</lable>
                <input type="text" name="amount" class="form-control"
                <?php
                if(isset($_GET['amount'])){
                    echo ' value="' . $_GET['amount'] . '"';
                }       
                ?> 
                >
                <!--End of rate input-->
            </div>
            <div class="form-group">
                <lable>Rate</lable>
                <input type="text" name="rate" class="form-control"
                
                <?php
                if(isset($_GET['rate'])){
                    echo ' value="' . $_GET['rate'] . '"';
                }       
                ?>                
                >
                <!--End of rate imput-->
            </div>

            <button type="submit">Calculate Total</button>

        </form>
        
        <?php
        //Check if the form is submitted
            if(isset($_GET['amount'])){
                //Peform the calculation
                $amount = $_GET['amount'];
                $rate = $_GET['rate'];
                $total = (($amount * $rate)/100)+$amount;
                echo '<output>£' . number_format($total,2) . '</output';
            }
        ?>
        
        
</div>
        <?php 
        include 'includes/footer.php'; 
        ?>