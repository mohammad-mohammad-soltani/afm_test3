<?php
require_once(dirname(__DIR__).'/config/config.php');
require_once(dirname(__DIR__).'/config/db_config.php');
// اطلاعات ارسالی از فرم
$username = $_REQUEST['user'];
$password = $_REQUEST['pass'];
$email = $_REQUEST['email'];
$tel = $_REQUEST['tel'];
// اتصال به دیتابیس MySQL
$conn  = new mysqli(server, username, password, db);
header('Content-Type: application/json; charset=utf-8');
// کد SQL برای بررسی تکراری نبودن نام کاربری
$check_username_sql = "SELECT id FROM users_db WHERE username = ? OR tel= ? OR email = ?";
$stmt = $conn->prepare($check_username_sql);
$stmt->bind_param("sss", $username,$tel,$email);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    // نام کاربری تکراری است، می‌توانید اقدامات مورد نظر را انجام دهید
    
   header("location: ".sing_up_page."?false");
} else {
    $bio = array(
        "یک کاربر شگفت انگیز که از AFM استفاده میکند",
        "AFM به من در حل سوالات ریاضی ام کمک بسیاری کرد",
        "من با AFM دیگر در هیچ سوالی مشکل ندارم",
        "اگه دوست هات رو دوست داری اون هارو به AFM دعوت کن",
        "بنظرم قشنگ ترین کار معرفی AFM به دوستاته",
        "قبل دیدن AFM فکر میکردم هرچی پول میدی همونقدر آش میخوری ولی بعد از AFM میگم که : با AFM هر چی هم که آش بخوری پولی لازم نیست بدی 😂😂😂",
        "قبل دیدن AFM فکر میکردم هرچی پول میدی همونقدر آش میخوری ولی بعد از AFM میگم که : با AFM هر چی هم که آش بخوری پولی لازم نیست بدی 😂😂😂",
        "بعد از اینکه توسط دوستم با AFM آشنا شدم مسیر یادگیریم عوض شد",
        "سایتای زیادی بودن که چت جی پی تی رو داشتن ولی هیچ کدومشون به دقت AFM سوالای منو حل نمیکردن ",
        "با هوش مصنوعی AFM راه زندگیتو عوض کن . AI FOR MATH"
    );
    $num = random_int(0,count($bio));
    // نام کاربری تکراری نیست، می‌توانید عملیات ثبت نام را انجام دهید

    // کد SQL برای ذخیره اطلاعات در جدول
    $insert_sql = "INSERT INTO users_db(defult_mode,name,chat_id,username, password, email, tel,access,birth_date,last_answer,coin,active) VALUES ('dark','".$username."',123456,'".$username."', '".$password."', '".$email."', '".$tel."','sub','تاریخ تولد شما','first question',0,'false')";
    $insert_sql2 = "INSERT INTO profile_db(id, username, display_name, account_id, discription) VALUES (NULL,'$username','$username','$username','".$bio[$num]."')";
    $conn->query($insert_sql2);
    $res = $conn->query($insert_sql);
    

    // اجرای کد SQL برای ذخیره اطلاعات
    
        
   
    header("location: ".sing_up_page."/active_account");
    
    
    
}

// بستن اتصال به دیتابیس

$conn->close();
