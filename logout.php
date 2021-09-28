<?php
    session_start();
    if(isset($_SESSION["user"]) && isset($_SESSION["type"])){
 
        unset($_SESSION["user"]);
        unset($_SESSION["type"]);
        unset($_SESSION["name"]);
        unset($_SESSION["country"]);
        unset($_SESSION["mifund_id"]);
        session_destroy();
        
    }
    
    header("location:index.php");