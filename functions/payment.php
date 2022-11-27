<?php
include_once "myconstants.php";


class Payment{

    public $amount;
    public $order_id;
    public $mycon;
    public $key;

    function __construct()
    {
        $this->mycon= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
        
        if ($this->mycon->connect_error) {
            die("connection failed: ". $this->mycon->connect_error);
        }
        $this->key= "sk_test_227e3d2d5b75ab3ebdce28633912d9402b44af96";
    }
    public function insertTransaction($order_id,$amount){

        $stmt=$this->mycon->prepare("INSERT into payments (orderid, amount,  payment_status,
        paymentmode) VALUES (?,?,?,?)");

        $paymentstatus="pending";

        $paymentmode= "online";

        $stmt->bind_param("isss",$order_id,$amount,$paymentstatus,$paymentmode);

        $stmt->execute();

        if ($stmt->affected_rows==1) {
            return true;
        }else {
            
            return false;
        }
    }
    
    public function initpaystackTransaction($amount,$transreference,$emailaddress){
        $url="https://api.paystack.co/transaction/initialize";
        $callback= "http://localhost/czarsplace/paystack_callback.php";
        $key= "sk_test_227e3d2d5b75ab3ebdce28633912d9402b44af96";

        $fields=[
            "email"=>$emailaddress,
            "amount"=>$amount*100,
            "reference"=>$transreference,
            "callback_url"=>$callback
        ];
        $fieldstr= http_build_query($fields);

        
        $ch =curl_init();

       
        curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fieldstr);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);  
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $key",
    "Cache-Control: no-cache"
  ));
  
  $response= curl_exec($ch);
  if (curl_error($ch)== true) {
    die("Error".curl_error($ch));
  }
  
  curl_close($ch);

  
  $result= json_decode($response);

  return $result;


    }

    public function verifypaystackTrans($transreference){
        $url="https://api.paystack.co/transaction/verify/".$transreference;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"GET" );
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);   
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer ".$this->key,
    "Cache-Control: no-cache"

  ));
  
  $response= curl_exec($ch);

  if (curl_error($ch)) {
    die(" curl error: ".curl_error($ch));
  }
  
  curl_close($ch);

  return json_decode($response);
  

    }
    
    public function updateTransaction($orderid){

        $stmt=$this->mycon->prepare("UPDATE payments set payment_status=? where orderid=? ");

        $paymentstatus="paid";
        
        $stmt->bind_param("si",$paymentstatus,$orderid);

        $stmt->execute();

        if ($stmt->affected_rows==1) {
            return true;
        }else {
            
            return false;
        }
    }
   

}
?>