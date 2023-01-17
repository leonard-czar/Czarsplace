<?php
session_start();

if (isset($_REQUEST['order']) && isset($_REQUEST['total']) && isset($_REQUEST['email'])) {

    include_once "functions/payment.php";
    $payobj= new Payment;

    
    $amount=$_REQUEST['total'];
    $reference= $_REQUEST['order'];

    $insert_trans=$payobj->insertTransaction($reference,$amount);

    if ($insert_trans== true) {
        $output=$payobj->initpaystackTransaction($amount,$reference,$_SESSION['email']);
        

        $redirect = $output->data->authorization_url;
        if (!empty($redirect)) {
           header("Location: $redirect");
           exit;
        }
        
    }else {
        return ("Oops, something happened".$result->message);
        
    }

}

?>