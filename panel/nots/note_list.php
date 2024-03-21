<?php
require_once(dirname(__DIR__).'/config/config.php');
require_once(dirname(__DIR__)."/config/db_config.php");
require_once(dirname(__DIR__)."/config/jdf.php");
function get_hight(){
    echo '100%';
}
?>
<style>
    .null{
        border-radius: 15px;
    }
    @keyframes in_o {
        from {
            opacity: 0;
        }to{
            opacity: 100;
        }
    }
    @keyframes out_o {
        from {
            opacity: 100;
        }to{
            opacity: 0;
        }
    }
</style>

<?php
function get_title(){
    echo 'لیست یادداشت‌ها';
}

require_once(header);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$conn = new mysqli(server, username, password, db);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}

// ایجاد سشن اگر وجود نداشته باشد
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'نام_کاربری_پیشفرض';
}

// دریافت نام کاربری از سشن
$username = $_SESSION['username'];

// کوئری برای بازیابی یادداشت‌های کاربر
$query = "SELECT * FROM nots_db WHERE username = ? ORDER BY `id` DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
?>



<?php
// بستن اتصال به دیتابیس
$stmt->close();

// جستجو در یادداشت‌ها
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search_query"])) {
    
    $search_query = $_GET["search_query"];
    
    // اجرای کوئری جستجو و نمایش نتایج
    $search_query = '%' . $search_query . '%'; // اضافه کردن % به ابتدا و انتهای رشته برای جستجوی شبیه‌سازی
    $query = "SELECT * FROM nots_db WHERE username = ? AND (note_name LIKE ? OR note_text LIKE ?) ORDER BY `id` DESC";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $search_query, $search_query);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<div class='search-results'>";
        echo "<h3 style='margin-top:3%;margin-right:3%;'>نتایج جستجو:</h3>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='note-card'>";
            echo "<h2>" . $row["note_name"] . "</h2>";
            echo "<p>" . $row["note_text"] . "</p>";
            echo "<img class='note-image' src='" . $row["note_image"] . "' alt='تصویر یادداشت'>";
            
            // افزودن دکمه‌های ویرایش و حذف
            echo "<div class='note-actions'>";
            
            echo "<a class='delete-button' href='delete_note.php?id=" . $row["id"] . "'>حذف</a>";
            echo "</div>";
            
            echo "</div>";
        }
        echo "</div>";
    } else {
        ?>
        <div class="eror">
        <h2>نتیجه ای برای جستجوی شما پیدا نشد</h2>
        <img style="width: 200px;" src="gif/404.gif" alt="">

       </div>
        <?php
    }
    
    $stmt->close();
}else {
    ?>
    <div class="note-list ">
    <?php
    // نمایش لیست یادداشت‌ها
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            echo '<div class="card text-white bg-dark ">';
            $time = $row["unix_time"];
            $data= jdate("   Y/n/j G:i" ,"$time" , "");

            echo '<div class="card-header" id="'.$row["id"]."title".'">'.$row["note_name"].'<br><span>زمان ایجاد این یادداشت:</span><span>'.$data.'</span></div>';
            echo '<div class="card-inner">';
            echo "<p  class='card-text '  >"; 
            echo "  <div class='card-inner' style='display:none;' id='".$row["id"]."'>";
            echo  "     ".$row['note_text'] ;
            echo "  </div>";
            echo "</p>";
            
            echo "</div>";
            // افزودن دکمه‌های ویرایش و حذف
            echo "<div class='note-actions card-footer'>";
            echo "<a class='btn btn-dark ' href='".url."note/edit?id=".$row["id"]."'>ویرایش</a>";
            
            echo "<span>   </span>";
            
            echo "<a class='btn btn-light' href='".url.'nots'."/delete_note.php?id=" . $row["id"] . "'>حذف</a>";
            echo "<span>   </span>";
            
            echo "<a class='btn btn-light' onclick = 'click_show(".$row["id"].",this)'>مشاهده متن</a>";

            echo "<span>   </span>";

            echo "<a class='btn btn-light' onclick = 'send_to_ble(".$row["id"].")'>دریافت در بله</a>";
            
            
            ?>
            
            
            <?php
            echo "</div>";
            
            echo "</div>";
            
        }
    } else {
       ?>
       <div class="eror">
        <h2>یادداشتی وجود ندارد</h2>
        <img src="<?php echo url."nots/" ?>gif/animation_lmm9jcmm_small.gif" class="null" alt="">

       </div>
       <?php
    }
    ?>
</div>

        
        
            
        
    <?php
}
require_once(footer);
?>
<script>
    function click_show(id,th){
        var state = document.getElementById(id).style.display;
        if(state == "none"){
            document.getElementById(id).style.display = "block";
            document.getElementById(id).style.animation = "in_o 1.5s ";
            th.innerHTML = "پنهان کردن متن"
            
        }else{
            document.getElementById(id).style.animation = "out_o 1.5s ";
            setTimeout(function (){document.getElementById(id).style.display = "none"},1250);
            
            
            th.innerHTML = "نمایش متن"
        }
        

    }
    function send_to_ble(id){
        
        var value = document.getElementById(id).innerText
        
            

// حالا شما می‌توانید به محتوای درون iframe دسترسی پیدا کنید

if(value != ''){
    new Promise((resolve, reject) => {
        // استفاده از jQuery برای ارسال درخواست GET
        $.post('<?php echo url; ?>nots/send_to_ble.php', { 
    text: value,
    name: document.getElementById(id+"title").innerText ,
    
    username : <?php echo $_SESSION["username"] ?>});
    });
    
    
    NioApp.Toast('در صورت صحیح بودن مقدار chat_id عملیات موفقیت آمیز بود', 'info', {
                position :  'bottom-left'
                    });
}else{
    NioApp.Toast('خطا : متن یادداشت خالی است', 'info', {
                position :  'bottom-left'
                    });
}
     
    
}
    
</script>
