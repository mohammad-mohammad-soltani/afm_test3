<div id="s"></div>
<?php
require_once(dirname(__DIR__)."/config/config.php");
require_once(dirname(__DIR__)."/config/db_config.php");
require_once(login_check_dir);

// اطمینان از وجود مقادیر در $_SESSION و $_GET
if (isset($_SESSION["username"]) && isset($_GET["text"]) && isset($_GET["user_name"]) && isset($_GET["subject"])) {
    $from = $_SESSION["username"];
    $text = $_GET["text"];
    $to = $_GET["user_name"];
    $subject = $_GET["subject"];

    // ایجاد اتصال به پایگاه داده با استفاده از Prepared Statements
    $conn = new mysqli(server, username, password, db);
    if ($conn->connect_error) {
        die("اتصال به پایگاه داده ناموفق بود: " . $conn->connect_error);
    }

    // استفاده از Prepared Statements برای جلوگیری از تزریق SQL
    $sql = "INSERT INTO `message_db` (`sender`, `receiver`, `text`, `subject`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $from, $to, $text, $subject);

    if ($stmt->execute()) {
        echo "پیام با موفقیت ارسال شد.";
    } else {
        echo "خطا در ارسال پیام: " . $stmt->error;
    }

    // بستن اتصال به پایگاه داده
    $stmt->close();
    $conn->close();
} else {
    echo "داده‌های لازم برای ارسال پیام معتبر نیستند.";
}
?>
<?php
require_once(dirname(__DIR__)."/config/config.php");
require_once(dirname(__DIR__)."/config/db_config.php");
require_once(login_check_dir);

// اطمینان از وجود مقادیر در $_SESSION و $_GET
if (isset($_SESSION["username"]) && isset($_GET["text"]) && isset($_GET["user_name"]) && isset($_GET["subject"])) {
    $from = $_SESSION["username"];
    $text = $_GET["text"];
    $to = $_GET["user_name"];
    $subject = $_GET["subject"];

    // ایجاد اتصال به پایگاه داده با استفاده از Prepared Statements
    $conn = new mysqli(server, username, password, db);
    if ($conn->connect_error) {
        die("اتصال به پایگاه داده ناموفق بود: " . $conn->connect_error);
    }

    // استفاده از Prepared Statements برای جلوگیری از تزریق SQL
    $sql = "INSERT INTO `message_db` (`sender`, `receiver`, `text`, `subject`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $from, $to, $text, $subject);

    if ($stmt->execute()) {
        
        ?>
    <script>
    var $i = 0;
    $interval=setInterval(function (){
    $i ++;

    if ($i == 5){
        clearInterval($interval);
        window.location = "message.php"
    }
        document.getElementById('s').innerHTML=$i;
    
},1000);
</script>
<?php
    } else {
        echo "خطا در ارسال پیام: " . $stmt->error;
    }

    // بستن اتصال به پایگاه داده
    $stmt->close();
    $conn->close();
} else {
    echo "داده‌های لازم برای ارسال پیام معتبر نیستند.";
}

?>

