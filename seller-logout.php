<?php
    session_start();
    if(isset($_SESSION["merchant"]) && isset($_SESSION["type"])){
        unset($_SESSION["merchant"]);
        unset($_SESSION["type"]);
        unset($_SESSION["shop"]);
        unset($_SESSION["email"]);
        unset($_SESSION["mifund_id"]);
        session_destroy();
        
    }
    
    header("location:seller-login.php");