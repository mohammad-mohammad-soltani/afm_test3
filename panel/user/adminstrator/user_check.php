<?php
require_once (dirname(dirname(__DIR__)).'/config/db_config.php');
require_once (dirname(dirname(__DIR__)).'/config/config.php');
require_once (dirname(dirname(__DIR__)).'/config/function.php');
?>
<html>
    
    <head>
    <head>
        
        <link rel="stylesheet" href="<?php echo main_url ?>assets/css/dashlite.rtl.css?ver=3.2.3">
    
   
    <link rel="stylesheet" href="<?php echo main_url ?>editor/editor-style.css">
    
     <!-- FontAwesome Icons --> 
    <link rel="stylesheet" type="text/css" href="<?php echo url ?>assets/css/libs/fontawesome-icons.css"> 
    
    <!-- Themify Icons --> 
    <link rel="stylesheet" type="text/css" href="<?php echo url ?>assets/css/libs/themify-icons.css"> 
    
    <!-- Bootstrap Icons --> 
    <link rel="stylesheet" type="text/css" href="<?php echo url ?>assets/css/libs/bootstrap-icons.css"> 
    <link id="skin-default" rel="stylesheet" href="<?php echo main_url ?>assets/css/theme.css?ver=3.2.3">
    
            <title id="title"></title>
        </head>
        <title id="title"></title>
    </head>
<?php

if(admin()){
$servername = server;
$username = username;
$password = password;
$dbname = db;
?>
<style>
    .btn{
        width: 33%;
    }
</style>
<?php
$conn = new mysqli($servername, $username, $password, $dbname);

// چک کردن اتصال
if ($conn->connect_error) {
    die("اتصال به پایگاه داده انجام نشد: " . $conn->connect_error);
}

// استفاده از SQL برای دریافت اطلاعات کاربران
$sql = "SELECT id, username, password, email, tel,access FROM users_db WHERE id = '".$_GET['id']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // خروجی داده‌ها در جدول HTML
    
    while ($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $password = $row["password"];
        $email = $row["email"];
        $tel = $row["tel"];
        $access = $row["access"];
        if ($tel == null){
            $tel = "ندارد";
        }
        if ($email == null){
            $email = "ندارد";
        }
        
    }
    ?>
    
    <body class="bg-dark is-dark" dir="rtl">
       <div class="user card bg-seccondary is-dark col-6 mx-auto text-center row">
        <form action="change.php" method="post"  >
        <label class="l">نام کاربری</label>
        <br>
        <input type="text" class="form-control"  value="<?php echo $username ?>" name="user">
        <br>
        <label class="l">کلمه عبور</label>
        <br>
        <input type="text" class="form-control"   value="<?php echo $password ?>" name="pass">
        <br>
        <label class="l">تلفن</label>
        <br>
        <input type="text" class="form-control"   value="<?php echo $tel ?>" name="tel">
        <br>
        <label class="l">ایمیل</label>
        <br>
        <input type="text" class="form-control"   value="<?php echo $email ?>" name="email" >
        <br>
        <label class="l">سطح دسترسی</label>
        <br>
        <input type="text" class="form-control"   value="<?php echo $access ?>" name="access" >
        <br>
        <input type="text" name="id" style="display : none;" value = "<?php echo $_GET['id'] ?>">

        
        <button type="submit" class="btn btn-primary col-6" >ذخیره</button>
        <button onclick="window.close()"class="btn btn-primary col-6" >بستن</button>
        
        <br>
        <br>
        <a href="delet.php?id=<?php echo $_GET['id'] ?>" class="btn btn-danger col-12" >حذف کاربر</a>
        
        </form>
       </div>
       
    </body>
    
    
    </html>
    <script>
        document.getElementById("title").innerHTML =  <?php echo $username?> 
    </script>
    <?php
} else {
    ?>
    <script>
        document.getElementById("title").innerHTML = "خطای پردازش";
    </script>
    <?php
    echo "هیچ کاربری یافت نشد.";
    
}
?>


<?php
}else{
    ?>
    <h1>403</h1>
   
    <?php
}
?>