<?php
include_once "myportalhead.php";

?>
<?php
if (isset($_REQUEST['savechange'])) {

    if ($_REQUEST['quantity'] > 0 && !empty($_REQUEST['quantity'])) {
        $itemobj->editcart($_REQUEST['quantity'], ($_REQUEST['quantity'] * $_REQUEST['newprice']), $_REQUEST['cart_id']);
        $yes = "Item Updated Successfully!";
        header("Location: cart.php?yes=$yes");
    } else {
        $no = "Error! Quantity Cannot be Less Than 1, Please Try Again.";
        header("Location: cart.php?no=$no");
    }
}
?>

<div class="container">
    <?php  ?>
    <div class="row justify-content-center text-center">
        <div class="col-10">
            <div class="mt-2 mb-5">

                <h4 class="text-success"> Edit Item Quanity</h4>
            </div>
            <table class="table">
                <thead>
                    <tr>

                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="" method="post">

                            <td><input type="number" name="quantity" value="<?php if (isset($_REQUEST['cartqty'])) {
                                                                                echo $_REQUEST['cartqty'];
                                                                            } ?>"> </td>
                            <td>
                                <input type="hidden" class="btn btn-primary btn-sm" name="cart_id" value="<?php if (isset($_REQUEST['cartid'])) {
                                                                                                                echo $_REQUEST['cartid'];
                                                                                                            } ?>">
                                <input type="hidden" class="btn btn-primary btn-sm" name="newprice" value="<?php if (isset($_REQUEST['price'])) {
                                                                                                                echo $_REQUEST['price'];
                                                                                                            } ?>">

                                <input type="submit" class="btn btn-primary btn-sm" name="savechange" value="Save changes">
                            </td>
                        </form>
                    </tr>
                    <?php


                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include_once "myportalfoot.php";

?>