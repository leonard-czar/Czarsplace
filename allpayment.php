<?php
include_once "adminheader.php";

$pay = new Admin;
$payment = $pay->Getallpayment();

?>
<?php
if (!empty($payment)) {


?>
    <div class="row justify-content-center mt-4">
        <div class="col-sm-10 text-center">
            <h3>All Payment</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-10 mb-sm-4 mt-sm-3 table-responsive">
            <table class="table table-hover table-striped " id="my_table">
                <thead class="table-dark ">
                    <tr>
                        <th>S/N</th>
                        <th>Order ID</th>
                        <th>Payment Status</th>
                        <th>Amount Paid</th>
                        <th>Mode of Payment</th>
                        <th>Date Paid</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kanta = 1;
                    foreach ($payment as $key => $value) {
                    ?>
                        <tr class="m-sm-3">
                            <td><?php echo  $kanta++ ?></td>
                            <td><?php echo  "CZP" . $value['orderid'] ?></td>
                            <td><?php echo  $value['payment_status'] ?></td>
                            <td><?php echo  $value['amount'] ?></td>
                            <td><?php echo  $value['paymentmode'] ?></td>
                            <td><?php echo date('jS M Y h:i:s a', strtotime($value['datepaid'])); ?></td>
                            <td>
                                <form action="status.php" method="post" onclick="Updatestatus(event)">
                                    <?php ?>
                                    <input type="hidden" name="orderid" value="<?php echo  $value['orderid']  ?>">
                                    <input type="submit" name="update" value="Update status" class="btn btn-outline-success" <?php if ($value['payment_status'] == "paid") {
                                                                                                                                    echo "hidden";
                                                                                                                                } else {
                                                                                                                                }  ?>>
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
            <h3>No Payment Made</h3>
        </div>
    </div>

<?php
}

?>


<?php
include_once "adminfooter.php";
?>