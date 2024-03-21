<?php
require_once(dirname(__DIR__)."/config/config.php");
require_once(dirname(__DIR__)."/config/db_config.php");
require_once (dirname(__DIR__).'/config/jdf.php');
require_once(header);

// اتصال به پایگاه داده
$servername = server;
$username = username;
$password = password;
$dbname = db;

$conn = new mysqli($servername, $username, $password, $dbname);

// چک کردن اتصال
if ($conn->connect_error) {
    die("اتصال به پایگاه داده انجام نشد: " . $conn->connect_error);
}
if(isset($_REQUEST["username"])){
    $condition = "username = '".$_REQUEST["username"]."' AND";
    $sql = "SELECT * FROM queztions WHERE $condition `q_type` = 'queztion'  ORDER BY time DESC";
$result = $conn->query($sql);
}else{
    $sql = "SELECT * FROM queztions WHERE  `q_type` = 'queztion'  ORDER BY time DESC";
    $result = $conn->query($sql);
}

// استفاده از SQL برای دریافت اطلاعات کاربران


if ($result->num_rows > 0) {
    $num =  $result->num_rows;
    // خروجی داده‌ها در جدول HTML
    ?>
  
  <div class="nk-block">
                                <div class="row g-gs">
    <?php

    while ($row = $result->fetch_assoc()) {
        $sql2 = "SELECT * FROM profile_db WHERE `username` = '".$row["username"] ."' ";
        $result2 = $conn->query($sql2);
        $row_2 = $result2->fetch_assoc();
        
        $sql3 = "SELECT * FROM users_db WHERE `username` = '".$row["username"] ."' ";
        $result3 = $conn->query($sql3);
        $row_3 = $result3->fetch_assoc();
        
        ?>
        <div class="col-sm-6 col-xl-4">
                                        <div class="card h-100">
                                            <div class="card-inner">
                                                <div class="project">
                                                    <div class="project-head">
                                                        <a href="<?php echo url."users/".$row_2["account_id"] ?>" class="project-title">
                                                            <div class="user-avatar sq bg-purple"><img src="<?php echo user_avatar ?>" alt="user avatar"></div>
                                                            <div class="project-info">
                                                                <h6 class="title"><?php echo $row["title"] ?></h6>
                                                                <span class="sub-text"><?php echo $row_2["display_name"]  ?></span>
                                                            </div>
                                                        </a>
                                                        
                                                    </div>
                                                    <div class="project-details">
                                                        <p>
                                                            <?php
                                                            echo substr($row["text"],0,49)."...";
                                                            ?>
                                                        </p>
                                                        <a href="<?php echo url."question_viwe/".$row["id"] ?>" class="btn btn-primary mx-auto col-12 "><span class="text-center">مشاهده کامل این پرسش</span></a>
                                                    </div>
                                                    <div class="project-progress">
                                                        
                                                    </div>
                                                    <div class="project-meta">
                                                        <span class="badge badge-dim bg-warning"><em class="icon ni ni-clock"></em><span><?php echo jdate("   Y/n/j G:i" ,$row["time"] , "") ?></span></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php
        $num--;

    }
    
    ?>
     
      
     </div>
     </div>
    <?php
} else {
    ?>
    <div class="alert alert-info alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em> <strong>سوالی نیست !</strong>تا کنون سوالی در انجمن مطرح نشده است. <strong>اولین </strong> کسی باشید که سوالی را مطرح میکند
                                                        </div>
    <?php
}

// قطع اتصال به پایگاه داده
$conn->close();


?>
<style>
    
</style>
<?php
require_once(footer);