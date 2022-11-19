<?php
include_once "functions/mydbfunctions.php";

if (isset($_REQUEST['btndelete'])) {   
   $obj=new Customer();
$obj->Deletecartitem($_REQUEST['cartid']);
header("Location: cart.php");
exit;
}
if (isset($_REQUEST['deleteall'])) {
   $delobj=new Customer();
$delobj->Deletecart($_REQUEST['custid']);
 header("Location: cart.php");
exit;
}

var_dump($_REQUEST);
?>