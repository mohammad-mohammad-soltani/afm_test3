<?php
require_once ('config/config.php');

require_once(login_check_dir);
if (isset($_GET['redirect'])) {
    $redirect=true;
}else{
    $redirect = false;
}

?>
<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="mohammad mohammad soltani">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="math - ai - ai for math - math ai - sadat ai - mohammad mohammad soltani - هوش مصنوعی - هوش مصنوعی رایگان - ریاضی - ماشین حساب - حل سوالات ریاضی - هوش مصنوعی AFM ">
    <meta name="description" content="afm - power full math ai">
    <meta name="description" content="پلتفرم AFM، یک هوش مصنوعی برای پاسخ به سوالات ریاضی است. از ساده‌ترین مسائل تا پیچیده‌ترین مفاهیم ریاضی، ما آماده پاسخگویی به سوالات شما هستیم.">
    <!-- title -->
    <title>AFM - دستیار هوش مصنوعی برای ریاضی</title>
    <!-- Favicon -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo url ?>assets/css/dashlite.rtl.css?ver=3.2.3">
    <link id="skin-default" rel="stylesheet" href="<?php echo url ?>assets/css/theme.css?ver=3.2.3">
<?php

   


?>
    <title>وارد شوید!</title>
    <style>
        
        body {
    background-image: url(<?php echo get_imges(); ?>);
    background-size: cover; /* یا contain */
    background-position: center center;
    background-repeat:repeat-y;
}

    </style>
  </head>
  <body>
    <?php 
    
    function get_imges(){
        global $url;
        if (!isset($url)) {
            $url= back_ground;
        }
        echo $url;
    }
    ?>
    <!--<img class="background" src="" alt="">-->
    <?php
    if (!login_check()) {
        
        
    
    
    ?>
<!-- content @s -->
<div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs ">
                        <div class="brand-logo pb-4 text-center">

                            <a class="logo-link">
                                <h5 class="text-white">دستیار هوش مصنوعی AFM</h5>
                                <div class="col-lg-12">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2024 AFM.ساخته شده توسط محمد محمد سلطانی</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card is-dark text-white" style="
    backdrop-filter: blur(10px);
    background-color: #ffffff05;
">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">ورود</h4>
                                        <div class="nk-block-des">
                                            <p>وارد شوید و از امکانات دستیار هوش مصنوعی AFM لذت ببرید</p>
                                        </div>
                                        
                                        <?php
                                        if(isset($_GET["false"])){
                                            ?>
                                            <span class="alert text-danger">حسابی با  اطلاعاتی که وارد کرده اید وجود ندارد</span>
                                            <?php
                                        }
                                        if(isset($_GET["no_activated"])){
                                            
                                            header("location: ".url."auth/singup/active_account?U=".$_GET["user"]);
                                        }
                                        ?>
                                    </div>
                                </div>
                                <form action= <?php echo login_check?> method="post" >
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">نام کاربری</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="default-01" name="user" placeholder="نام کاربری خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">کلمه عبور</label>
                                            <!--<a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot Code?</a>-->
                                        </div>
                                        <div class="form-control-wrap">
                                            <!--<a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>-->
                                            <input type="password" class="form-control form-control-lg" id="password" name="pass" placeholder="کلمه عبور خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">وارد شوید</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> حساب کاربری ندارید؟ <a href="<?php echo url."auth/singup" ?>">ثبت نام کنید</a>
                                </div>
                                <div class="text-center pt-4 pb-3">
                                    <h6 class=" overline-title-sap"><span>AFM را در پیامرسان ها دنبال کنید</span></h6>
                                </div>
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item"><a class="link link-primary fw-normal py-2 px-3" href="https://ble.ir/@fm_channel">بله</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    
                </div>
                <!-- wrap @e -->
            </div>
    
    
        <?php }elseif (login_check()) {
            header('location: '.dashboard);
           
        }
    
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  </body>
</html>
<?php

// بررسی وضعیت سشن
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // سشن فعال نیست، شروع یک سشن جدید
}

// بررسی آیا پارامتر exit در URL وجود دارد
if (isset($_GET['exit'])) {
    // خروج کاربر و حذف اطلاعات سشن
    session_unset(); // حذف تمام متغیرهای سشن
    session_destroy(); // حذف سشن

    // انتقال به صفحه خروج یا صفحه لاگین دیگری (مثلاً index.php)
   
    exit();
}
?>


