<?php 
include_once "myportalhead.php";
?>
<div class="container">
    <div class="row text-center justify-content-center mt-2 ">
   
            <h3 class="alert alert-success " style="font-family: czars2;"> <?php   echo $_SESSION['fname'];  echo $_SESSION['lname']; ?>, Your order has been placed Successfully!</h3>
        <div class="col-sm-12  text-center p-5  alert-warning">
            <p>To validate your order please make a transfer to the below account with your ORDER ID as description</p>
            <div><b>ORDER ID</b> : <?php if (isset($_REQUEST['order'])) {
                echo $_REQUEST['order'];
                  
                }  ?></div>
            <div><b>Amount</b> : <?php if (isset($_REQUEST['total'])) {
                    echo  $_REQUEST['total'];
                    
                } ?></div>
            <div><b>Account Name</b> : LEBECHI UCHE LEONARD</div>
            <div><b>Account no</b> : 0250699161</div>
            <div><b>Bank</b> : GTB</div>
            <div>Delivery will be made within 48hours of payment comfirmation. Thank you for your patronage!</div>
        </div>
        
        <div class="m-1" style="font-family: czars2;"><a href="dashboard.php" style='color:blue;text-decoration:underline'>Home</a></div>
    </div>
</div>
<?php 
include_once "myportalfoot.php";
?>