<?php
require_once (dirname(dirname(__DIR__)).'/config/db_config.php');
$servername = server;
$username = username;
$password = password;
$dbname = db;
$conn = new mysqli($servername, $username, $password, $dbname);


// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}
session_start();
// دریافت مقادیر ارسالی از POST
$username = $_POST['user'];
$password = $_POST['pass'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$id = $_POST['id'];
$access = $_POST['access'];
// کوئری UPDATE
$sql = "UPDATE users_db
        SET username = '$username', password = '$password', tel = '$tel', email = '$email',access = '$access'
        WHERE id = '".$id."'";

if ($conn->query($sql) === TRUE) {
    echo "اطلاعات با موفقیت به روز رسانی شد.";
} else {
    echo "خطا در به روز رسانی اطلاعات: " . $conn->error;
}
$_SESSION['username']=$_POST['user'];
// قطع اتصال به دیتابیس
$conn->close();


require_once(dirname(dirname(__DIR__)).'/config/config.php');
session_start();



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


// پرس و جوی در دیتابیس برای دریافت اطلاعات کاربر
$sql = "SELECT * FROM users_db WHERE username = '$session_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // دریافت اطلاعات و ذخیره در متغیرها
    $row = $result->fetch_assoc();
    
    $chat_id = $row["chat_id"];
}

$token = '328749505:ycBuydH3Yvllr49NbNd4tmfrcStxeMMRf87WCMka';
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

header('location: adminstrator.php?id='.$id);
?>
