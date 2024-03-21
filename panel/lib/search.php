<?php
require_once(dirname(__DIR__)."/config/db_config.php");

// اتصال به پایگاه داده
$servername = server;
$username = username;
$password = password;
$dbname = db;
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به پایگاه داده ناموفق بود: " . $conn->connect_error);
}

// تابع جستجو
function search_posts($keyword) {
    if($keyword != '' && $keyword != ' ' ){
        global $conn;
    $sql = "SELECT * FROM posts_db WHERE title LIKE '%$keyword%' OR text LIKE '%$keyword%' OR text LIKE '%$keyword%'";
    $result = $conn->query($sql);
    return $result;
    }else{
        global $conn;
        $sql = "SELECT * FROM posts_db ORDER BY id DESC LIMIT 5";
        $result = $conn->query($sql);
        return $result;
    }
}
function last_posts(){
    global $conn;
    $sql = "SELECT * FROM posts_db ORDER BY id DESC LIMIT 5";
    $result = $conn->query($sql);
    return $result;
}

if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $search_result = search_posts($search_query);

    // آرایه‌ای برای ذخیره نتایج
    $posts = array();

    // جمع‌آوری نتایج جستجو
    if ($search_result->num_rows > 0) {
        while ($row = $search_result->fetch_assoc()) {
            // اضافه کردن عنوان به آرایه
            $posts[] = $row["title"];
        }
    }

    // چاپ نتایج به صورت JSON
    echo json_encode($posts);
}
if (isset($_GET['lastpost'])) {
    $search_query = $_GET['lastpost'];
    $last_result = last_posts();

    // آرایه‌ای برای ذخیره نتایج
    $posts = array();

    // جمع‌آوری نتایج جستجو
    if ($last_result->num_rows > 0) {
        while ($row = $last_result->fetch_assoc()) {
            // اضافه کردن عنوان به آرایه
            $posts[]["option"] = $row["title"];
        }
    }

    // چاپ نتایج به صورت JSON
    echo json_encode($posts);
}

// قطع اتصال به پایگاه داده
$conn->close();
?>
