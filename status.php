<?php include_once "adminheader.php"; ?>
<?php if (isset($_REQUEST['orderid'])) {
    $update = new Admin;
    $update->Updatestatus($_REQUEST['orderid']);
    header("Location:allpayment.php");
    exit;
}   ?>