<?php
require_once(dirname(__DIR__) . '/config/config.php');
require_once(dirname(__DIR__) . '/config/db_config.php');
require_once(login_check_dir);
require_once(header);

// تابع برای خواندن از دیتابیس
$sql = new mysqli(server, username, password, db);
function prampet_read($column_name)
{
    global $sql;
    $username = $_SESSION['username'];
    $result = $sql->query("SELECT $column_name FROM users_db WHERE username = '$username'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row[$column_name];
    }
    return '...';
}



if (isset($_POST['p1'])) {
    $p1 = htmlspecialchars($_POST['p1']);
    $username = $_SESSION['username'];
    $sql->query("UPDATE users_db SET prampet1 = '$p1' WHERE username = '$username'");
}

if (isset($_POST['p2'])) {
    $p2 = htmlspecialchars($_POST['p2']);
    $username = $_SESSION['username'];
    $sql->query("UPDATE users_db SET prampet2 = '$p2' WHERE username = '$username'");
}

if (isset($_POST['p3'])) {
    $p3 = htmlspecialchars($_POST['p3']);
    $username = $_SESSION['username'];
    $sql->query("UPDATE users_db SET prampet3 = '$p3' WHERE username = '$username'");
}

if (isset($_POST['p4'])) {
    $p4 = htmlspecialchars($_POST['p4']);
    $username = $_SESSION['username'];
    $sql->query("UPDATE users_db SET prampet4 = '$p4' WHERE username = '$username'");
}

if (isset($_POST['p5'])) {
    $p5 = htmlspecialchars($_POST['p5']);
    $username = $_SESSION['username'];
    $sql->query("UPDATE users_db SET prampet5 = '$p5' WHERE username = '$username'");
}

if (isset($_POST['text'])) {
    $text = htmlspecialchars($_POST['text']);
    $username = $_SESSION['username'];
    $sql->query("UPDATE users_db SET text_variable = '$text' WHERE username = '$username'");
}



if (login_check()) {
    function get_title()
    {
        echo 'ناحیه کاربری';
    }

    function get_hight()
    {
        echo '1570px';
    }

    
    ?>
    <style>
        .heading {
            text-align: center;
            margin-top: 5%;
            font-size: 17pt;
            line-height: 1.5px;
        }

        .span2 {
            text-align: right;
            margin-top: 5%;
            font-size: 22pt;
        }

        .form1 .form-control,
        span {
            margin-right: 0%;
        }

        #btn {
            margin-right: 45%;
        }

        #p {
            font-size:;
        }
    </style>
    <!--code-->
    <h1 class="heading">در اینجا لیست پرامپت های شما قرار دارد</h1>
    <br>
    <p class="text-center">شما میتوانید از برخی متغیر ها در پرامپت خود استفاده کنید.برای مشاهده آنها روی این دکمه کلیک کنید <button type="button" class="btn btn-primary text-center mx-auto" data-bs-toggle="modal" data-bs-target="#variables">لیست متغیرها</button></p>
        <!-- Modal Trigger Code -->


<!-- Modal Content Code -->
<div class="modal fade" tabindex="-1" id="variables">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">لیست متغیر های قابل استفاده</h5>
            </div>
            <div class="modal-body">
                <p>شما میتوانید در درخواست های خود از یک سری متغیر ها استفاده کنید تا هنگام ارائه جواب ، شناسایی و جایگذاری شوند متغیر هایی که میتوانید استفاده کنید عبارت اند از: </p>
                <ol>
                    <li><span dir="ltr" > %n1% , %n2% : </span><p>این متغیر ها متغیر های عددی هستند که شما در حین دریافت پاسخ میتوانید آن ها را وارد نمایید</p></li>
                    <li><span>%name% : </span><p>این متغیر حاوی اسم حساب کاربری شما است</p></li>
                    <li><span>%last% : </span><p>این متغیر آخرین جوابی که از هوش مصنوعی دریافت کره اید را به همراه دارد</p></li>
                </ol>
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text text-right">باتشکر ....محمد محمد سلطانی</span>
            </div>
        </div>
    </div>
</div>

    <form class="form1" action="<?php echo url."ai_manage"; ?>" method="post">
        <span class='span2'>پرامپت 1</span>
        <br>
        <textarea class="form-control" dir="auto" name="p1" placeholder="پرامپت اول" id="" cols="100%"
                  rows="5"><?php echo prampet_read('prampet1') ?></textarea>
        <br>
        <span class='span2'>پرامپت 2</span>
        <br>
        <textarea class="form-control" dir="auto" name="p2" placeholder="پرامپت دوم" id="" cols="100"
                  rows="5"><?php echo prampet_read('prampet2') ?></textarea>
        <br>
        <span class='span2'>پرامپت 3</span>
        <br>
        <textarea class="form-control" dir="auto" name="p3" placeholder="پرامپت سوم" id="" cols="100"
                  rows="5"><?php echo prampet_read('prampet3') ?></textarea>
        <br>
        <span class='span2'>پرامپت 4</span>
        <br>
        <textarea class="form-control" dir="auto" name="p4" placeholder="پرامپت چهارم" id="" cols="100"
                  rows="5"><?php echo prampet_read('prampet4') ?></textarea>
        <br>
        <span class='span2'>پرامپت 5</span>
        <br>
        <textarea class="form-control" dir="auto" name="p5" placeholder="پرامپت پنجم" id="" cols="100"
                  rows="5"><?php echo prampet_read('prampet5') ?></textarea>
        <br>
        <span class='span2'>متن ثابت</span>
        <br>
        <textarea class="form-control" dir="auto" name="text" id="" cols="100"
                  rows="5" placeholder="متنی را وارد کنید که از این به بعد به آخر پیام هایتان اضافه شود"><?php echo prampet_read('text_variable') ?></textarea>
        <br>
        <button type="submit" id="btn" class="btn btn-primary">ذخیره تنظیمات</button>
    </form>
    <!--code-->
    <?php
    require_once(footer);

} else {
    header('location: ' . login_page . '?redirect');
}
?>
<style>
   
    
    @media screen and (max-width : 780px){
        textarea {
            width: 38%;
        }
    }
</style>
<?php

