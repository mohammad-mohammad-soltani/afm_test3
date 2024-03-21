<?php
require_once (dirname(dirname(__DIR__)).'/config/config.php');
require_once (dirname(dirname(__DIR__)).'/config/db_config.php');
require_once (dirname(dirname(__DIR__)).'/config/jdf.php');
$you =null;
function get_month($month){
    switch ($month) {
        case '1':
            # code...
            $month = "فروردین";
            break;
        case '2':
            # code...
            $month = "اردیبهشت";
            break;
        case '3':
            # code...
            $month = "خرداد";
            break;
        case '4':
            # code..
            $month = "تیر";
            break;
        case '5':
            # code...
            $month = "مرداد";
            break;
        case '6':
            # code...
            $month = "شهریور";
            break;
        case '7':
            # code...
            $month = "مهر";
            break;
        case '8':
            # code...
            $month = "آبان";
            break;
        case '9':
            # code...
            $month = "آذر";
            break;
        case '10':
            # code...
            $month = "دی";
            break;
        case '11':
            # code...
            $month = "بهمن";
            break;
        case '12':
            # code...
            $month = "اسفند";
            break;
    }
    return $month;
}
function get_title(){
    echo "مدیریت";
}
function get_hight(){
    echo '500px';
}

?>

<div class="nk-content-body">
                            <div class="nk-block">
                                <div class="card card-stretch">
                                    <div class="card-inner-group">
                                        
                                        <div class="card-inner p-0">
                                            <div class="nk-tb-list nk-tb-ulist" id="data">
                                                <div class="nk-tb-item nk-tb-head">
                                                    
                                                    <div class="nk-tb-col"><span class="sub-text">#</span></div>
                                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">آی پی</span></div>
                                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">سال</span></div>
                                                    <div class="nk-tb-col tb-col-lg"><span class="sub-text">ماه</span></div>
                                                    <div class="nk-tb-col tb-col-lg"><span class="sub-text">روز</span></div>
                                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">ساعت</span></div>
                                                    
                                                </div><!-- .nk-tb-item -->

                                               


    <?php
    
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

// استفاده از SQL برای دریافت اطلاعات کاربران
$sql = "SELECT * FROM `login_information` WHERE `username` = '".$_POST["username"]."' ORDER BY time DESC";

$result = $conn->query($sql);
$num =  $result->num_rows;
if ($result->num_rows > 0) {
    // خروجی داده‌ها در جدول HTML
     
    while ($row = $result->fetch_assoc()) {
       
        
        echo ' <div class="nk-tb-item " id="ajax!user">
        
        <div class="nk-tb-col">
            <a href="html/user-details-regular.html">
                <div class="user-card">
                    
                    <div class="user-info">
                        <span class="tb-lead">'.$num.'<span class="dot dot-success d-md-none ms-1"></span></span>
                        
                    </div>
                </div>
            </a>
        </div>
        <div class="nk-tb-col tb-col-mb">
            <span class="tb-amount">'.$row["ip"].'</span>
        </div>
        <div class="nk-tb-col tb-col-md">
            <span>'.$data= jdate(" Y " ,$row['time'] , "").'</span>
        </div>
        <div class="nk-tb-col tb-col-lg">
            <span>'.get_month($data= jdate("n" ,$row['time'] , "")).'</span>
        </div>
        <div class="nk-tb-col tb-col-lg">
            <span>'.$data= jdate("j" ,$row['time'] , "").'</span>
        </div>
        <div class="nk-tb-col tb-col-md">
            <span class="tb-status text-success">'.$data= jdate("G:i" ,$row['time'] , "").'</span>
        </div>
        
    </div><!-- .nk-tb-item -->';

    $num--;
    }
    
    
} else {
    echo "هیچ کاربری یافت نشد.";
}

// قطع اتصال به پایگاه داده
$conn->close();
?>


<!--<div class="count" style="color : black; text-align : center;"><h4 style="width : fit-content;margin : auto;background-color : white;padding : 12px;border : 3px  solid;border-radius:7px;"><?php /* echo "تعداد کاربران:".$user_count*/ ?></h4></div> -->
</div><!-- .nk-tb-list -->
                                        </div><!-- .card-inner -->
                                        
                                    </div><!-- .card-inner-group -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                        </div>
<?php

