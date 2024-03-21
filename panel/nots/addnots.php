<?php
session_start();

require_once(dirname(__DIR__)."/config/db_config.php");
$conn = new mysqli(server, username, password, db);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}

// دریافت اطلاعات ارسالی از فرم
$note_name = $_REQUEST['name'];
$note_text = $_REQUEST['text'];
$username = math_ai_init()["username"];


?>

<?php
// تعیین مقدار خودکار برای id
$id = null;
//file_put_contents("main.txt",json_encode(array($note_name,$note_text,$username)));
// افزودن یادداشت به دیتابیس
$insert_sql = "INSERT INTO nots_db (id, username, note_name, note_text,unix_time) VALUES (?, ?, ?, ?,?)";
$stmt = $conn->prepare($insert_sql);
$time = time();
$stmt->bind_param("ssssi", $id, $username, $note_name, $note_text, $time );

// اجرای کد SQL برای ذخیره یادداشت
if ($stmt->execute()) {
    echo "یادداشت با موفقیت ثبت شد!";

} else {
    echo "خطا در ثبت یادداشت: " . $stmt->error;
}
header("location: note_list.php");
// بستن اتصال به دیتابیس
$stmt->close();
$conn->close();
?>
