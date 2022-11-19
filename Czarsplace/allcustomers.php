<?php
include_once "adminheader.php";

$coobj = new Admin;
$cust = $coobj->Getallcustomers()
?>
<?php
if (!empty($cust)) {


?>
<div class="row justify-content-center mt-4">
    <div class="col-sm-10 text-center">
        <h3>Customers Information</h3>
    </div>
</div>
    <div class="row justify-content-center">
        <div class="col-sm-10 mb-sm-2 mt-sm-3 table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark ">
                    <tr>
                        <th>S/N</th>
                        <th>Customer ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email Address</th>
                        <th>Phonumber</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Address2</th>
                        <th>Registration date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kanta = 1;
                    foreach ($cust as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo  $kanta++ ?></td>
                            <td><?php echo  $value['customer_id'] ?></td>
                            <td><?php echo  $value['customer_firstname'] ?></td>
                            <td><?php echo  $value['customer_lastname'] ?></td>
                            <td><?php echo  $value['customer_email'] ?></td>
                            <td><?php echo  $value['customer_phonenumber'] ?></td>                            
                            <td><?php echo  $value['gender'] ?></td>
                            <td><?php echo  $value['customer_address'] ?></td>
                            <td><?php echo  $value['customer_address2'] ?></td>
                            <td><?php echo  $value['customer_regdate'] ?></td>


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
<?php
}

?>


<?php
include_once "adminfooter.php";
?>