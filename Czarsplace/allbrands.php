<?php
include_once "adminheader.php";

$bobj = new Admin;
$brands = $bobj->getallbrands();
?>
<div style="font-family: czars2;">
<?php if (isset($_REQUEST['addbrand'])) {
                    $addbrand = $_REQUEST['addbrand'];
                    echo "<div class='alert alert-success mt-1 mb-2 col-sm' style='text-align:center'>$addbrand</div>";
                }if (isset($_REQUEST['rmvbrand'])) {
                    $rmvbrand = $_REQUEST['rmvbrand'];
                    echo "<div class='alert alert-success mt-1 mb-2 col-sm' style='text-align:center'>$rmvbrand</div>";
                }if (isset($_REQUEST['msg'])) {
                    $msg = $_REQUEST['msg'];
                    echo "<div class='alert alert-success mt-1 mb-2 col-sm' style='text-align:center'>$msg</div>";
                }
                ?>
                </div>
<div class="row justify-content-center mt-4">
    <div class="col-sm-10 text-center">
        <h3>Featured Brands</h3>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-10 m-3 table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark ">
                <tr>
                    <th>S/N</th>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $kanta = 1;
                foreach ($brands as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo  $kanta++ ?></td>
                        <td><img src="images/<?php echo  $value['brand_image']  ?>" alt="" width="75" class="img-fluid"></td>
                        <td><?php echo  $value['brand_id'] ?></td>
                        <td><?php echo  $value['brand_name'] ?></td>
                        <td>
                            <form action="deletebrand.php" method="post" onsubmit="validateDelete(event)">
                                <input type="hidden" name="brandid" value="<?php echo $value['brand_id']  ?>">
                                <input type="submit" class='btn btn-outline-danger btn-sm col-6 mt-sm-2 mb-sm-2' name="btndelete" value="Delete Brand">
                            </form>
                            <form action="updatebrandimg.php" method="post" class="">
                                <input type="hidden" name="brandid" value="<?php echo  $value['brand_id'] ?>">
                                <input type="submit" class='btn btn-outline-warning btn-sm  text-dark col-6' name="btnedit" value="Update Image">
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
    <a href="addbrand.php" class="btn form-control" style="background-color:#2274A5;color:white">Add Brand</a>
    </div>
</div>
<script type="text/javascript" language="javascript">
    function validateDelete(e){
        
    var response= confirm('Are you sure you want to delete this Brand?');
    if (response==true) {
        return true;
    }else{
        e.preventDefault();
        return false;
    }
}
</script>


<?php
include_once "adminfooter.php";
?>