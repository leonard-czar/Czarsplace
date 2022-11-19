<?php
include_once "myportalhead.php";
$itemobj = new Customer();
$item = $itemobj->Getwatchidincart($_SESSION['customer_id']);
?>


<div class="container-fluid-sm">

    <div class="row  text-center">
        <div>
            <?php if (isset($_REQUEST['addcart'])) {
                if (in_array($_REQUEST['productid'], $item)) {
            ?>
                    <div class="container-fluid-sm ">
                        <div class="row  text-center" style="font-family: czars2;">
                            <div class='col-sm mt-1  p-sm-3  mb-sm-5 alert alert-danger'>Item Already In Cart </div>
                        </div>
                        <div class=' row m-2 text-center justify-content-center'>
                            <div class="col" style="font-family: czars2;">
                                <div class='m-2'><a href='dashboard.php' style='color:blue;text-decoration:underline'>Back</a>
                                </div> <span><a href='cart.php' style='color:blue;text-decoration:underline'>View cart</a></span>

                            </div>
                        </div>
                    </div> <?php
                        } elseif (isset($_REQUEST['quantity']) && !empty($_REQUEST['quantity']) && ($_REQUEST['quantity']) > 0) {
                            $cartobj = new Customer();
                            $cart = $cartobj->Insertcart($_REQUEST['quantity'], $_SESSION['customer_id'], $_REQUEST['productid'], $_REQUEST['productimg'], $_REQUEST['productprice'], ($_REQUEST['productprice'] * $_REQUEST['quantity']));
                            header("Location: response.php");
                        } else {

                            ?>
                    <div class="container-fluid-sm ">
                        <div class="row  text-center">
                            <div class='col-sm mt-1  p-sm-3  mb-sm-5 alert alert-danger' style="font-family: czars2;">Invalid Quantity Selected Please Try Again! </div>
                        </div>
                        <div class=' row m-5 text-center justify-content-center'>
                            <div class="col">
                                <div class='m-2' style="font-family: czars2;"><a href='dashboard.php' style='color:blue;text-decoration:underline'>Back</a> </div>
                            </div>
                        </div>
                    </div>
            <?php
                        }
                    }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div>
                <?php
                if (isset($_REQUEST['btnsubmit'])) {
                ?>
                    <img src="images/<?php echo $_REQUEST['productimg'] ?>" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-4 mt-sm-3">
            <h4 style="font-family: czars2;  "><?php echo $_REQUEST['productdesc'] ?></h4>
            <div style="color:rgba(0, 0, 0,0.8);" class="mb-sm-4">&#8358;<?php echo $_REQUEST['productprice'] ?></div>
            <label for="" class="mb-sm-1 ">Quantity</label>
            <form action="" method="post">
                <input type="number" name="quantity" id="quantity" value="1" class="form-control" class="mb-sm-2 ">
                <input type="hidden" value="<?php echo $_REQUEST['product_id']; ?>" name="productid">
                <input type="hidden" value="<?php echo $_REQUEST['productprice']; ?>" name="productprice">
                <input type="hidden" value="<?php echo $_REQUEST['productimg']; ?>" name="productimg">
                <input type="hidden" value="<?php echo $_REQUEST['productdesc']; ?>" name="productdesc">
                <input type="submit" name="addcart" id="addcart" style="border: 1px solid #fbd079; color:black;
                 background-color:#fbd079;font-weight:500px" value="ADD TO CART" class="btn form-control mb-sm-5 mt-sm-1">

            </form>
            <h5 style="font-family: czars2;  ">WATCH SPECIFICATIONS</h5>
            <ul style="list-style-type:square ;font-family: czars2;" class="mb-sm-5">
                <li>Brand : <?php if (isset($_REQUEST['brandname'])) {
                                echo $_REQUEST['brandname'];
                            }  ?></li>
                <li>Collection : <?php echo  $_REQUEST['Collection'] ?></li>
                <li>Reference Number : <?php echo $_REQUEST['Reference_Number'] ?></li>
                <li>Gender : <?php echo $_REQUEST['Gender'] ?></li>
                <li>Movement : <?php echo  $_REQUEST['Movement'] ?></li>
                <li>Dial : <?php echo  $_REQUEST['Dial'] ?></li>
                <li>Bezel : <?php echo $_REQUEST['Bezel'] ?></li>
                <li>Crystal : <?php echo $_REQUEST['Crystal'] ?></li>
                <li>Caliber : <?php echo  $_REQUEST['Caliber'] ?></li>
                <li>Watch Function : <?php echo  $_REQUEST['Watch_function'] ?></li>
                <li>Mechanism : <?php echo $_REQUEST['Mechanism'] ?></li>
                <li>Number of Jewels : <?php echo $_REQUEST['Number_of_Jewels'] ?></li>
                <li>Total Diameter : <?php echo $_REQUEST['Total_Diameter'] ?></li>
                <li>Power Reserve : <?php echo $_REQUEST['Power_Reserve'] ?></li>
                <li>Number of Parts : <?php echo $_REQUEST['Number_Of_Parts'] ?></li>
                <li>Frequency : <?php echo $_REQUEST['Frequency'] ?></li>
                <li>Bracelet : <?php echo $_REQUEST['bracelet'] ?></li>
                <li>Clasp : <?php echo $_REQUEST['Clasp'] ?></li>
                <li>Water Resistance : <?php echo $_REQUEST['Water_Resistance'] ?></li>

            </ul>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm text-center mb-sm-3 mt-sm-3">
        <div style="text-decoration:underline ;font-family: czars2"><a href="dashboard.php" class="text-primary">
                << Back</a>
        </div>
    </div>
</div>
<?php

                    include_once "myportalfoot.php";
                } ?>
<?php

?>