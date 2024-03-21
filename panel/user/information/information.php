<?php
require_once(dirname(dirname(__DIR__))."/config/config.php");
require_once(dirname(dirname(__DIR__))."/config/db_config.php");
require_once(header);
$servername = server;
$username = username;
$password = password;
$dbname = db;

$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}
$id = userinfo_init();

$sql = "SELECT * FROM profile_db WHERE account_id = '$id'";
$result = $conn->query($sql);
if($result -> num_rows > 0){
    $row = $result->fetch_assoc();

$sql2 = "SELECT * FROM users_db WHERE username = '".$row["username"]."'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$rusername = $row["username"];
$sql3 = "SELECT * FROM  `queztions` WHERE username = '$rusername' AND q_type = 'answer'";
$answers = $conn->query($sql3);
    // دریافت اطلاعات و ذخیره در متغیرها
$answer = $answers->fetch_assoc();
$sql3 = "SELECT * FROM  `queztions` WHERE username = '$rusername' AND q_type = 'queztion'";
$queztions = $conn->query($sql3);
    // دریافت اطلاعات و ذخیره در متغیرها
$queztion = $queztions->fetch_assoc();
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
                                                            <h5><span></span><?php echo $row["display_name"]; 
                                                            if($row2["access"] == "adminstrator" || "developer"){ 
                                                                echo  '<span>  </span><i class="bi bi-person-check-fill"></i>' ;
                                                                } ?> </h5>
                                                            <span class="sub-text"><?php echo $email ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="card-inner">
                                                    <div class="row gy-3 justify-content-center text-center">
                                                        <div class="col">
                                                            <div class="profile-stats">
                                                                <span class="amount"><?php echo $row2["coin"] ?></span>
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
                                                <div class="card-inner">
                                                    <h6 class="overline-title mb-2">اطلاعات پروفایل کاربری</h6>
                                                    <div class="row g-3">
                                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                                            <span class="sub-text text-white">آی دی : </span>
                                                            <span><?php echo $row["account_id"]; ?></span>
                                                           
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                                        <span class="sub-text text-white">نام نمایشی </span>
                                                            <span><?php echo $row["display_name"]; ?></span>
                                                            
                                                        </div>
                                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                                            <span class="sub-text text-white">بیوگرافی</span>
                                                            <div class="" id="bio">
                                                             <?php echo $row["discription"] ?>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        
                                                       
                                                    </div>
                                                </div><!-- .card-inner -->
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-xl-8">
                                        <div class="card">
                                        
                                        <div class="card-inner">
                                        <div class="nk-block">
                                            <span> سوالات پرسیده شده توسط <?php echo $row["display_name"] ?> : </span>
                                            <br>
                                            <br>
                                            <div id="queztions"></div>
                            </div>
                                            </div><!-- .card-inner -->
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div>

                            <style>
                                .text-left{
                                    text-align: left;
                                }
                            </style>
                            <?php
}else{
    ?>
    <div class="alert alert-info alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em>کاربری با ID : <?php echo $id ?>وجود ندارد 
                                                        </div>
    <?php
}

require_once(footer);
?>
<script>
    new Promise((resolve, reject) => {
            // استفاده از jQuery برای ارسال درخواست GET
            $.post('<?php echo url; ?>queztion/queztions.php', { 
                username : '<?php echo $row["username"] ?>'
            }, function (data) {
                // در اینجا نتیجه دریافت شده به عنوان پارامتر resolve تابع Promise منتقل می‌شود.
                document.getElementById("queztions").innerHTML = data;
                
            });
        });
</script>