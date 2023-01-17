<?php
if (isset($_REQUEST['reference'])) {
    
include_once "functions/payment.php";

$objpay= new Payment;
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