<?php

require_once(dirname(__DIR__)."/config/db_config.php");
header('Content-Type: application/json;');
if(isset($_REQUEST["p"] )&& isset($_REQUEST["api"]) && 0<$_REQUEST["p"] && $_REQUEST["p"] < 6 ){
    $conn = new mysqli(server,username,password,db);

    $api= $_REQUEST["api"];
    $sql = "SELECT * FROM `key_db` WHERE `api` = '$api'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $username = $row["username"];
    function prampet_read($column_name)
    {
        global $conn;
        global $username;
        $column = "prampet".$column_name;
        
        $result = $conn->query("SELECT $column FROM users_db WHERE username = '$username'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row[$column];
        }
        return '';
    }
    $data = array(
        "api"=>$api,
        "username"=>$username,
        "writer"=>"mohammad mohammad soltani : AFM",
        "length" => strlen(prampet_read($_REQUEST["p"])),
        "result"=>prampet_read($_REQUEST["p"])
    );
    echo json_encode($data , JSON_UNESCAPED_UNICODE);
    $conn->close();
}else{
    die("EROR : please enter prompt or api key");
}
