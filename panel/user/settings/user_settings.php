<?php
require_once (dirname(dirname(__DIR__)).'/config/config.php');
require_once (dirname(dirname(__DIR__)).'/config/db_config.php');




require_once(header);
// اتصال به دیتابیس
$servername = server;
$username = username;
$password = password;
$dbname = db;

$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}

// گرفتن نام کاربری از $_SESSION
$session_username = $_SESSION['username'];

// پرس و جوی در دیتابیس برای دریافت اطلاعات کاربر
$sql = "SELECT * FROM users_db WHERE username = '$session_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // دریافت اطلاعات و ذخیره در متغیرها
    $row = $result->fetch_assoc();
    $tel = $row["tel"];
    $email = $row["email"];
    $username = $row["username"];
    $password = $row["password"];
    $password = $row["password"];
} else {
    echo "کاربر مورد نظر پیدا نشد.";
}

$sql2 = "SELECT * FROM  `profile_db` WHERE username = '$session_username'";
$result = $conn->query($sql2);
    // دریافت اطلاعات و ذخیره در متغیرها
$row_2 = $result->fetch_assoc();
    
 
//......................................................................................
// قطع اتصال به دیتابیس
$conn->close();




?>
   

                    <div class="container-xl wide-xl">
                        <div class="nk-content-body">
                            
                            <div class="nk-block">
                                <div class="card">
                                    <ul class="nav nav-tabs nav-tabs-s1 px-4">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#profile-tab-pane">تنظیمات حساب</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link " data-bs-toggle="tab" href="#profile-tab-pane2">آمار ورود</a>
                                        </li>
                                        <!--<li class="nav-item" rol="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#viwe_profile">ویرایش پروفایل کاربری</a>
                                        </li>-->
                                        
                                    </ul>
                                    <div class="card-inner">
                                        <div class="tab-content mt-0">
                                            <div class="tab-pane fade show active" id="profile-tab-pane">
                                                <div class="nk-data data-list">
                                                    <div class="data-head">
                                                        <h6 class="overline-title">اطلاعات کاربری</h6>
                                                    </div>
                                                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">نام کاربری</span>
                                                            <span class="data-value"><?php echo $username ?></span>
                                                        </div>
                                                        
                                                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->
                                                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">کلمه عبور</span>
                                                            <span class="data-value"><?php echo $password ?></span>
                                                        </div>
                                                        
                                                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->
                                                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">نام و نام خانوادگی</span>
                                                            <span class="data-value"><?php echo $row["name"] ?></span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->
                                                    <div class="data-item">
                                                        <div class="data-col">
                                                            <span class="data-label">ایمیل</span>
                                                            <span class="data-value"><?php echo $row["email"] ?></span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                                    </div><!-- data-item -->
                                                    <div class="data-item">
                                                        <div class="data-col">
                                                            <span class="data-label">سطح دسترسی</span>
                                                            <span class="data-value"><?php echo print_access($_SESSION["access"])?></span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                                    </div><!-- data-item -->
                                                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">شماره تلفن</span>
                                                            <span class="data-value text-soft"><?php echo $tel ?></span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->
                                                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">چت آیدی</span>
                                                            <span class="data-value"><?php echo $row["chat_id"]?></span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->
                                                    
                                                </div><!-- data-list -->
                                                
                                            </div><!-- .tab-pane -->
                                            <div class="tab-pane fade show " id="profile-tab-pane2">
                                                
                                                
                                            </div><!-- .tab-pane -->

                                            <!--<div class="tab-pane fade show " id="viwe_profile">
                                                <div class="row">
                                                    <div  class="col-3 p-sidebar  text-dark bg-lighter">
                                                        <div class="inner-p-sidebar ">
                                                        <ul>
                                                        <li><img  class="image-p-placeholder col-12" src="<?php echo "https://www.gravatar.com/avatar/".md5($row['email'])."?s=150" ?>" alt="<?php echo $row["name"] ?>"></li>
                                                        <br>
                                                        <li class="col-10 mx-auto"><h5 class="mx-auto text-center col-12" >نام نمایشی</h5></li>
                                                        <br>
                                                        <li><input type="text" class="form-control" placeholder="نام نمایشی پروفایل خود را وارد نمایید" value="<?php echo $row_2["display_name"] ?>"></li>
                                                        <br>
                                                        <li class="col-10 mx-auto"><h5 class="mx-auto text-center col-12" >id پروفایل</h5></li>
                                                        <br>
                                                        <li><input type="text" dir="ltr" class="form-control text-left" placeholder="نام نمایشی پروفایل خود را وارد نمایید" value="<?php echo $row_2["account_id"] ?>"></li>
                                                        </ul>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-9 p-content">
                                                        <div class="col-12 inner-p-content">
                                                            <ul>
                                                                <li>
                                                                    <h4 >بیوگرافی</h4>
                                                                    <br>
                                                                </li>
                                                                <li>
                                                                    
                                                                    <textarea name="" id="" class="nk-editor-main" cols="30" rows="10"></textarea>

                                                                </li>
                                                                <li class="col-12">
                                                                    <br>
                                                                    <button type="button" class="btn btn-light col-12 text-center  "><span class="text-center">ذخیره تنظیمات</span></button>
                                                                </li>
                                                                <li class="col-12">
                                                                    <br>
                                                                    <a href="<?php echo url."user/information/information.php?id=".$row_2["account_id"] ?>"><button type="button" class="btn btn-light col-12 text-center  "><span class="text-center">مشاهده پروفایل</span></button></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div> .tab-pane -->
                                        

                                            
                                        </div><!-- .tab-content -->
                                    </div>
                                </div>
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                    <style>
                        .p-sidebar{
                            ;
                            border-radius: 10px;
                        }
                        .p-content{
                            
                            
                        }
                        .tox-statusbar__branding{
                            display: none;
                        }

                        .image-p-placeholder{
                            border-radius: 20%;
                            
                        }
                        .inner-p-sidebar{
                            padding: 15px;
                        }
                        .inner-p-content{
                            padding: 15px;
                            
                            border-radius: 15px;
                        }
                    </style>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <link rel="stylesheet" href="./assets/css/editors/tinymce.css?ver=3.2.3">
    <script src="./assets/js/libs/editors/tinymce.js?ver=3.2.3"></script>
    <script src="./assets/js/editors.js?ver=3.2.3"></script>
<script>
    
           
    
            
            
            
                
    function ajax() {
    return new Promise((resolve, reject) => {
        // استفاده از jQuery برای ارسال درخواست GET
        $.post('<?php echo url; ?>user/login/login_information.php', { 
            username: <?php echo "'".$_SESSION["username"]."'"; ?>
        }, function (data) {
            // در اینجا نتیجه دریافت شده به عنوان پارامتر resolve تابع Promise منتقل می‌شود.
            document.getElementById("profile-tab-pane2").innerHTML = data;
            resolve(data); // فراخوانی تابع resolve برای حل Promise
        }).fail(function (error) {
            // در صورت بروز خطا، تابع reject فراخوانی می‌شود.
            reject(error);
        });
    });
}

    
         ajax()
         tinymce.init({
  selector: '.nk-editor-main',  // change this value according to your HTML
  
  language: 'fa',
 
  addfont_formats : "irancell"
});
</script>
    


    <?php
require_once(footer);