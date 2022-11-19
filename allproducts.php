<?php
include_once "adminheader.php";


$obj = new Admin;
$products = $obj->Getallproduct();



?>
<div class="container-fluid-sm">
    <div style="font-family: czars2;">
        <?php if (isset($_REQUEST['info'])) {
            $msg = $_REQUEST['info'];
            echo "<div class='alert alert-success mt-1  mb-2 col-sm' style='text-align:center'>$msg</div>";
        }
        if (isset($_REQUEST['delete'])) {
            $delete = $_REQUEST['delete'];
            echo "<div class='alert alert-success mt-1  mb-2 col-sm' style='text-align:center'>$delete</div>";
        }
        if (isset($_REQUEST['add'])) {
            $add = $_REQUEST['add'];
            echo "<div class='alert alert-success mt-1 mb-2 col-sm' style='text-align:center'>$add</div>";
        }
        ?>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-sm-10 text-center">

            <h3>All Products</h3>
        </div>
    </div>
    <div class="row m-sm-3">
        <div class="col-sm mb-sm-2 mt-sm-2 table-responsive">
            <table class="table table-hover table-striped col-sm table-responsive" style="font-size:1.2vw ;">
                <thead class="table-dark col-sm">
                    <tr>
                        <th>S/N</th>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Product Desc</th>
                        <th>Collection</th>
                        <th>Reference Number</th>
                        <th>Case Desc</th>
                        <th>Gender</th>
                        <th>Movement</th>
                        <th>Dial</th>
                        <th>Bezel</th>
                        <th>Crystal </th>
                        <th>Caliber</th>
                        <th>Watch Function</th>
                        <th>Mechanism</th>
                        <th>Number Of Jewels</th>
                        <th>Total Diameter</th>
                        <th>Power Reserve</th>
                        <th>Number Of Parts</th>
                        <th>Frequency</th>
                        <th>Bracelet</th>
                        <th>Clasp</th>
                        <th>Water Resistance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="col-lg-4">
                    <?php
                    $kanta = 1;
                    foreach ($products as $key => $value) {
                    ?>
                        <tr class="col-lg-4">
                            <td><?php echo  $kanta++ ?></td>
                            <td><img src="images/<?php echo  $value['watch_image']  ?>" alt="" width="45" class="img-fluid"></td>
                            <td><?php echo  $value['watch_id'] ?></td>
                            <td><?php echo  $value['watch_Name'] ?></td>
                            <td><?php echo  $value['brand_name'] ?></td>
                            <td>&#8358;<?php echo  $value['watch_price'] ?></td>
                            <td><?php echo  $value['watch_description'] ?></td>
                            <td><?php echo  $value['collection'] ?></td>
                            <td><?php echo  $value['reference_number'] ?></td>
                            <td><?php echo  $value['case_description'] ?></td>
                            <td><?php echo  $value['gender'] ?></td>
                            <td><?php echo  $value['movement'] ?></td>
                            <td><?php echo  $value['dial'] ?></td>
                            <td><?php echo  $value['Bezel'] ?></td>
                            <td><?php echo  $value['crystal'] ?></td>
                            <td><?php echo  $value['caliber'] ?></td>
                            <td><?php echo  $value['watch_function'] ?></td>
                            <td><?php echo  $value['mechanism'] ?></td>
                            <td><?php echo  $value['number_of_jewels'] ?></td>
                            <td><?php echo  $value['total_diameter'] ?></td>
                            <td><?php echo  $value['power_reserve'] ?></td>
                            <td><?php echo  $value['number_of_parts'] ?></td>
                            <td><?php echo  $value['frequency'] ?></td>
                            <td><?php echo  $value['bracelet'] ?></td>
                            <td><?php echo  $value['clasp'] ?></td>
                            <td><?php echo  $value['water_resistance'] ?></td>
                            <td>
                                <form action="deleteproduct.php" method="post" onsubmit="Deleteproduct(event)">
                                    <input type="hidden" name="watchid" value="<?php echo  $value['watch_id']  ?>">
                                    <input type="submit" class='btn btn-outline-danger btn-sm  col-12' name="btndelete" value="Delete">
                                </form>
                                <form action="editproduct.php" method="post">
                                    <input type="hidden" name="watch_image" value="<?php echo  $value['watch_image']  ?> ">
                                    <input type="hidden" name="watch_id" value="<?php echo  $value['watch_id'] ?>">
                                    <input type="hidden" name="watch_name" value="<?php echo  $value['watch_Name'] ?>">
                                    <input type="hidden" name="watch_price" value="<?php echo  $value['watch_price'] ?>">
                                    <input type="hidden" name="watch_desc" value="<?php echo  $value['watch_description'] ?>">
                                    <input type="hidden" name="collection" value="<?php echo  $value['collection'] ?>">
                                    <input type="hidden" name="reference_number" value="<?php echo  $value['reference_number'] ?>">
                                    <input type="hidden" name="case_description" value="<?php echo  $value['case_description'] ?>">
                                    <input type="hidden" name="Gender" value="<?php echo  $value['gender'] ?>">
                                    <input type="hidden" name="movement" value="<?php echo  $value['movement'] ?>">
                                    <input type="hidden" name="dial" value="<?php echo  $value['dial'] ?>">
                                    <input type="hidden" name="bezel" value="<?php echo  $value['Bezel'] ?>">
                                    <input type="hidden" name="crystal" value="<?php echo  $value['crystal'] ?>">
                                    <input type="hidden" name="caliber" value="<?php echo  $value['caliber'] ?>">
                                    <input type="hidden" name="watch_function" value="<?php echo  $value['watch_function'] ?>">
                                    <input type="hidden" name="mechanism" value="<?php echo  $value['mechanism'] ?>">
                                    <input type="hidden" name="number_of_jewels" value="<?php echo  $value['number_of_jewels'] ?>">
                                    <input type="hidden" name="total_diameter" value="<?php echo  $value['total_diameter'] ?>">
                                    <input type="hidden" name="power_reserve" value="<?php echo  $value['power_reserve'] ?>">
                                    <input type="hidden" name="number_of_parts" value="<?php echo  $value['number_of_parts'] ?>">
                                    <input type="hidden" name="frequency" value="<?php echo  $value['frequency'] ?>">
                                    <input type="hidden" name="bracelet" value="<?php echo  $value['bracelet'] ?>">
                                    <input type="hidden" name="clasp" value="<?php echo  $value['clasp'] ?>">
                                    <input type="hidden" name="water_resistance" value="<?php echo  $value['water_resistance'] ?>">


                                    <input type="submit" class='btn btn-outline-primary btn-sm mt-sm-2 mb-sm-2 col-12 ' name="btnedit" value="Edit">
                                </form>
                                <form action="updateproductimg.php" method="post">
                                    <input type="hidden" name="watchid" value="<?php echo  $value['watch_id']  ?>">
                                    <input type="submit" class='btn btn-outline-warning btn-sm  col-12' name="btnupdate" value="Update image">

                                </form>
                            </td>


                        </tr>
                    <?php

                    } ?>


                </tbody>
            </table>
        </div>
    </div>
    <div class="row m-sm-5 justify-content-center">
        <div class="col-sm-6 ">
            <a href="addproduct.php" class="btn btn-primary form-control">Add Product</a>
        </div>
    </div>
</div>


<?php
include_once "adminfooter.php";
?>