
<?php
require_once(dirname(__DIR__)."/config/config.php");
require_once(dirname(__DIR__)."/config/db_config.php");

if (isset($_GET["message_id"])) {
    $message_id = $_GET["message_id"];
    
    $conn = new mysqli(server, username, password, db);
    if ($conn->connect_error) {
        die("اتصال به پایگاه داده ناموفق بود: " . $conn->connect_error);
    }
    
    $sql = "SELECT text FROM message_db WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $message_id);
    $stmt->execute();
    $stmt->bind_result($message_text);
    $stmt->fetch();
    
    $stmt->close();
    $conn->close();
    echo $message_text;
    
    
} else {
    echo "شناسه پیام معتبر نیست.";
}
?>

