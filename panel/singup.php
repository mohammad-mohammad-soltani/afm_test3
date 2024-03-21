<?php
require_once ('config/config.php');
require_once(login_check_dir);
if (isset($_GET['redirect'])) {
    $redirect=true;
}else{
    $redirect = false;
}

?>

<!DOCTYPE html>
<html lang="fa" class="js">

<head>
<script>
    let url = <?php echo url ?>
</script>
    <link rel="stylesheet" href="<?php echo url ?>assets/css/dashlite.rtl.css?ver=3.2.3">
    <link id="skin-default" rel="stylesheet" href="<?php echo url ?>assets/css/theme.css?ver=3.2.3">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">

    
    <style>
       
       body {
    background-image: url(<?php echo back_ground; ?>);
    background-size: cover; /* یا contain */
    background-position: center center;
    background-repeat:repeat-y;
}

a{
    text-decoration: none;
}

    </style>
  
</head>
<body dir="rtl">

<div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs ">
                        <div class="brand-logo pb-4 text-center">

                           
                                <h5 class="text-white">دستیار هوش مصنوعی AFM</h5>
                                
                           
                        </div>
                        <div class="card is-dark text-white"
                        style="
                        backdrop-filter: blur(10px);
    background-color: #ffffff05;
    "
                        >
                            <div class="card-inner card-inner-lg">
                                
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">ثبت نام</h4>
                                        <div class="nk-block-des">
                                            <p>باایجاد حساب کاربری از خدمات AFM بهره ببرید</p>
                                        </div>
                                        <?php
                                        if(isset($_GET["false"])){
                                            ?>
                                            <span class="alert text-danger">حساب دیگری با اطلاعات وارد شده وجود دارد ...</span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <form action= <?php echo sing_up?> method="post" >
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="usernamevalid">نام کاربری</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control " id="usernamevalid" name="user" placeholder="نام کاربری خود را وارد نمایید">
                                            
                                            <span class="username_span_valid"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="usernamevalid">کلمه عبور</label>
                                            <!--<a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot Code?</a>-->
                                        </div>
                                        <div class="form-control-wrap">
                                            <!--<a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>-->
                                            <input type="password" class="form-control " id="passwordvalid" name="pass" placeholder="کلمه عبور خود را وارد نمایید">
                                            
                                            <span class="password_span_valid" style="display: none"></span>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email">ایمیل</label>
                                            <!--<a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot Code?</a>-->
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control " id="email" name="email" placeholder="ایمیل خود را وارد نمایید">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="tel">شماره تلفن</label>
                                            <!--<a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot Code?</a>-->
                                        </div>
                                        <div class="form-control-wrap">
                                           
                                            <input type="tel" class="form-control form-control-sm" id="tel" name="tel" placeholder="شماره تلفن خود را وارد نمایید">
                                            
                                            
                                        
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">ثبت نام کنید</button>
                                    </div>
                                </form>
                               
                                <div class="form-note-s2 text-center pt-4">آیا حساب کاربری دارید ؟ <a href="<?php echo url."auth/login" ?>">وارد شوید</a>
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
                <!-- wrap @e -->
            </div>
</body>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo main_url_2 ?>assets/js/bundle.js?ver=3.2.3"></script>
    <script src="<?php echo main_url_2 ?>assets/js/scripts.js?ver=3.2.3"></script>
    

     

    <script src="<?php echo url ?>singup_form_valid.js"></script>
</html>
