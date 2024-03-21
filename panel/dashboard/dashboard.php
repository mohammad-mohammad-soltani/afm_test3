<?php
require_once(dirname(__DIR__) . '/config/config.php');
require_once(dirname(__DIR__) . '/config/db_config.php');
require_once(login_check_dir);
require_once(header);

// تابع برای خواندن از دیتابیس
$conn = new mysqli(server, username, password, db);
$session_username = $_SESSION['username'];

// پرس و جوی در دیتابیس برای دریافت اطلاعات کاربر
$sql = "SELECT * FROM users_db WHERE username = '$session_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // دریافت اطلاعات و ذخیره در متغیرها
    $row = $result->fetch_assoc();
    $tel = $row["tel"];
    $email = $row["email"];
    $name = $row["name"];
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
$sql3 = "SELECT * FROM  `queztions` WHERE username = '$session_username' AND q_type = 'queztion'";
$queztions = $conn->query($sql3);
    // دریافت اطلاعات و ذخیره در متغیرها
$queztion = $queztions->fetch_assoc();

$sql3 = "SELECT * FROM  `queztions` WHERE username = '$session_username' AND q_type = 'answer'";
$answers = $conn->query($sql3);
    // دریافت اطلاعات و ذخیره در متغیرها
$answer = $answers->fetch_assoc();
?>
<div class="nk-block">
                                <div class="row g-gs">
                                    
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-inner-group">
                                                
                                                <div class="card-inner">
                                                    <div class="user-card user-card-s2">
                                                        <div class="user-avatar lg bg-primary">
                                                            <img src="<?php echo user_avatar ?>" alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <!--<div class="badge bg-light rounded-pill ucap"><?php //echo print_access($session_username) ?></div>-->
                                                            <a href="<?php echo url."users/".$row_2["username"] ?>"><h5><span>سلام </span><?php echo $row_2["display_name"] ?> !</h5></a>
                                                            <span class="sub-text"><?php echo $email ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-inner card-inner-sm">
                                                    <h5 class="text-center">سطح شما : <?php echo level()["text"]."<br>".level()["icon"];  ?></h5>
                                                    <button type="button" class="btn btn-primary col-12 text-center" data-bs-toggle="modal" data-bs-target="#level_info"><strong class="text-center col-12">ویژگی های این سطح</strong></button>
                                                </div>
                                                <div class="card-inner">
                                                    <div class="row gy-3 justify-content-center text-center">
                                                        <div class="col">
                                                            <div class="profile-stats">
                                                                <span class="amount"><?php echo $row["coin"] ?></span>
                                                                <span class="sub-text">امتیاز</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="profile-stats">
                                                                <span class="amount"><?php echo $answers->num_rows ?></span>
                                                                <span class="sub-text">پاسخ ها</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="profile-stats">
                                                                <span class="amount"><?php echo $queztions->num_rows ?></span>
                                                                <span class="sub-text">سوال ها</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                                <form action="<?php echo url."WEB_C/".$_SESSION["WEB_C"]."/EDIT_PROFILE" ?>" method="post">
                                                    <div class="card-inner">
                                                    <h6 class="overline-title mb-2">اطلاعات پروفایل کاربری</h6>
                                                    <div class="row g-3">
                                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                                            <span class="sub-text">id شما در وبسایت</span>
                                                            <input type="text" dir="ltr"  class="form-control" id="account_id" value="<?php echo $row_2["account_id"] ?>" disabled>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                                            <span class="sub-text">نام نمایشی شما در وبسایت</span>
                                                            <input type="text" dir="auto"  name="display_name" class="form-control" id="display_name" value="<?php echo $row_2["display_name"] ?>">
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                                            <span class="sub-text">بیوگرافی</span>
                                                            <textarea dir="auto"  class="form-control"  id="bio" name="bio" cols="30" placeholder="آنچه میخواهید بقیه درباره شما بدانند را بنویسید ..." rows="10"><?php echo $row_2["discription"] ?></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary"><span class="text-center">بروزرسانی اطلاعات</span></button>
                                                        
                                                       
                                                    </div>
                                                </div><!-- .card-inner -->
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-xl-8">
                                        <div class="card">
                                        
                                        <div class="card-inner">
                                        <div class="col-12">
                                            <div class="bg-seconsary">
                                            <h4>
                                                مناسبت های پیش رو : 
                                            </h4>
                                            <p>
                                                <p>
                                                    عید نوروز
                                                    ،   
                                                    ماه رمضان


                                                </p>
                                            </p>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="">
                                            <div class="card-inner">
                                                <h4 class="text-dark">سوال ریاضی داری ؟ </h4>
                                                <a href="<?php echo url."add-queztion" ?>" class="btn  btn-danger col-12">توی تاپیک ها بنویسش</a>
                                                <div></div>
                                                <br>
                                                <a href="<?php echo url."math/ai" ?>" class="btn btn-warning col-12">از هوش مصنوعی بپرس</a>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="">
                                            <div class="card-inner">
                                            <h4 class="text-white">چیز مهمی باید یادت بمونه؟</h4>
                                                <a href="<?php echo url."note/list" ?>" class="btn  btn-secondary col-12">لیست یادداشت ها</a>
                                                <div></div>
                                                <br>
                                                <a href="<?php echo url."note/add" ?>" class="btn btn-primary col-12">افزودن یادداشت</a>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="">
                                            <div class="card-inner">
                                            <h4 class="text-white">میخوای ریاضیاتو حل کنی؟</h4>
                                                <a href="<?php echo url."math/assistant" ?>" class="btn  btn-secondary col-12">دستیار ریاضی</a>
                                                <div></div>
                                                <br>
                                                <a href="<?php echo url."math/nums_info" ?>" class="btn btn-info col-12">اطلاعات اعداد</a>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="">
                                            <div class="card-inner">
                                            <h4 class="text-white">میخای خودتو بسنجی ؟ </h4>
                                                <a href="<?php echo url."getaexam" ?>" class="btn  btn-secondary col-12">آزمون ها</a>
                                                <div></div>
                                                <br>
                                                <a href="<?php echo "https://ble.ir/eghtgrade_math_testing_bot" ?>" class="btn btn-danger col-12">ربات تست زنی</a>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div>
                                            </div><!-- .card-inner -->
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div>
                            
<?php


require_once(footer);
?>