<?php
require_once(dirname(__DIR__).'/config/db_config.php');
require_once(dirname(__DIR__).'/config/config.php');
session_start();

$massage = 'سلام'.$_SESSION['username']."🖐".PHP_EOL.'یک نفر با ip:'.$_SERVER['REMOTE_ADDR'].'همین الآن وارد حساب کاربری شما شده است'."🚪";

$servername = server;
$username = username;
$password = password;
$dbname = db;

$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}



// گرفتن نام کاربری از $_SESSION
$session_username = $_SESSION['username'];

// پرس و جوی در دیتابیس برای دریافت اطلاعات کاربر
$sql = "SELECT * FROM users_db WHERE username = '$session_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // دریافت اطلاعات و ذخیره در متغیرها
    $row = $result->fetch_assoc();
    
    $chat_id = $row["chat_id"];
}

$token = BLE_TOKEN;
$api_url = "https://tapi.bale.ai/bot$token/sendMessage?chat_id=$chat_id&text=".urlencode($massage);

// استفاده از cURL برای ارسال درخواست به آدرس API تلگرام
/*$curl = curl_init($api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

if ($response === false) {
    echo "خطای cURL: " . curl_error($curl);
} else {
    echo 'پیام با موفقیت ارسال شد.';
}

curl_close($curl);
*/
file_get_contents($api_url);

header("location: ".dashboard);
