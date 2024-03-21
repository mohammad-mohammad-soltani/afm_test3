<?php
define("__WEB_C_FILE__",directory."/config/clientes.json");
$data = file_get_contents(__WEB_C_FILE__);
$data = json_decode($data,true);

function create_web_client($username){
    global $data;
    $key = sha1($username.uniqid());
    if(isset($data[$key])){
        $data[$key]["at_time"] = time();
        $data[$key]["username"] = $username;
    }else{
        $data[$key] = array(
            "at_time" => time(),
            "username" => $username,
        );
    }
    $data = json_encode($data);
    file_put_contents(__WEB_C_FILE__,$data);
    $_SESSION["WEB_C"] = $key;
    return $key;
}
function get_web_client($client){
    global $data;
    
    if(isset($data[$client])){
        
            return $data[$client];
        
    }else{
        return false;
    }
    
}
?>