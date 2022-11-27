

<?php

include_once "myconstants.php";
class Customer
{

    var $firstname;
    var $lastname;
    var $emailaddress;
    var $phonenumber;
    var $gender;
    var $address;
    var $address2;
    var $city;
    var $state;
    var $password;
    var $dbconnect;

    function __construct()
    {

        $this->dbconnect = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

        if ($this->dbconnect->connect_error) {
            die("connection failed" . $this->dbconnect->connect_error);
        } else {
        }
    }


    function insertcustomer($fname, $lname, $email, $phone, $gender, $address, $address2, $state, $pswd)
    {

        $password = password_hash($pswd, PASSWORD_DEFAULT);

        $stmt = $this->dbconnect->prepare("INSERT INTO customers(customer_firstname, customer_lastname, customer_email,
 customer_phonenumber,gender,customer_address,customer_address2,state_id,customer_password) VALUES(?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("sssssssis", $fname, $lname, $email, $phone, $gender, $address, $address2, $state, $password);


        $stmt->execute();

        if ($stmt->error) {
            $result = "Oops! something happened. " . $stmt->error;
        } else {
            $result = "success";
        }

        return $result;
    }


    function login($email, $password)
    {

        $statement = $this->dbconnect->prepare("SELECT * FROM customers WHERE customer_email=? ");

        $statement->bind_param("s", $email);

        $statement->execute();

        $result = $statement->get_result();

        if ($result->num_rows == 1) {

            $row = $result->fetch_array();

            if (password_verify($password, $row['customer_password'])) {

                session_start();
                $_SESSION['customer_id'] = $row[0];
                $_SESSION['lname'] = $row['customer_firstname'];
                $_SESSION['fname'] = $row['customer_lastname'];
                $_SESSION['email'] = $row[3];
                $_SESSION['logger'] = "#czar";

                return true;
            } else {

                return false;
            }
        } else {

            return false;
        }
    } 


    function logout()
    {
        session_start();
        unset($_SESSION['logger']);
        unset($_SESSION['customer_id']);
        unset($_SESSION['email']);
        unset($_SESSION['fname']);
        unset($_SESSION['lname']);



        header("location: login.php");
        exit();
    } 


    function getcustomers()
    {
        $statement1 = $this->dbconnect->prepare("SELECT * FROM customers ");
        $statement1->execute();
        $result = $statement1->get_result();


        $records = [];
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
            return $records;
        } else {
            return $records;
        }
    } 


    function getstate()
    {

        $stmt = $this->dbconnect->prepare("SELECT * from state ");

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


    function getallaudemars()
    {

        $stmt = $this->dbconnect->prepare(" SELECT * FROM wristwatches where brand_id=? ");
        $brandid = 1;
        $stmt->bind_param("i", $brandid);
        $stmt->execute();
        $result = $stmt->get_result();
        $records = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $records[] = $row;
            }
        }
        return $records;
    } 


    function getbrandap()
    {
        $statement = $this->dbconnect->prepare("SELECT * FROM brands WHERE brand_id =?");
        $brandid = 1;
        $statement->bind_param("i", $brandid);

        $statement->execute();

        $result = $statement->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return "Oops! something happened!";
        }
    } 


    function getallrolex()
    {

        $stmt = $this->dbconnect->prepare(" SELECT * FROM wristwatches where brand_id=? ");
        $brandid = 2;
        $stmt->bind_param("i", $brandid);
        $stmt->execute();
        $result = $stmt->get_result();
        $records = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    } 

    function getbrandrolex()
    {
        $statement = $this->dbconnect->prepare("SELECT * FROM brands WHERE brand_id =?");
        $brandid = 2;
        $statement->bind_param("i", $brandid);

        $statement->execute();

        $result = $statement->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return "Oops! something happened!";
        }
    }

    function getallhublot()
    {

        $stmt = $this->dbconnect->prepare(" SELECT * FROM wristwatches where brand_id=? ");
        $brandid = 3;
        $stmt->bind_param("i", $brandid);
        $stmt->execute();
        $result = $stmt->get_result();
        $records = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    } 

    function getbrandhublot()
    {
        $statement = $this->dbconnect->prepare("SELECT * FROM brands WHERE brand_id =?");
        $brandid = 3;
        $statement->bind_param("i", $brandid);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return "Oops! something happened!";
        }
    }


   

    function getmalewatches()
    {
        $statement = $this->dbconnect->prepare("SELECT * FROM wristwatches join brands on wristwatches.brand_id=brands.brand_id WHERE wristwatches.gender =?");
        $male = "Men";
        $statement->bind_param("s", $male);

        $statement->execute();

        $result = $statement->get_result();
        $records = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    } 


    function getfemalewatches()
    {
        $statement = $this->dbconnect->prepare("SELECT * FROM wristwatches join brands on wristwatches.brand_id=brands.brand_id WHERE wristwatches.gender =?");
        $female = "Ladies";
        $statement->bind_param("s", $female);
        $statement->execute();
        $result = $statement->get_result();
        $records = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    } 


    function getallwatches($id)
    {
        $stmt = $this->dbconnect->prepare("SELECT * FROM wristwatches where brand_id=?");
        $stmt->bind_param("i", $id);
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

    function Getallbrands()
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



    function Getcart($id)
    {
        $statement = $this->dbconnect->prepare("SELECT * FROM cart where userid=? ORDER BY cart.timeadded DESC");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $records = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    } 


    function Deletecartitem($id)
    {
        $statement = $this->dbconnect->prepare("DELETE from cart where cartid=?");

        $statement->bind_param("i", $id);

        $statement->execute();

        if ($statement->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    function Deletecart($id)
    {
        $statement = $this->dbconnect->prepare("DELETE from cart where userid=?");

        $statement->bind_param("i", $id);

        $statement->execute();

        if ($statement->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
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

    function Getcustomerorder($id)
    {
        $stmt = $this->dbconnect->prepare("SELECT * FROM customer_orders join payments on customer_orders.orders_id=payments.orderid  where customer_id=? ORDER BY payments.datepaid DESC");
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

    function Get_customer_order($id)
    {
        $stmt = $this->dbconnect->prepare("SELECT * FROM order_details join wristwatches on order_details.watch_id=wristwatches.watch_id where order_id=?");
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

   
    function Getwatchidincart($id)
    {
        $statement = $this->dbconnect->prepare("SELECT * FROM cart where userid=? ");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $records = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row['watchid'];
            }
        }
        return $records;
    }
    

    function Insertcart($qty, $userid, $watchid, $cartimg, $price, $total)
    {
        $stmt = $this->dbconnect->prepare("INSERT INTO cart set cartid=?, qty=?,userid=?,watchid=?,cartimg=?,price=?, total=? ");
        $cat = null;
        $stmt->bind_param("iiiissd", $cat, $qty, $userid, $watchid, $cartimg, $price, $total);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            return true;
        } else {
            return "Oops! something went wrong";
        }
    }


    function getcarttotal($id)
    {
        $statement = $this->dbconnect->prepare("SELECT * FROM cart WHERE userid=?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $records = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row['total'];
            }
        }
        return $records;
    }

    function editcart($qty, $total, $id)
    {
        $statement = $this->dbconnect->prepare("UPDATE cart SET qty = ?, total=? WHERE cart.cartid = ?");
        $statement->bind_param("isi", $qty, $total, $id);
        $statement->execute();
        if ($statement->affected_rows == 1) {
            return true;
        } elseif ($statement->affected_rows == 0) {

            return "nothing to update";
        } else {
            return "error!" . $statement->error;
        }
    }

    function insertOrders($orderid, $userid,$shipad, $altphone)
    {
        $stmt = $this->dbconnect->prepare("INSERT INTO customer_orders set orders_id=?,customer_id=?, shipping_address=?,alt_phonenumber=? ");
        $stmt->bind_param("iiss", $orderid, $userid, $shipad, $altphone);
        $stmt->execute();
        
    }

    function insertOrders_details($order_id,$watchid,  $qty, $unitprice,$amount)
    {
        $stmt = $this->dbconnect->prepare("INSERT INTO order_details set order_id=?,watch_id=?, qty=?,unit_price=?,  total=? ");
        $stmt->bind_param("iiidd", $order_id, $watchid, $qty ,$unitprice,$amount );
        $stmt->execute();
        
    }
   

   
}



?>
