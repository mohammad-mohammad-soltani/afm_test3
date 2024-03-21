<?php
session_start();

require_once(dirname(__DIR__)."/config/db_config.php");
$conn = new mysqli(server, username, password, db);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}

// دریافت اطلاعات ارسالی از فرم
$note_name = "ai";
$note_text = $_REQUEST['note_text'];
$target_file = "uploads/ai.jpg";
// دریافت نام کاربری از سشن
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // اگر نام کاربری در سشن وجود نداشته باشد، می‌توانید اقدامات مناسبی انجام دهید.
    die("خطا: نام کاربری در سشن وجود ندارد.");
}


// تعیین مقدار خودکار برای id
$id = null;

// افزودن یادداشت به دیتابیس
$insert_sql = "INSERT INTO nots_db (id, username, note_name, note_text, note_image) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($insert_sql);
$stmt->bind_param("sssss", $id, $username, $note_name, $note_text, $target_file);

$stmt->close();
$conn->close();
?>
