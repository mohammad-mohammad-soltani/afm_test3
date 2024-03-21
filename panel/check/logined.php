<?php
require_once(dirname(__DIR__)."/config/db_config.php");
require_once(dirname(__DIR__)."/config/config.php");
// بررسی وضعیت سشن
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // سشن فعال نیست، شروع یک سشن جدید
}


    // اینجا می‌توانید کدهای HTML و PHP خود را قرار دهید
    function login_check(){

    
    // بررسی وضعیت لاگین کاربر
    if (isset($_SESSION['username']) && isset($_SESSION['login_time'])) {
        $servername = server;
    $username = username;
    $password = password;
    $dbname = db;
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query("SELECT *  FROM users_db WHERE username = '".$_SESSION['username']."' AND access = '".$_SESSION["access"]."'");
    if($result->num_rows > 0 ){
        if(time() < $_SESSION["login_time"] + stay_time){
            return true;
        }else{
            session_unset(); 
            session_destroy(); 
            return false;
       
        }
        
    }else{
        return false;
    }
        //echo "کاربر " . $_SESSION['username'] . " وارد شده است.";
        
        
    } else {
        //echo "کاربر وارد نشده است. لطفاً وارد شوید.";
        ///header("location: ".login_page."?redirect");
    }
}
    ?>
