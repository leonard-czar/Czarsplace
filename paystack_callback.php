<?php
var_dump($_REQUEST);
if (isset($_REQUEST['reference'])) {
    

//add payment class
include_once "functions/payment.php";

$objpay= new Payment;
// access verifypaystacktransaction
$result=$objpay->verifypaystackTrans($_GET['reference']);

if ($result->data->status== "success") {
    $reference=$_GET['reference'];
    
    $output=$objpay->updateTransaction($reference);
    if ($output==true) {
        $status="Payment was successful!";
        header("Location: customerorder.php?status=$status");
        
    }
}else {
    die("Oops, something happened".$result->message);
}


}
?>