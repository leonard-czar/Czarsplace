<?php include_once "adminheader.php";
$imgobj = new Admin();
if (isset($_REQUEST['updateimg'])) {

    $filename = $_FILES['image']['name'];
    $filesize = $_FILES['image']['size'];
    $tmpname = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    $filetype = $_FILES['image']['type'];

    if ($error > 0) {
        echo "you have not uploaded any file or the file is corrupt";
        exit;
    }
    if ($filesize > 9097152) {
        echo "Profile photo cannot be more than 9mb";
        exit;
    }
    $allowed_ext = ["png", "jpg", "gif", "jpeg"];

    $arrfilename = explode(".", $filename);

    $file_ext = end($arrfilename);

    $file_ext = strtolower($file_ext);

    if (!in_array($file_ext, $allowed_ext)) {
        echo "Oops, file not supported!";
        exit;
    }


    $img = $imgobj->Updateproductimage($file_ext, $_REQUEST["watch_id"]);
    if ($img == true) {
        $msg = "image updated successfully!";
        header("Location: allproducts.php?info=$msg");
    }
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
                                                            } ?>">
                <div class="mt-sm-3"><input type="submit" name="updateimg" id="" class="btn btn-primary form-control" value="Save"></div>
            </form>
        </div>
    </div>
</div>

<?php include_once "adminfooter.php";
?>