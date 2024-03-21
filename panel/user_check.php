<?php
require_once(dirname(__DIR__).'/config/config.php');
require_once(dirname(__DIR__).'/config/db_config.php');


// اتصال به دیتابیس MySQL
$conn = new mysqli(server, username, password, db);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}

// اطلاعات ارسالی از فرم
$username = $_POST['user'];
$password = $_POST['pass'];

// کد SQL برای بررسی ورود کاربر
$check_sql = "SELECT * FROM users_db WHERE username = ? AND password = ?";
$stmt = $conn->prepare($check_sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

// دریافت نتیجه
$result = $stmt->get_result();
session_start();
// بررسی آیا کاربر وجود دارد یا نه
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $useraccess = $row['access'];
   
    echo "true";
   //header("location: ".login_page);
} else {
    return "false";
}

// بستن اتصال به دیتابیس
$stmt->close();
$conn->close();
?>