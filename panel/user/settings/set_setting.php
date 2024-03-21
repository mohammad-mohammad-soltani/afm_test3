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

$password = $_POST['pass'];

$name = $_POST['name'];
$birth_date = $_POST["birth_date"] ;
$chat_id = $_POST['chat-id'];
$email_renderer = $conn->query("SELECT * FROM users_db WHERE username = '".$_SESSION['username']."'");
$email = $email_renderer->fetch_assoc()["email"];
// کوئری UPDATE
// کوئری UPDATE با استفاده از Prepared Statements
$sql = "UPDATE users_db SET password = ?,   birth_date = ?, name = ?, chat_id = ? WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $password, $birth_date, $name, $chat_id, $_SESSION['username']);
$stmt->execute();


if ($stmt->affected_rows > 0) {
    echo "اطلاعات با موفقیت به روز رسانی شد.";
} else {
    echo "خطا در به روز رسانی اطلاعات: " . $stmt->error;
}

// بستن اتصال به دیتابیس
$stmt->close();
$conn->close();



require_once(dirname(dirname(__DIR__)).'/config/config.php');




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
$massage = "کاربر ".$session_username."تنظیمات شما با موفقیت تغییر کرد";
// پرس و جوی در دیتابیس برای دریافت اطلاعات کاربر
$sql = "SELECT * FROM users_db WHERE username = '$session_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // دریافت اطلاعات و ذخیره در متغیرها
    $row = $result->fetch_assoc();
    
    $chat_id = $row["chat_id"];
}

$token = '328749505:BOHHQjHkuaez8zyCNshzpdBdQCdrzb1kYqE2cYbe';
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

header('location: '.url.'profile');
?>
