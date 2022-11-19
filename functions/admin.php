<?php
include_once "myconstants.php";

class Admin{
    var $adminid;
    var $admin_name;
    var $admin_pwd;

    function __construct()
    {

        $this->dbconnect = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

        if ($this->dbconnect->connect_error) {
            die("connection failed" . $this->dbconnect->connect_error);
        } else {
        }
    }

    function Adminlogin($name, $password)
    {

        $statement = $this->dbconnect->prepare("SELECT * FROM admin WHERE admin_name=? ");

        $statement->bind_param("s", $name);

        $statement->execute();

        $result = $statement->get_result();

        if ($result->num_rows == 1) {

            $row = $result->fetch_array();

            if ($password===$row['admin_pwd']) {

                session_start();
                $_SESSION['adminid'] = $row['admin_id'];
                $_SESSION['adminname'] = $row['admin_name'];
                $_SESSION['log'] = "#AdMin#";
               

                return true;
            } else {

                return false;
            }
        } else {

            return false;
        }
    }

    function Signout()
    {
        session_start();
        unset($_SESSION['log']);
        unset($_SESSION['adminid']);
        unset($_SESSION['adminname']);

  

        header("location: admin_login.php");
        exit();
    }

    function Updatestatus($id)
    {
        $statement = $this->dbconnect->prepare("UPDATE customer_orders SET order_status = ? WHERE customer_orders.orders_id = ?");
        $status="paid";
        $statement->bind_param("si", $status, $id);
        $statement->execute();
    }

    function Deletebrand($id)
    {
        $statement = $this->dbconnect->prepare("DELETE from brands where brand_id=?");

        $statement->bind_param("i", $id);

        $statement->execute();

        if ($statement->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
    function Updatebrandimg($img, $id)
    {
        $statement = $this->dbconnect->prepare("UPDATE brands SET  brand_image = ? WHERE brand_id = ?");
        $statement->bind_param("si", $img, $id);
        $statement->execute();
        if ($statement->affected_rows == 1) {
            return true;
        } elseif ($statement->affected_rows == 0) {

            return "nothing to update";
        } else {
            return "error!" . $statement->error;
        }
    }

    function Insertbrand($name, $image)
    {
        $stmt = $this->dbconnect->prepare("INSERT into brands(brand_name,brand_image) VALUES(?,?) ");
        $stmt->bind_param("ss", $name, $image);
        $stmt->execute();

        if ($stmt->error) {
            $result = "Oops! something happened. " . $stmt->error;
        } else {
            $result = "success";
        }

        return $result;
    }


    function Deleteproduct($id)
    {
        $statement = $this->dbconnect->prepare("DELETE from wristwatches where watch_id=?");

        $statement->bind_param("i", $id);

        $statement->execute();

        if ($statement->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    function Insertproduct(
        $name,
        $desc,
        $price,
        $col,
        $ref,
        $case,
        $gender,
        $movement,
        $dial,
        $bezel,
        $crystal,
        $caliber,
        $watchfun,
        $mechanism,
        $numofjewels,
        $totaldia,
        $power,
        $numofparts,
        $frequency,
        $bracelet,
        $clasp,
        $water,
        $brandid,
        $watchimg
    ) {

        $stmt = $this->dbconnect->prepare("INSERT INTO wristwatches(watch_Name, watch_description, watch_price,
 collection,reference_number,case_description,gender,movement,dial,Bezel,crystal,caliber,watch_function,mechanism,
 number_of_jewels,total_diameter,power_reserve,number_of_parts,frequency,bracelet,clasp,water_resistance,brand_id,watch_image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param(
            "ssdsssssssssssssssssssis",
            $name,
            $desc,
            $price,
            $col,
            $ref,
            $case,
            $gender,
            $movement,
            $dial,
            $bezel,
            $crystal,
            $caliber,
            $watchfun,
            $mechanism,
            $numofjewels,
            $totaldia,
            $power,
            $numofparts,
            $frequency,
            $bracelet,
            $clasp,
            $water,
            $brandid,
            $watchimg
        );

        $stmt->execute();

        if ($stmt->error) {
            $result = "Oops! something happened. " . $stmt->error;
        } else {
            $result = "success";
        }

        return $result;
    }

    function Editproduct(
        $name,
        $desc,
        $price,
        $col,
        $ref,
        $case,
        $gender,
        $movement,
        $dial,
        $bezel,
        $crystal,
        $caliber,
        $watchfun,
        $mechanism,
        $numofjewels,
        $totaldia,
        $power,
        $numofparts,
        $frequency,
        $bracelet,
        $clasp,
        $water,
        $id
    ) {
        $statement = $this->dbconnect->prepare("UPDATE wristwatches SET watch_Name=?, watch_description=?, watch_price=?,
        collection=?,reference_number=?,case_description=?,gender=?,movement=?,dial=?,Bezel=?,crystal=?,caliber=?,watch_function=?,mechanism=?,
        number_of_jewels=?,total_diameter=?,power_reserve=?,number_of_parts=?,frequency=?,bracelet=?,clasp=?,water_resistance=? WHERE watch_id = ?");
        $statement->bind_param(
            "ssdsssssssssssssssssssi",
            $name,
            $desc,
            $price,
            $col,
            $ref,
            $case,
            $gender,
            $movement,
            $dial,
            $bezel,
            $crystal,
            $caliber,
            $watchfun,
            $mechanism,
            $numofjewels,
            $totaldia,
            $power,
            $numofparts,
            $frequency,
            $bracelet,
            $clasp,
            $water,
            $id
        );
        $statement->execute();
        if ($statement->affected_rows > 0) {
            return true;
        } elseif ($statement->affected_rows == 0) {

            return "nothing to update";
        } else {
            return "error!" . $statement->error;
        }
    }
    
    function Updateproductimage($img, $id)
    {
        $statement = $this->dbconnect->prepare("UPDATE wristwatches SET watch_image = ? WHERE watch_id = ?");
        $statement->bind_param("si", $img, $id);
        $statement->execute();
        if ($statement->affected_rows == 1) {
            return true;
        } elseif ($statement->affected_rows == 0) {

            return "nothing to update";
        } else {
            return "error!" . $statement->error;
        }
    }

    function Getorderdetails($id)
    {
        $stmt = $this->dbconnect->prepare("SELECT * FROM order_details where order_id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    
    function Getallcustomers()
    {
        $stmt = $this->dbconnect->prepare("SELECT * FROM customers");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    } 

    function Getallproduct()
    {
        $stmt = $this->dbconnect->prepare("SELECT * FROM wristwatches join brands on wristwatches.brand_id=brands.brand_id ");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    } 
    function getallbrands()
    {
        $stmt = $this->dbconnect->prepare("SELECT * FROM brands");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    } 
    function Getallcustomersorder()
    {
        $stmt = $this->dbconnect->prepare("SELECT * FROM customer_orders");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }


}
