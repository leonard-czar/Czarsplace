<?php include_once "myportalhead.php";

?>
<?php function sanitize($data)
{
    $data = trim($data);
    $data = strtolower($data);
    $data = strip_tags($data);
    return $data;
}

$delobj = new Customer();
$oobj = new Customer();
$Ordobj = new Customer();
$itemobj = new Customer();
$item = $itemobj->getcart($_SESSION['customer_id']);
$itemobj = new Customer();
$totals = $itemobj->getcarttotal($_SESSION['customer_id']);

?>

<div class="container-fluid">
    <?php


    if (empty($item)) {
        header("Location: cart.php");
        exit;
    }
    if (isset($_REQUEST['continue'])) {
        if (isset($_REQUEST['continue']) && !empty(sanitize($_REQUEST['Address']))) {
            $sum = array_sum($totals);
            $id = rand();
            $Ordobj->insertOrders($id, $_SESSION['customer_id'], $sum, (sanitize($_REQUEST['Address'])), $_REQUEST['altphone']);

            foreach ($item as $key => $value) {
                $oobj->insertOrders_details($id, $value['watchid'], $value['qty'], $value['price'], $value['total']);
            }

            $order = "CZP" . $id;
            $sum;
            $delobj->Deletecart($_SESSION['customer_id']);
            header("Location: orderconfirm.php?order=$order&total=$sum;");
            exit;
        } else {
            echo  "<div class='row m-1 text-center justify-content-center '>
        <h6 class='col-6 text-danger mt-1' style='font-family: czars2;'> Delivery address is required! </h6>
    </div>";
        }
    }

    ?>
    <?php if (isset($_REQUEST['checkout']) || !empty($_REQUEST['alltotal']) || !empty($item)) { ?>
        <div class="row text-center justify-content-center mt-1">
            <h2>DELIVERY DETAILS </h2>
        </div>

        <div class="row text-center justify-content-center mb-5 mt-3">
            <div class="col-sm-10">
                <form action="" method="post">

                    <input type="text" name="Address" value="" placeholder="Enter Delivery Address" class="form-control text-center">
                    <input type="number" name="altphone" value="" placeholder="Alternative Phonenumber (optional) " class="form-control text-center mt-2 col-6">
                    <input type="submit" name="continue" value="Continue" class="btn btn-outline-primary mt-3">
                    <input type="hidden" name="totalorders" value="<?php if (isset($_REQUEST['alltotal'])) {
                                                                        echo $_REQUEST['alltotal'];
                                                                    }  ?>">
                </form>
            </div>
        </div>
</div>
<?php  } else {
    } ?>

<?php
include_once "myportalfoot.php";
?>