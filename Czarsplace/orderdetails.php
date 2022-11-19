<?php include_once "adminheader.php"; ?>

<div class="row justify-content-center mt-4">
    <div class="col-sm-10 text-center">
        <h3>Order Details</h3>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-10 mb-sm-2 mt-sm-2 table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark ">
                <tr>
                    <th>S/N</th>
                    <th>Detail ID</th>
                    <th>Product ID</th>                    
                    <th>Quantity</th>
                    <th>Unit Price</th> 
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $coobj = new Admin;
                $orders = $coobj->Getorderdetails($_REQUEST['orderid']);
                $kanta = 1;
                foreach ($orders as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo  $kanta++ ?></td>
                        <td><?php echo  $value['detail_id'] ?></td>
                        <td><?php echo  $value['watch_id'] ?></td>                                           
                        <td><?php echo  $value['qty'] ?></td> 
                        <td><?php echo  $value['unit_price'] ?></td>
                        <td><?php echo  $value['total'] ?></td>
                    </tr>
                <?php

                } ?>


            </tbody>
        </table>
    </div>
    <div class="text-center mb-3" style="text-decoration:underline"><a href="allorders.php" class="text-primary">Back</a></div>
</div>
<?php include_once "adminfooter.php"; ?>
