<?php
$admin = "Admin Login";
include_once "indexheader.php";
?>

<?php
if (isset($_REQUEST['btnadmin'])) {
    $errors = [];

    if (empty($_REQUEST['admin_name'])) {
        $errors['email'] = "username field is required!";
    }
    if (empty($_REQUEST['admin_pwd'])) {
        $errors['pwd'] = "password field is required!";
    }
    if (empty($errors)) {
        include_once "functions/admin.php";

        $obj = new Admin();

        $output = $obj->Adminlogin($_REQUEST['admin_name'], $_REQUEST['admin_pwd']);
        if ($output == false) {
            $errors['invalid'] = "Invalid Username or Password!";
        } else {

            header("location: admindashboard.php");
        }
    }
}

?>


<div class="container-fluid-sm">

    <div class="row  " style="justify-content: center;">
        <div class="col-sm-5 m-sm-5 shadow p-sm-4 bg-body rounded">
            <div>

                <h3 class="m-3" style="font-family: czars; text-align:center">Admin
                </h3>

                <?php if (isset($_REQUEST['msg'])) {
                    $msg = $_REQUEST['msg'];
                    echo "<div class='text-danger' style='text-align:center'>$msg</div>";
                }
                ?>

                <form method="post" action="" id="" class="">
                    <?php
                    if (!empty($errors['invalid'])) {
                        echo "<div style='color:red;text-align:center'>" . $errors['invalid'] . "</div>";
                    }
                    ?>

                    <input type="text" name="admin_name" id="Email" class="form-control mt-sm-3" placeholder="Username">
                    <?php
                    if (!empty($errors['email'])) {
                        echo "<div style='color:red;text-align:center'>" . $errors['email'] . "</div>";
                    }
                    ?>

                    <input type="password" name="admin_pwd" id="Password" class="form-control mt-sm-3" placeholder="Password">
                    <?php
                    if (!empty($errors['pwd'])) {
                        echo "<div style='color:red;text-align:center'>" . $errors['pwd'] . "</div>";
                    }
                    ?>

                    <p>
                        <input type="submit" value="Sign In" class="btn form-control mb-3 mt-3" name="btnadmin" style="background-color: #fbd079;color:white">
                    </p>

                </form>
            </div>

        </div>
    </div>
</div>

<?php
include_once "indexfooter.php";
?>