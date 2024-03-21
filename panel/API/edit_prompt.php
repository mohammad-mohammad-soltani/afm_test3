<?php
header('Content-Type: application/json; charset=utf-8');
require_once(dirname(__DIR__)."/config/db_config.php");
$conn = new mysqli(server,username,password,db);

if(isset($_REQUEST["p"] )&& isset($_REQUEST["api"]) && 0<$_REQUEST["p"] && $_REQUEST["p"] < 6 && isset($_REQUEST["text"])){
    $api= $_REQUEST["api"];
    $sql = "SELECT * FROM `key_db` WHERE `api` = '$api'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $username = $row["username"];
    $p = $_REQUEST["p"];

        
        $sql = "UPDATE users_db SET prampet".$p." = '".$_REQUEST["text"]."' WHERE username = '$username'";

        if($conn->query($sql)){
            
            $result = true;
        }else{
            $result = false;
        }
        $data = array(
            "username" => $username,
            "writer" => "mohammad mohammad soltani : AFM",
            "length" => strlen($_REQUEST["text"]),
            "result" =>$result,
            "text" => $_REQUEST["text"]
        );
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }else{
        die("ERROR : please enter prompt or api key or text");
    }