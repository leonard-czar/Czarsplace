<?php include_once "adminheader.php";
$imgobj=new Admin();
if (isset($_REQUEST['updateimg'])) {
    $img=$imgobj->Updateproductimage($_FILES['image']['name'],$_REQUEST["watch_id"]);
    $msg="image updated successfully!";
  header("Location: allproducts.php?info=$msg");
}
?>

<div class="container">

    <div class="row text-center justify-content-center m-5">
        <h3>Update Image</h3>
        <div class="col-sm-6 mt-2">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="image" value="Image" class="form-control">
                <input type="hidden" name="watch_id" value="<?php if (isset($_REQUEST['watchid'])) {
                    echo $_REQUEST['watchid'];
                }?>">
                <div class="mt-sm-3"><input type="submit" name="updateimg" id="" class="btn btn-primary form-control" value="Save"></div>
            </form>
        </div>
    </div>
</div>

<?php include_once "adminfooter.php";
?>