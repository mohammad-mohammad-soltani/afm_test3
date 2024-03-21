<?php
require_once(dirname(__DIR__)."/config/config.php");
require_once(dirname(__DIR__)."/config/db_config.php");
header('Content-Type: application/json; charset=utf-8');
$conn = new mysqli(server, username, password, db);

// افزودن تابع mysqli_real_escape_string برای جلوگیری از SQL Injection
$api = mysqli_real_escape_string($conn, $_REQUEST["api"]);

$sql = "SELECT * FROM `key_db` WHERE `api` = '$api'";

$result = $conn->query($sql);
function is_valid(){
    if($_REQUEST["p"]==1||$_REQUEST["p"]==2||$_REQUEST["p"]==3||$_REQUEST["p"]==4||$_REQUEST["p"]==5){
        return true;
    }else{
        return false;
    }
}
if ($result->num_rows > 0 && is_valid()) {
    $row = $result->fetch_assoc();

    if ($row["requests"] < $row["max"]) {
        $new_request = $row["requests"] + 1;
        if(isset($_REQUEST["n_1"])){
            $num1 = $_REQUEST["n_1"];
        }else{
            $num1 = null;
        }
        if(isset($_REQUEST["n_2"])){
            $num2 = $_REQUEST["n_2"];
        }else{
            $num2 = null;
        }
        $postdata = array(
            "username" => $row["username"],
            "num_1" => $num1,
            "num_2" => $num2,
            "prampet" => $_REQUEST["p"]
        );

        $url = url."math/math_render.php";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        $out = curl_exec($ch);
        curl_close($ch);

        $data = array(
            "model" => "gpt-3",
            "writer" => "mohammad mohammad soltani : afm",
            "answer" => $out,
            "length" => strlen($new_request),
            "requests" => $new_request,
            
        );
        if(isset($_REQUEST["save"])){
            if($_REQUEST["save"] == "true"){
                
                $postdata = array(
                    "name"=>"یادداشت ایجاد شده با هوش مصنوعی از طریق api",
                    "text"=>$out,
                    "username"=>$row["username"]
                );
        
                $url = url."nots/addnots.php";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
                $out = curl_exec($ch);
                curl_close($ch);
            }
        }
        $sql = "UPDATE `key_db` SET requests = '$new_request' WHERE api = '$api'";
        $conn->query($sql);
    } else {
        echo "ERROR: شما از حد مجاز فراتر رفته‌اید";
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    echo "ERROR: Key or prampet is  not valid";
}

?>
