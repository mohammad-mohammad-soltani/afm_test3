<?php
if(PHP_SESSION_DISABLED){
    session_start();
}
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
$check_sql = "SELECT * FROM users_db WHERE username = '$username' AND password = '$password' ";


// دریافت نتیجه
$result = $conn->query($check_sql);

// بررسی آیا کاربر وجود دارد یا نه
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if($row["active"] == "true"){
        $useraccess = $row['access'];
    // ورود موفقیت‌آمیز بود، ایجاد سشن
    $_SESSION['username'] = $username;
    $_SESSION['access'] = $useraccess;
    $_SESSION['defult_mode'] = "dark_mode";
    $_SESSION['login_time'] = time();
    
    
    echo "ورود موفقیت‌آمیز بود!";
    $time = time();
    $sql_login = "INSERT INTO `login_information`(`id`, `time`, `username`, `ip`) VALUES (NULL,'".$time."','".$username."','".$_SERVER['REMOTE_ADDR']."')";
    $conn->query($sql_login);
    create_web_client($username);
    header("location: balebot.php");
   //header("location: ".login_page);
    }else{
        header("location: ".login_page."?no_activated&user=".$username);
    }
   
} else {
    print_r($result);
    echo "ورود ناموفق بود. لطفا نام کاربری و رمز عبور را چک کنید.";
    header("location: ".login_page."?false");
}

// بستن اتصال به دیتابیس

$conn->close();
?>
