<?php
include_once "functions/admin.php";


if (isset($_REQUEST['btndelete'])) {
   $delobj=new Admin();
$delobj->Deletebrand($_REQUEST['brandid']);
$rmvbrand="Brand Deleted Successfully!";
 header("Location: allbrands.php?rmvbrand=$rmvbrand");
exit;
}
