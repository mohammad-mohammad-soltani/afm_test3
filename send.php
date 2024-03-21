<?php
require_once(__DIR__."/panel/config/config.php");
$email = $_POST["Email"];
$name = $_POST["Name"];
$subject= $_POST["Subject"];
$message= $_POST["message"];

$botToken = BLE_TOKEN;
$baseUrl = "https://tapi.bale.ai/bot";
$url = $baseUrl.$botToken."/";
$method = "sendMessage";

$text = "محمد محمد سلطانی عزیز سلام. به پیام زیر که از صفحه اصلی AFM برای تو ارسال شده است توجه کن "."\n"."نام : ".$name."\n"."موضوع : ".$subject."\n"."متن پیام : ".$message."\n \n"."ایمیل : ".$email;
$adminChatID = ADMIN_CHAT_ID;


$messageJSON = json_encode([
    'chat_id' => $adminChatID,
    'text' => $text,
    
]);

$url = $url.$method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $messageJSON);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$url = str_replace(url,"panel/"," ");
echo $url;
