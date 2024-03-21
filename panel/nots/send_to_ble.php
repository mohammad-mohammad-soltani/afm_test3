<?php 
require_once(dirname(__DIR__)."/config/db_config.php");
require_once(dirname(__DIR__)."/config/config.php");

$botToken = BLE_TOKEN;

$conn = new mysqli(server, username, password, db);

$username = $_REQUEST["username"];
$text = $_REQUEST["text"];
$sql = "SELECT * FROM users_db WHERE username = '".$username."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$chatID = $row["chat_id"];

$content = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
</head>
<body class="bg-dark" dir="rtl">
    <br>
    <br>
    <div class="col-10 mx-auto bg-warning card">
        <div class="card-header">
            <div class="row">
            <h6 class="col-8 text-white">عنوان یادداشت : '.$_REQUEST["name"].'</h6>
           
            </div>
        </div>
        <div class="card-inner">
            <p>'.$text.'</p>
        </div>
    </div>
    <br>
    <br>
    <style>
    body{
        font-family : irancell;
    }
    </style>
</body>
</html>';

$TEXT = "نام یادداشت : ".$_REQUEST["name"]."\n
...................................................................................................\n
متن یادداشت :$text
";
        $messageJSON = json_encode([
            'chat_id' => $chatID,
            'text' => $TEXT,
            
        ]);

        $url = "https://tapi.bale.ai/bot$botToken/sendMessage";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $messageJSON);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;

