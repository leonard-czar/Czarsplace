<?php
$register = "Create Account";
include_once "indexheader.php";

?>
<div class="container-fluid-sm">
    <?php

    $stateobj = new Customer();
    $states = $stateobj->getstate();


    if (isset($_REQUEST['btncreate'])) {


        $errors = array();
        if (empty($_REQUEST['customer_firstname'])) {
            $errors['errfirstname'] = "firstname is required!";
        }
        if (empty($_REQUEST['customer_lastname'])) {
            $errors['errlastname'] = "lastname is required!";
        }
        if (empty($_REQUEST['customer_email'])) {
            $errors['erremail'] = "email is required!";
        }
        if (empty($_REQUEST['customer_phonenumber'])) {
            $errors['errphone'] = "phone number is required!";
        }
        if (empty($_REQUEST['gender'])) {
            $errors['errgender'] = "gender is required!";
        }
        if (empty($_REQUEST['customer_address'])) {
            $errors['erraddress'] = "address is required!";
        }
        if (empty($_REQUEST['state_id'])) {
            $errors['errstate'] = "state is required!";
        }

        if (empty($_REQUEST['customer_password'])) {
            $errors['errpswd'] = "password is required!";
        } elseif (strlen($_REQUEST['customer_password']) < 7) {
            $errors['errpswd'] = "password must be more than 6 xters!";
        }



        if (empty($errors)) {

            include_once "mydbfunctions.php";

            $uchey = new Customer();

            $output = $uchey->insertcustomer(
                $_REQUEST['customer_firstname'],
                $_REQUEST['customer_lastname'],
                $_REQUEST['customer_email'],
                $_REQUEST['customer_phonenumber'],
                $_REQUEST['gender'],
                $_REQUEST['customer_address'],
                $_REQUEST['customer_address2'],
                $_REQUEST['state_id'],
                $_REQUEST['customer_password']
            );




            if ($output == 'success') {

                header('location:login.php');
                exit;
            }
        }
    }

    ?>

    <div class="row " style="justify-content: center;">
        <div class="col-sm-5 m-sm-5 shadow p-5 bg-body rounded ">


            <h3 class="m-3" style="font-family: czars; text-align:center">Create Account</h3>
            <form method="post" action="" id="" class="">


                <input type="text" name="customer_firstname" class="form-control mt-3" id="FirstName " placeholder="First Name" value="<?php
                                                                                                                                        if (isset($_REQUEST['customer_firstname'])) {
                                                                                                                                            echo $_REQUEST['customer_firstname'];
                                                                                                                                        }
                                                                                                                                        ?>">
                <?php
                if (!empty($errors['errfirstname'])) {
                    echo "<div style='color:red'>" . $errors['errfirstname'] . "</div>";
                }
                ?>

                <input type="text" name="customer_lastname" id="LastName" class="form-control mt-3" placeholder="Last Name" value="<?php
                                                                                                                                    if (isset($_REQUEST['customer_lastname'])) {
                                                                                                                                        echo $_REQUEST['customer_lastname'];
                                                                                                                                    }
                                                                                                                                    ?>">
                <?php
                if (!empty($errors['errlastname'])) {
                    echo "<div style='color:red'>" . $errors['errlastname'] . "</div>";
                }
                ?>


                <input type="email" name="customer_email" id="Email" class="form-control mt-3" placeholder="Email" value="<?php
                                                                                                                            if (isset($_REQUEST['customer_email'])) {
                                                                                                                                echo $_REQUEST['customer_email'];
                                                                                                                            }
                                                                                                                            ?>">
                <?php
                if (!empty($errors['erremail'])) {
                    echo "<div style='color:red'>" . $errors['erremail'] . "</div>";
                }
                ?>

                <input type="number" name="customer_phonenumber" id="Phone" class="form-control mt-3" placeholder="Phone Number" value="<?php
                                                                                                                                        if (isset($_REQUEST['customer_phonenumber'])) {
                                                                                                                                            echo $_REQUEST['customer_phonenumber'];
                                                                                                                                        }
                                                                                                                                        ?>">
                <?php
                if (!empty($errors['errphone'])) {
                    echo "<div style='color:red'>" . $errors['errphone'] . "</div>";
                }
                ?>

                <label for="" style="padding-right:3%;">Male <input type="radio" name="gender" id="male" class="mt-3" value="male" <?php
                                                                                                                                    if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == "male") {
                                                                                                                                        echo "checked";
                                                                                                                                    } else {
                                                                                                                                        false;
                                                                                                                                    }
                                                                                                                                    ?>></label>

                <label for="">Female
                    <input type="radio" name="gender" id="female" class="mt-3" value="female" <?php
                                                                                                if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == "female") {
                                                                                                    echo "checked";
                                                                                                } else {
                                                                                                    false;
                                                                                                }
                                                                                                ?>>

                </label>
                <?php
                if (!empty($errors['errgender'])) {
                    echo "<div style='color:red'>" . $errors['errgender'] . "</div>";
                }
                ?>

                <input type="text" name="customer_address" id="address1" class="form-control mt-3" placeholder="Address" value="<?php
                                                                                                                                if (isset($_REQUEST['customer_address'])) {
                                                                                                                                    echo $_REQUEST['customer_address'];
                                                                                                                                }
                                                                                                                                ?>">
                <?php
                if (!empty($errors['erraddress'])) {
                    echo "<div style='color:red'>" . $errors['erraddress'] . "</div>";
                }
                ?>

                <input type="text" name="customer_address2" id="address2" class="form-control mt-3" placeholder="Address 2" value="<?php
                                                                                                                                    if (isset($_REQUEST['customer_address2'])) {
                                                                                                                                        echo $_REQUEST['customer_address2'];
                                                                                                                                    }
                                                                                                                                    ?>">

                <p><select name="state_id" id="state_id" class="form-control mt-3">
                        <option value="">Select state</option>
                        <?php
                        foreach ($states as $key => $value) {
                            $stateid = $value['state_id'];
                            $statename = $value['state_name'];
                            echo "<option value='$stateid'>$statename</option>";
                        }
                        ?>
                    </select></p>
                <?php
                if (!empty($errors['errstate'])) {
                    echo "<div style='color:red'>" . $errors['errstate'] . "</div>";
                }
                ?>

                <input type="password" name="customer_password" id="Password" class="form-control mt-3" placeholder="Password">
                <?php
                if (!empty($errors['errpswd'])) {
                    echo "<div style='color:red'>" . $errors['errpswd'] . "</div>";
                }
                ?>


                <p>
                    <input type="submit" value="Create" name="btncreate" class="btn form-control mt-3" style="background-color: #fbd079;">
                </p>

            </form>
        </div>
    </div>
</div>
<?php
include_once "indexfooter.php";
?>