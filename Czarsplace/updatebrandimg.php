<?php include_once "adminheader.php";
$imgobj=new Admin();
if (isset($_REQUEST['updateimg'])) {
    $img=$imgobj->Updatebrandimg($_FILES['image']['name'],$_REQUEST["brandid"]);
    $msg="Image Updated Successfully!";
  header("Location: allbrands.php?msg=$msg");
}
?>

<div class="container">

    <div class="row text-center justify-content-center m-5">
        <h3>Update Image</h3>
        <div class="col-sm-6 mt-2">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="image" value="Image" class="form-control">
                <input type="hidden" name="brandid" value="<?php if (isset($_REQUEST['brandid'])) {
                    echo $_REQUEST['brandid'];
                }?>">
                <div class="mt-sm-3"><input type="submit" name="updateimg" id="" class="btn btn-primary form-control" value="Save"></div>
            </form>
        </div>
    </div>
</div>

<?php include_once "adminfooter.php";
?>