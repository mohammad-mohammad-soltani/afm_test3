<?php 


if(isset($_REQUEST["username"])){
    
require_once(dirname(__DIR__)."/config/db_config.php");

$conn = new mysqli(server,username,password,db);
$check_username_sql = "SELECT id FROM users_db WHERE username = '".$_REQUEST["username"]."'";
$result = $conn->query($check_username_sql);
if($result->num_rows > 0 ){
    echo "false";
}else{
    echo "true";
}
$conn -> close();
}

