<?php 
session_start();

class MerchantSessionManager{

  static function isLoggedIn(){
    return isset ($_SESSION["merchant"] );
    
  }

  static function login($email, $pwd){
    require_once("db-manager.php");
    $SQL = "SELECT * FROM `merchants` WHERE `store_email` = '$email'";
    $result = mysqli_query($cxn, $SQL);
    if(@$row = mysqli_fetch_assoc($result)){
      extract($row);
      
      if(password_verify($pwd, $store_password)){
        $_SESSION["merchant"] = $merchant_id;
        $_SESSION["type"] = $store_type;
        $_SESSION["shop"] = $store_name;
        $_SESSION["email"] = $store_email;
        $_SESSION["mifund_id"] = $merchant_code;

        
        if($type == "admin"){
          return "admin";
        }
        else{
          return "merchant";  
        }
    }else{
        return "password error";
      }
    }else{
      return "email error";
    }
    
  }
}