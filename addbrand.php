<?php include_once "adminheader.php";
?>

<?php
if (isset($_REQUEST['btnaddbrand'])) {

    if (!empty($_REQUEST['brand_name'])) {
        $filename= $_FILES['brandimage']['name'];
    $filesize= $_FILES['brandimage']['size'];
    $tmpname= $_FILES['brandimage']['tmp_name'];
    $error= $_FILES['brandimage']['error'];
    $filetype= $_FILES['brandimage']['type'];
    
    if ($error > 0) {
        echo "you have not uploaded any file or the file is corrupt";
        exit;
    }
    if ($filesize >9097152) {
        echo "Profile photo cannot be more than 9mb";
        exit;
    }
    $allowed_ext=["png","jpg","gif","jpeg"];
    
    $arrfilename= explode(".",$filename);
    
    $file_ext= end($arrfilename);
    
    $file_ext = strtolower($file_ext);
    
    if (!in_array($file_ext, $allowed_ext)) {
        echo "Oops, file not supported!";
        exit;
    }
    

        $obj = new Admin;
        $brand = $obj->Insertbrand($_REQUEST['brand_name'], $file_ext);
        
        if ($brand=='success') {
            $addbrand = "Brand added Successfully!";            
        header("Location: allbrands.php?addbrand=$addbrand");
        }
        exit;
    } else {
        echo "<div class='text-danger text-center m-1'>Please enter a valid brandname!</div>";
    }
}

?>
<div class="container">

    <div class="row text-center justify-content-center m-2 mb-5">
        <h3>Add a Brand</h3>
        <div class="col-sm-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="m-sm-3"><input type="text" name="brand_name" placeholder="Brand Name" class="form-control"></div>
                <div class="m-sm-3"><input type="file" name="brandimage" placeholder="Brand Image" class="form-control" required></div>

                <div class="m-sm-3"><input type="submit" name="btnaddbrand" id="" class="btn btn-primary form-control" value="Add Brand"></div>
            </form>
        </div>
    </div>
</div>

<?php include_once "adminfooter.php"; ?>