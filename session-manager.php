<?php 


session_start();

class SessionManager{

  static function isLoggedIn(){
    return isset ($_SESSION["user"] );
    
  }

  static function login($email, $pwd){
    require_once("db-manager.php");
    $SQL = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($cxn, $SQL);
    if(@$row = mysqli_fetch_assoc($result)){
      extract($row);
      
      if(password_verify($pwd, $password)){
        $_SESSION["user"] = $id;
        $_SESSION["type"] = $type;
        $_SESSION["name"] = $name;
        $_SESSION["shop"] = $shop;
        $_SESSION["country"] = $country;
        $_SESSION["email"] = $email;
        $_SESSION["mifund_id"] = $mifund_id;

        
        if($type == "admin"){
          return "admin";
        }
        if($type == "merchant"){
            return "merchant"; 
        }else{
          return "user";  
        }
    }else{
        return "password error";
      }
    }else{
      return "email error";
    }
    
  }
}