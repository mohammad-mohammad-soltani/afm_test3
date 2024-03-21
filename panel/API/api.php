<?php
require_once(dirname(__DIR__)."/config/config.php");
require_once(dirname(__DIR__)."/config/db_config.php");
require_once(header);
$conn = new mysqli(server,username,password,db);
$sql = "SELECT * FROM `key_db` WHERE username = '".$_SESSION["username"]."'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

if($result->num_rows > 0){
    $requests_d = $row["requests"]/10;
?>
<div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        <div class="nk-content-body">
                        
                        <div class="col-xxl-11 mx-auto col-12 row">
                        <div class="col-xxl-6 col-md-6">
                                        <div class="card card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">آمار استفاده از API</h6>
                                                    </div>
                                                    <div class="card-tools me-n1 mt-n1">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner pt-0">
                                                <ul class="gy-4">
                                                    <li class="border-bottom border-0 border-dashed">
                                                        <div class="mb-1">
                                                            <span class="fs-2 lh-1 mb-1 text-head"><?php echo $row["requests"] ?> <span>/</span> 1000 </span>
                                                            <div class="sub-text"></div>
                                                        </div>
                                                        <div class="align-center">
                                                            <div class="small text-primary me-2"><?php echo $requests_d."%" ?></div>
                                                            <div class="progress progress-md rounded-pill w-100 bg-primary-dim">
                                                                <div class="progress-bar bg-primary rounded-pill" data-progress="<?php echo $requests_d ?>" style="width: 54%;"></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </li><!-- li -->
                                                   
                                                    
                                                </ul>
                                            </div>
                                        </div><!-- .card -->
                                    </div>
                        <div class="col-xxl-6 col-md-6">
                                        <div class="card card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">API شما</h6>
                                                    </div>
                                                    <div class="card-tools me-n1 mt-n1">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner pt-0">
                                                <div class="API_content col-12 mx-auto">
                                                    <ul>
                                                    <div class="row g-gs">
                                                        <li class="col-10">
                                                        <input id="api-placeholder_2" type="text" class="form-control" value="<?php echo $row["api"] ?>" disabled>
                                                        <span  id="api_copyer" style="opacity : 0%;"><?php echo $row["api"] ?></span>
                                                        
                                                        </li>
                                                        <li class="col-2">
                                                        <button class="btn btn-sm btn-icon clipboard-init" title="کپی کردن API" data-clipboard-target="#api_copyer" data-clip-success="<em class='icon ni ni-copy-fill'></em>" data-clip-text="<em class='icon ni ni-copy'></em>">
                                                                                        <span class="clipboard-text"><em class="icon ni ni-copy"></em></span>
                                                                                    </button>     
                                                        </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div>
                                    </div>
                                    <br>
                        <div class="col-xxl-11 mx-auto col-12">
                                        <div class="card card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">راهنمای استفاده از api</h6>
                                                    </div>
                                                    
                                                        
                                                    
                                                    <div class="card-tools me-n1 mt-n1">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner pt-0">
                                            <div class="item1">
                                            <h6 class="title"><em class="icon ni ni-curve-down-right"></em><span>تولید پاسخ با هوش مصنوعی بر اساس الگو</span></h6>
                                                <p>شما میتوانید برای استفاده از api خودتان از ساختار زیر استفاده نمایید .</p>
                                                <br>
                                                
                                                
                                                <div dir="ltr" >
                                                    <h6>
                                                        <code>
                                                        <span dir="ltr"><?php echo url."API/AI?api=".$row["api"]."&"."p={prampet}"."&"."n_1="."{num_1}"."&"."n_2="."{num_2}&save={save:bool}" ?></span>
                                                        </code>
                                                    </h6>
                                                </div>
                                                <br>
                                                <h6 class="title">مقادیر</h6>
                                                <p>{num_1},{num_2} : متغیر هایی هستند که در پرامپت شما وارد میشوند.این مقادیر اختیاری هستند</p>
                                                <p>{pramper} : شماره پرامپتی که  میخواهید استفاده نمایید که باید به صورت عددی از 0 تا 5 باشد</p>
                                                <p>{save:bool} اگر شما این مقدار را برابر با true قرار دهید پاسخ ایجاد شده در یادداشت های شما ذخیره خواهد شد</p>
                                                <br>
                                                <h6 class="title">پروتکل ها</h6>
                                                <p>شما برای استفاده از این API میتوانید از پروتکل های زیر استفاده نمایید:</p>
                                                <div dir="ltr">
                                                <h6>
                                                <code>
                                                    HTTP : GET
                                                    <br>
                                                    HTTP : POST
                                                </code>
                                                </h6>
                                                </div>
                                                <br>
                                                <p>شما میتوانید از پروژه ما در برنامه های محاسباتی خود استفاده نمایید</p>
                                                <br>
                                                <div class="example-alert">
                                                        <div class="alert alert-fill alert-primary alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em> <strong>نکته:</strong>شما از ابتدای ماه تا انتهای آن فقط میتوانید <strong>1000</strong>درخواست برای این <strong>API</strong>بفرستید و پس از آن درخواست های شما پاسخ داده نمیشوند.
                                                        </div>
                                                    </div>
                                            </div>
                                            <br>
                                            <div class="item2">
                                            <h6 class="title"><em class="icon ni ni-curve-down-right"></em><span>مشاهده یکی از پرامپت های اکانت شما</span></h6>
                                                <p>با استفاده از این api شما میتوانید برای دریافت مقدار یکی از پرامپت های خود اقدام نمایید</p>
                                                <br>
                                                
                                                
                                                <div dir="ltr" >
                                                    <h6>
                                                        <code>
                                                        <span dir="ltr"><?php echo url."API/PROMPT_info?api=".$row["api"]."&"."p={prampet}" ?></span>
                                                        </code>
                                                    </h6>
                                                </div>
                                                <br>
                                                
                                                <h6 class="title">پروتکل ها</h6>
                                                <p>شما برای استفاده از این API میتوانید از پروتکل های زیر استفاده نمایید:</p>
                                                <div dir="ltr">
                                                <h6>
                                                <code>
                                                    HTTP : GET
                                                    <br>
                                                    HTTP : POST
                                                </code>
                                                </h6>
                                                </div>
                                                <br>
                                                
                                                <br>
                                                <div class="example-alert">
                                                        <div class="alert alert-fill alert-primary alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em>نکته : پرامپت باید فقط و فقط به صورت <strong>int(عدد)</strong>وارد شود 
                                                        </div>
                                                    </div>
                                            </div>
                                            <br>
                                            <div class="item3">
                                            <h6 class="title"><em class="icon ni ni-curve-down-right"></em><span>ویرایش پرامپت اکانت شما</span></h6>
                                                <p>شما میتوانید برای ویرایش مقدار یکی از پرامپت های خود از این وبسرویس استفاده نمایید </p>
                                                <br>
                                                
                                                
                                                <div dir="ltr" >
                                                    <h6>
                                                        <code>
                                                        <span dir="ltr"><?php echo url."API/edit_PROMPT?api=".$row["api"]."&"."p={prampet}&text={text}" ?></span>
                                                        </code>
                                                    </h6>
                                                </div>
                                                <br>
                                                <h6 class="title">مقادیر</h6>
                                                
                                                <p>{pramper} : شماره پرامپتی که  میخواهید استفاده نمایید که باید به صورت عددی از 0 تا 5 باشد</p>
                                                <p>{text} متنی که میخواهید جایگزین پرامپت انتخاب شده شود</p>
                                                <br>
                                                <h6 class="title">پروتکل ها</h6>
                                                <p>شما برای استفاده از این API میتوانید از پروتکل های زیر استفاده نمایید:</p>
                                                <div dir="ltr">
                                                <h6>
                                                <code>
                                                    HTTP : GET
                                                    <br>
                                                    HTTP : POST
                                                </code>
                                                </h6>
                                                </div>
                                                <br>
                                                
                                                <br>
                                                <div class="example-alert">
                                                        <div class="alert alert-fill alert-primary alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em>نکته : پرامپت باید فقط و فقط به صورت <strong>int(عدد)</strong>وارد شود 
                                                        </div>
                                                    </div>
                                            </div>
                                                
                                            </div>
                                        </div><!-- .card -->
                                    </div>
                                    </div>
                                    </div>
                                    
                                    <script>
  function copyText(id) {
    var textToCopy = document.getElementById(id).value;
    navigator.clipboard.writeText(textToCopy).then(function() {
      
    }, function(err) {
      console.error("خطا در کپی متن: ", err);
    });
  }
</script>
<?php
}else {
    ?>
    
    <div class="col-xxl-4 col-md-6">
                                        <div class="card card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title mx-auto">
                                                        <h6 class="title " id="api_title">شما کلید API فعال ندارید</h6>
                                                    </div>
                                                    <div class="card-tools me-n1 mt-n1">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner pt-0">
                                                
                                                <div id="create_api" class="col-8  mx-auto">
                                                    <button onclick="create_api()" class="btn btn-danger col-12"><span class="mx-auto">یک API ایجاد کنید!</span></button>
                                                </div>
                                                <div id="api_content" class="col-8 mx-auto">
                                                    <br>
                                                    
                                                    <input type="text" dir="ltr" id="api_paceholder" class="form-control col-12" disabled>
                                                </div>
                                                
                                            </div>
                                        </div><!-- .card -->
                                    </div>
                                    
                                    <style>
                                        #api_content {
                                            display : none;
                                        }
                                    </style>
                                    <script>
                                        

                                        function create_api() {
    document.getElementById("create_api").style.display = "none";
    document.getElementById("api_title").innerHTML = "API شما ایجاد شد ! برای مدیریت یکبار صفحه را باز نشانی کنید";
    new Promise((resolve, reject) => {

        $.post('<?php echo url; ?>API/create_api.php', {
            username: '<?php echo $_SESSION["username"] ?>'
        }, function (data) {
            document.getElementById("api_content").style.display = "block";
            document.getElementById("api_paceholder").value = data;
        });
    });
}
                                        
                                        
                                    </script>
    <?php

}

?>
<?php
$conn ->close();
require_once(footer);