<?php include_once "adminheader.php";
?>

<?php
$obj = new Admin;
$brands = $obj->getallbrands();


    if (isset($_REQUEST['editproduct'])) {
        # code...
    
        $pobj = new Admin;

$product = $pobj->Editproduct(
    
$_REQUEST["watch_name"],
 $_REQUEST["watch_desc"],
 $_REQUEST["watch_price"],
 $_REQUEST["collection"],
 $_REQUEST["ref_no"],
 $_REQUEST["Case_desc"],
 $_REQUEST["gender_"],
 $_REQUEST["movement"],
 $_REQUEST["dial"],
$_REQUEST["bezel"],
$_REQUEST["crystal"],
 $_REQUEST["caliber"],
 $_REQUEST["watch_function"],
 $_REQUEST["mechanism"],
$_REQUEST["number_of_jewels"],
 $_REQUEST["total_diameter"],
 $_REQUEST["power_reserve"],
 $_REQUEST["number_of_parts"],
$_REQUEST["frequency"],
$_REQUEST["bracelet"],
$_REQUEST["clasp"],
 $_REQUEST["water_resistance"],
 $_REQUEST["watch_id"]

);
$edit="Change(s) Saved!";
header("Location: allproducts.php?edit=$edit");
}

?>
<div class="container">

    <div class="row text-center justify-content-center m-5">
        <h3>Edit Product</h3>
        <div class="col-sm-6">
            <form action="" method="post" enctype="multipart/form-data">
             <div class="m-sm-3"> Watch Name <textarea name="watch_name" id="" placeholder="" class="form-control" require><?php if (isset($_REQUEST['watch_name'])) {
                    echo $_REQUEST['watch_name'];
                }?></textarea> </div>
                <div class="m-sm-3">Watch Description<textarea name="watch_desc" id=""  placeholder="" class="form-control"><?php if (isset($_REQUEST['watch_desc'])) {
                    echo $_REQUEST['watch_desc'];
                }?></textarea></div>
                <div class="m-sm-3">Watch price<input type="number" name="watch_price" value="<?php if (isset($_REQUEST['watch_price'])) {
                    echo $_REQUEST['watch_price'];
                }?>" placeholder="" class="form-control" required></div>
                <div class="m-sm-3">Collection<input type="text" name="collection" value="<?php if (isset($_REQUEST['collection'])) {
                    echo $_REQUEST['collection'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Reference Number<input type="text" name="ref_no" value="<?php if (isset($_REQUEST['reference_number'])) {
                    echo $_REQUEST['reference_number'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Case Description<textarea name="Case_desc" id="" placeholder="" class="form-control"><?php if (isset($_REQUEST['case_description'])) {
                    echo $_REQUEST['case_description'];
                }?></textarea></div>
                <div class="m-sm-3">Gender
                    <select name="gender_" id="" class="form-control">                       
                        <?php if (isset($_REQUEST['Gender'])) {
                            $gen=$_REQUEST['Gender'];
                    echo "<option value='$gen' selected> $gen </option>";
                }if ($_REQUEST['Gender']=='Men') {
                    echo "<option value='Ladies'>Ladies</option>";
                }elseif(empty($_REQUEST['Gender'])) {                    
                    echo "<option value='Men'>Men</option>";
                    echo "<option value='Ladies'>Ladies</option>";
                }                      
                         ?>
                         
                    </select></div>
                <div class="m-sm-3">Movement<input type="text" name="movement" value="<?php if (isset($_REQUEST['movement'])) {
                    echo $_REQUEST['movement'];
                }?>"  class="form-control"></div>
                <div class="m-sm-3">Dial<textarea name="dial" id=""  placeholder="" class="form-control"><?php if (isset($_REQUEST['dial'])) {
                    echo $_REQUEST['dial'];
                }?></textarea></div>
                <div class="m-sm-3">Bezel<input type="text" name="bezel" value="<?php if (isset($_REQUEST['bezel'])) {
                    echo $_REQUEST['bezel'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Crystal<textarea name="crystal" id="" placeholder="" class="form-control"><?php if (isset($_REQUEST['crystal'])) {
                    echo $_REQUEST['crystal'];
                }?></textarea></div>
                <div class="m-sm-3">Caliber<input type="text" name="caliber" value="<?php if (isset($_REQUEST['caliber'])) {
                    echo $_REQUEST['caliber'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Watch Function<input type="text" name="watch_function" value="<?php if (isset($_REQUEST['watch_function'])) {
                    echo $_REQUEST['watch_function'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Mechanism<input type="text" name="mechanism" value="<?php if (isset($_REQUEST['mechanism'])) {
                    echo $_REQUEST['mechanism'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Number Of Jewels<input type="text" name="number_of_jewels" value="<?php if (isset($_REQUEST['number_of_jewels'])) {
                    echo $_REQUEST['number_of_jewels'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Total Diameter<input type="text" name="total_diameter" value="<?php if (isset($_REQUEST['total_diameter'])) {
                    echo $_REQUEST['total_diameter'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Power Reserve<input type="text" name="power_reserve" value="<?php if (isset($_REQUEST['power_reserve'])) {
                    echo $_REQUEST['power_reserve'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Number Of Parts<input type="text" name="number_of_parts" value="<?php if (isset($_REQUEST['number_of_parts'])) {
                    echo $_REQUEST['number_of_parts'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Frequency<input type="text" name="frequency" value="<?php if (isset($_REQUEST['frequency'])) {
                    echo $_REQUEST['frequency'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Bracelet<input type="text" name="bracelet" value="<?php if (isset($_REQUEST['bracelet'])) {
                    echo $_REQUEST['bracelet'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Clasp<input type="text" name="clasp" value="<?php if (isset($_REQUEST['clasp'])) {
                    echo $_REQUEST['clasp'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3">Water Resistance<input type="text" name="water_resistance" value="<?php if (isset($_REQUEST['water_resistance'])) {
                    echo $_REQUEST['water_resistance'];
                }?>" placeholder="" class="form-control"></div>
                <div class="m-sm-3"><input type="hidden" name="watch_id" value="<?php if (isset($_REQUEST['watch_id'])) {
                    echo $_REQUEST['watch_id'];
                }?>"></div>
                <div class="m-sm-3"><input type="submit" name="editproduct" id="" class="btn btn-primary form-control" value="Save changes"></div>
            </form>
        </div>
    </div>
</div>

<?php include_once "adminfooter.php"; ?>