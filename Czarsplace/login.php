<?php
$login = " Login";
include_once "indexheader.php";
?>

<?php
if (isset($_REQUEST['btnsignin'])) {
    $errors = [];

    if (empty($_REQUEST['customer_email'])) {
        $errors['email'] = "Email field is required!";
    }
    if (empty($_REQUEST['customer_password'])) {
        $errors['pwd'] = "password field is required!";
    }
    if (empty($errors)) {
        include_once "functions/mydbfunctions.php";

        $obj = new Customer();

        $output = $obj->login($_REQUEST['customer_email'], $_REQUEST['customer_password']);
        if ($output == false) {
            $errors['invalid'] = "Incorrect Email or Password!";
        } else {

            header("location: dashboard.php");
        }
    }
}

?>


<div class="container-fluid-sm">

    <?php
    echo "<div class='justify-content-center' style='display:flex'>";
    if (isset($_REQUEST['buynow'])) {
        echo "<div class=' col-sm-5 mt-sm-5 mb-sm-2 alert alert-info text-center'><h3>Please login to start shopping!</h4>
                </div>";
    }
    echo "</div>";
    ?>
    <div class="row  " style="justify-content: center;">
        <div class="col-sm-5 m-sm-5 shadow p-sm-4 bg-body rounded">
            <div>

                <h3 class="m-3" style="font-family: czars; text-align:center">Login
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

                    <input type="email" name="customer_email" id="Email" class="form-control mt-sm-3" placeholder="Email">
                    <?php
                    if (!empty($errors['email'])) {
                        echo "<div style='color:red;text-align:center'>" . $errors['email'] . "</div>";
                    }
                    ?>

                    <input type="password" name="customer_password" id="Password" class="form-control mt-sm-3" placeholder="Password">
                    <?php
                    if (!empty($errors['pwd'])) {
                        echo "<div style='color:red;text-align:center'>" . $errors['pwd'] . "</div>";
                    }
                    ?>

                    <p>
                        <input type="submit" value="Sign In" class="btn form-control mb-3 mt-3" name="btnsignin" style="background-color: #fbd079;color:white">
                    </p>

                    <p style="text-align:center; padding-left:15px; ">
                        Dont have an account? <a href="signup.php" style="text-decoration:underline; color:#fbd079">Create account</a>
                    </p>
                    <p style="text-align:center; padding-left:15px; ">
                        <a href="admin_login.php" style="text-decoration:underline;color:blue;font-family:czars;font-size:1.3vw">Admin</a>
                    </p>

                </form>
            </div>

        </div>
    </div>
</div>

<?php
include_once "indexfooter.php";
?>