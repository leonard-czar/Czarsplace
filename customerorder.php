<?php include_once "myportalhead.php" ?>;
<?php
?>
<?php
$coobj = new Customer();
$custobj = new Customer();
$orders = $coobj->Getcustomerorder($_SESSION['customer_id']);
if (isset($_REQUEST['status'])) {
?>

<div class="alert alert-success alert-dismissible fade show text-center " role="alert">

<strong><?php echo $_REQUEST['status'] ?></strong>

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" aria-hidden="true"></button>

</div>
<?php
}
foreach ($orders as $key => $value) {
    $kanta = 1;
    $cust = $custobj->Get_customer_order($value['orders_id']); ?>
    <?php ?>
    <div class="row justify-content-center text-center alert alert-primary">
        <div class="col-sm-10 text-dark ">
            <?php echo " <b>ORDER ID </b>: CZP" . $value['orders_id'] . " | ";
            echo "<b>ORDER STATUS </b>: "; ?> <?php if ($value['payment_status'] == "paid") {
                                                    echo " <span class='text-success'><b>" . $value['payment_status'] . "</b> </span> | ";
                                                } else {
                                                    echo " <span class='text-danger'> " . $value['payment_status'] . " </span> | ";
                                                }
                                                echo "<b>ORDER DATE </b>:  " . date('jS M Y', strtotime($value['datepaid'])) . " | ";
                                                echo "<b>ORDER TOTAL </b>:  " . $value['amount']; ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-10 mb-sm-5 mt-sm-2 table-responsive">

            <table class="table table-hover table-striped">
                <thead class="table-dark ">
                    <tr>
                        <th>S/N</th>
                        <th></th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kanta = 1;
                    foreach ($cust as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo  $kanta++ ?></td>
                            <td><img src="images/<?php echo  $value['watch_image'] ?>" alt="" width="45" class="img-fluid"> </td>
                            <td><?php echo  $value['qty'] ?></td>
                            <td><?php echo  $value['unit_price'] ?></td>
                        </tr>
                    <?php

                    } ?>

                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
<?php include_once "myportalfoot.php" ?>