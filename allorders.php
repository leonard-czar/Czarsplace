<?php
include_once "adminheader.php";

$coobj = new Admin;
$orders = $coobj->Getallcustomersorder();

?>
<?php
if (!empty($orders)) {


?>
    <div class="row justify-content-center mt-4">
        <div class="col-sm-10 text-center">
            <h3>All Orders</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-10 mb-sm-4 mt-sm-3 table-responsive">
            <table class="table table-hover table-striped " id="my_table">
                <thead class="table-dark ">
                    <tr>
                        <th>S/N</th>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Order Status</th>
                        <th>Total Amount</th>
                        <th>Shipping Address</th>
                        <th>Alt Phonumber</th>
                        <th>Order Date</th>
                        <th>Action</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kanta = 1;
                    foreach ($orders as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo  $kanta++ ?></td>
                            <td><?php echo  "CZP" . $value['orders_id'] ?></td>
                            <td><?php echo  $value['customer_id'] ?></td>
                            <td><?php echo  $value['payment_status'] ?></td>
                            <td><?php echo  $value['amount'] ?></td>
                            <td><?php echo  $value['shipping_address'] ?></td>
                            <td><?php echo  $value['alt_phonenumber'] ?></td>
                            <td><?php echo date('jS M Y h:i:s a', strtotime($value['order_date'])); ?></td>
                            <td>

                            </td>
                            <td>
                                <form action="orderdetails.php" method="post">
                                    <input type="hidden" name="orderid" value="<?php echo  $value['orders_id'] ?>">
                                    <input type="submit" name="" value="Details" class="btn btn-primary btn-sm">
                                </form>
                            </td>


                        </tr>
                    <?php

                    } ?>


                </tbody>
            </table>
        </div>
    </div>
<?php
} else {
?>
    <div class="row justify-content-center">
        <div class="col-sm alert alert-warning text-center">
            <h3>No Orders Yet</h3>
        </div>
    </div>

<?php
}

?>


<?php
include_once "adminfooter.php";
?>