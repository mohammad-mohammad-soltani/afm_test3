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

body {
  overflow: hidden; /* Hide scrollbars */
}
    </style>
  
</head>
<body dir="rtl">
<?php
if(isset($_GET["U"])){
    $conn = new mysqli(server,username,password,db);
    $username = $_GET["U"];
    $sql = "SELECT * FROM users_db WHERE username = '$username' ";
    $result = $conn->query($sql);
    if($result -> num_rows > 0 ){
        $row = $result -> fetch_assoc();
        if($row["active"] == "true"){
            header("location: ".login_page);
        }
    }
    ?>
    <div class="nk-content ">
                        <div class="nk-block nk-block-middle nk-auth-body  wide-xs ">
                            <div class="brand-logo pb-4 text-center">
    
                               
                                    <h5 class="text-white">دستیار هوش مصنوعی AFM</h5>
                               
                            </div>
                            <div class="card is-dark text-white" style="
    backdrop-filter: blur(10px);
    background-color: #ffffff05;
">
                                <div class="card-inner card-inner-lg">
                                    
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">تایید حساب کاربری</h4>
                                            <div class="nk-block-des">
                                                <p>با تایید حساب کاربری از تمامی امکانات AFM به صورت رایگان بهره ببرید</p>
                                            </div>
                                            <?php
                                            if(isset($_GET["false"])){
                                                ?>
                                                <span class="alert text-danger">کد تایید وارد شده با کد تایید ارسال شده مطابقت ندارد</span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <form action= <?php echo active_account."?username=".$_GET["U"]?> method="post" >
                                    <p>
                                        کد تایید 6 قمی به شماره تلفنی که هنگام ثبت نام وارد کرده اید ارسال شده است .
                                    </p>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label class="form-label" for="usernamevalid">کد تایید</label>
                                            </div>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" style="font-size: 15pt" id="usernamevalid" name="code" placeholder="کد تایید 6 رقمی">
                                                
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                            <button class="btn btn-lg btn-primary btn-block">حساب خود را تایید کنید</button>
                                        </div>
                                    </form>
                                   
                                 <br>
                                 
                                 <br>
    
                                    
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
                        <div class="nk-footer nk-auth-footer-full">
                            <div class="container wide-lg">
                                <div class="row g-3">
                                    <div class="col-lg-6 order-lg-last">
                                        <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                            <li class="nav-item">
                                                <a class="link link-primary fw-normal py-2 px-3" href="#">Terms & Condition</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="link link-primary fw-normal py-2 px-3" href="#">Privacy Policy</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="link link-primary fw-normal py-2 px-3" href="#">Help</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="nk-block-content text-center text-lg-left">
                                            <p class="text-soft">&copy; 2024 AFM.ساخته شده توسط محمد محمد سلطانی</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- wrap @e -->
                </div>
    <?php
        $conn = new mysqli(server,username,password,db);
        $username = $_GET["U"];
        $sql = "SELECT * FROM users_db WHERE username = '$username' ";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
           
        $row = $result -> fetch_assoc();
        if(!isset($_GET["false"])){
            send_verfication_code($row["tel"],$row["username"]);
        }
        //send_verfication_link($row["tel"]);
        }else{
            header("locaion ".login_page);
        }
}else{
    header("location: ".loginpage);
}
?>
</body>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo main_url_2 ?>assets/js/bundle.js?ver=3.2.3"></script>
    <script src="<?php echo main_url_2 ?>assets/js/scripts.js?ver=3.2.3"></script>
    

     

</html>
