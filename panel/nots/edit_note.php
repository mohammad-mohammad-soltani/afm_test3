<?php
require_once(dirname(__DIR__).'/config/config.php');
require_once(dirname(__DIR__)."/config/db_config.php");
function get_hight(){
    echo '650px';
}

function get_title(){
    echo 'ویرایش یادداشت';
}

require_once(header);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "afm";

$conn = new mysqli(server, username, password, db);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}

// دریافت نام کاربری از سشن
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'نام_کاربری_پیشفرض';
}

$username = $_SESSION['username'];

// چک کردن ارسال شدن شناسه یادداشت
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $note_id = $_GET['id'];
    
    // کوئری برای بازیابی اطلاعات یادداشت
    $query = "SELECT * FROM nots_db WHERE id = ? AND username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $note_id, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $note_name = $row['note_name'];
        $note_text = $row['note_text'];
        
    } else {
        echo "<p>یادداشت مورد نظر یافت نشد.</p>";
        $stmt->close();
        require_once(footer);
        exit;
    }
} else {
    echo "<p>شناسه یادداشت نامعتبر است.</p>";
    require_once(footer);
    exit;
}

// بررسی ارسال فرم ویرایش یادداشت
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_note_name = $_POST["new_note_name"];
    $new_note_text = $_POST["new_note_text"];
  
    
    // کوئری برای به روزرسانی اطلاعات یادداشت
    $query = "UPDATE nots_db SET note_name = ?, note_text = ? WHERE id = ? AND username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssis", $new_note_name, $new_note_text,  $note_id, $username);
    
    if ($stmt->execute()) {
        ?>
        <script>
            window.location = "<?php echo url."note/list" ?>";
        </script>
        <?php
       
    } else {
        echo "<p>خطا در به روزرسانی یادداشت.</p>";
    }
    
    $stmt->close();
}

// بستن اتصال به دیتابیس
$conn->close();
?>

<form method="post" action="<?php echo url."note/edit" ?>">
    <div class="form-group">
        <label for="new_note_name">عنوان یادداشت:</label>
        <input type="text" id="new_note_name" class="form-control" name="new_note_name" value="<?php echo $note_name; ?>" required>
    </div>
    <div class="form-group">
        <label for="new_note_text">متن یادداشت:</label>
        <textarea id="new_note_text" name="new_note_text" rows="4" class="form-control" required><?php echo $note_text; ?></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
</form>



<?php require_once(footer); ?>
