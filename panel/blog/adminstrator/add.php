<?php
require_once(dirname(dirname(__DIR__))."/config/config.php");
require_once(dirname(dirname(__DIR__))."/config/db_config.php");
require_once(dirname(dirname(__DIR__))."/config/function.php");
require_once(dirname(dirname(__DIR__))."/markdown/vendor/erusev/parsedown/Parsedown.php");
$Parsedown = new Parsedown();
if(writer()){
    if(isset($_POST["new_code"])){
        $code = $_POST["new_code"];
        $name = $_POST["new_name"];
        $img = $_POST["new_image_link"];
        $c = $_POST["new_c"];
        $main_text = $_POST["new_main_text"];
        $conn = new mysqli(server,username,password,db);
        $time = time();
        if($_POST["is_sh"] == "yes"){
            $is_show = "yes";
        }else{
            $is_show = "no";
        }
        $text = $conn -> real_escape_string($code);
                    $code = $Parsedown -> text($text);
        $sql = "UPDATE `posts_db` SET `show`='$is_show',`timeofc`='$time',`by_name`='$c',`title`='$name',`main_img`='$img',`text`='$code',`main_text`='$main_text' WHERE `id`='".$_GET["edit"]."'";
        $conn->query($sql);
        $conn->close();

        header("location: ".url."posts");
    }
    if(isset($_POST["code"])){
        require_once(dirname(dirname(__DIR__))."/config/db_config.php");
            $conn = new mysqli(server,username,password,db);
            
            
            $name = $_POST["name"];
            $creator_name = $_POST["c"];
            $main_text = $_POST["main_text"];
            // آپلود تصویر
            $target_dir = dirname(__DIR__)."/"."upload/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // بررسی اعتبار تصویر 
            if(isset($_GET["submit"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false) {
                    echo "تصویر معتبر است - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "فایل انتخابی یک تصویر نیست.";
                    $uploadOk = 0;
                }
            }

            // بررسی از قبل وجود داشتن تصویر با همین نام
            if (file_exists($target_file)) {
                echo "متاسفانه فایل با این نام از قبل وجود دارد.";
                $uploadOk = 0;
            }

            // اندازه حداکثر تصویر را محدود کنید، به عنوان مثال، حداکثر 1MB
            

            // اجازه فرمت‌های تصویر مورد قبول (مثلاً JPEG و PNG)
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "متاسفانه تنها فرمت‌های JPG, JPEG, PNG پشتیبانی می‌شود.";
                $uploadOk = 0;
            }

            // بررسی آیا $uploadOk برابر 1 است (یعنی مشکلی در آپلود نیست)
            if ($uploadOk == 0) {
                echo "متاسفانه تصویر آپلود نشد.";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "تصویر با موفقیت آپلود شد.";
                    $id = null;
                    $time=time();
                    if($_POST["is_sh"]=="yes"){
                        $show = "yes";
                    }else{
                        $show = "no";
                    }
                    $text = $conn -> real_escape_string($_POST["code"]);
                    $text = $Parsedown -> text($text);
            // افزودن یادداشت به دیتابیس
            $insert_sql = "INSERT INTO `posts_db`(`id`, `show`, `timeofc`, `by_name`, `title`, `main_img`, `text`, `main_text`) VALUES (NULL,'$show','".$time."','".$creator_name."','".$name."','".url."blog/upload/".basename($_FILES["image"]["name"])."','".$text."','".$_POST["main_text"]."')";
            $stmt = $conn->query($insert_sql);
            
                } else {
                    echo "خطا در آپلود تصویر.";
                }
            }
           header("location: ".url."posts");

    }elseif(isset($_GET["edit"])){
        require_once(header);
        $conn = new mysqli(server,username,password,db);

        $sql = "SELECT * FROM posts_db WHERE `id`='".$_GET["edit"]."'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8">
                    <h5><label for="">کد HTML مقاله</label></h5>
                    <br>
                    <div id="post_tools" class="row">
                        
                        <div class="col-2">
                        <button type="button" class="col-12 btn btn-primary" id="img" ><span class="text-center">تصویر</span></button>
                        </div>
                        
                        <div class="col-2">
                        <button type="button" class="col-12 btn btn-primary" id="link" ><span class="text-center">لینک</span></button>
                        </div>
                        
                    </div>
                    <br>
                    <textarea dir="ltr" name="new_code"  id="code_text" class="form-control" cols="30" placeholder="کد HTML مقاله خود را در اینجا وارد نمایید" rows="24"><?php echo $row["text"] ?></textarea>
                </div>
                <div class="col-4 row ">
                    <div class="">
                        <br>
                        <h5 class="col-12 text-center text-dark"><label for="new_name">نام مقاله</label></h5>
                        <br>
                        <input type="text" class="form-control col-10" placeholder="نام مقاله را وارد نمایید" name="new_name"  value="<?php echo $row["title"] ?>">
                    </div>
                    <div class="">
                            <br>
                            <h5 class="col-12 text-center text-dark"><label for="name">نام ایجاد کننده مقاله</label></h5>
                            <br>
                            <input type="text" class="form-control col-10" placeholder="نام ایجاد کننده مقاله" name="new_c" id="" value="<?php echo $row["by_name"] ?>">
                            <input style="display:none;" type="text" class="form-control col-10" placeholder="نام ایجاد کننده مقاله" name="edit" id="" value="<?php echo $_GET["edit"]?>">
                            <br>
                            <h5 class="col-12 text-center text-dark"><label for="name">فایل تصویر مقاله</label></h5>
                            <br>
                            <input type="text" name="new_image_link" class="form-control" value="<?php echo $row["main_img"] ?>" id="">
                        
                        <br>
                            <h5 class="col-12 text-dark text-center"><label for="">پیشنمایش مقاله</label></h5>
                            <br>
                            <textarea name="new_main_text" class="form-control" id="" cols="30" rows="3"><?php echo $row["main_text"] ?></textarea>
                            <br>
                            <div class="row">
                                <br>
                                <br>
                            
                                <span class="col-4" ></span>
                            <div class="custom-control custom-switch checked col-4">
                                                            <input type="checkbox" name="is_sh" class="custom-control-input" <?php if($row["show"]=="yes")  echo 'checked="yes"'; ?> value="yes"  id="customSwitch1">
                                                            <label class="custom-control-label"  for="customSwitch1">نمایش</label>
                                                        </div>

                                                        
                            </div>
                            
                    </div>
                    <br>
                    <span></span>
                    <br>
                    <button type="submit"  class="btn btn-primary col-5 mx-auto text-center">
                        بروز رسانی مقاله
                    </button>
                </div>
            </div>
        </form>
        <link rel="stylesheet" href="./assets/css/editors/tinymce.css?ver=3.2.3">
    <script src="./assets/js/libs/editors/tinymce.js?ver=3.2.3"></script>
    <script src="./assets/js/editors.js?ver=3.2.3"></script>
    <script src="<?php echo url."blog/adminstrator/tools_script.js" ?>"></script>
    <script>
       
    </script>
        <?php
        }else{
            header("location: ".loginpage);
        }
        
        $conn->close();
        require_once(footer);
    
    }else{
        require_once(header);
        ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8">
                    <h5><label for="">کد HTML مقاله</label></h5>
                    <br>
                    <div id="post_tools" class="row">
                        
                        <div class="col-2">
                        <button type="button" class="col-12 btn btn-primary" id="img" ><span class="text-center">تصویر</span></button>
                        </div>
                        
                        <div class="col-2">
                        <button type="button" class="col-12 btn btn-primary" id="link" ><span class="text-center">لینک</span></button>
                        </div>
                        
                    </div>
                    <br>
                    <textarea dir="ltr" name="code"  class="form-control" id="code_text" cols="30" placeholder="کد HTML مقاله خود را در اینجا وارد نمایید" rows="24"></textarea>
                </div>
                <div class="col-4 row ">
                    <div class="">
                        <br>
                        <h5 class="col-12 text-center text-dark"><label for="name">نام مقاله</label></h5>
                        <br>
                        <input type="text" class="form-control col-10" placeholder="نام مقاله را وارد نمایید" name="name" id="">
                    </div>
                    <div class="">
                            <br>
                            <h5 class="col-12 text-center text-dark"><label for="name">نام ایجاد کننده مقاله</label></h5>
                            <br>
                            <input type="text" class="form-control col-10" placeholder="نام ایجاد کننده مقاله" name="c" id="">
                            <br>
                            <h5 class="col-12 text-center text-dark"><label for="name">فایل تصویر مقاله</label></h5>
                            <br>
                            <div class="form-control-wrap">
                                                                <div class="form-file">
                                                                    <input type="file" name="image" class="form-file-input" id="customFile">
                                                                    <label class="form-file-label" for="customFile">انتخاب تصویر مقاله</label>
                                                                </div>
                                                            </div>
                        
                        <br>
                            <h5 class="col-12 text-dark text-center"><label for="">پیشنمایش مقاله</label></h5>
                            <br>
                            <textarea name="main_text" class="form-control" id="" cols="30" rows="3"></textarea>

                    </div>
                    <br>
                    <span></span>
                    <br>
                    <div class="custom-control custom-switch checked col-4">
                                                            <input type="checkbox" name="is_sh" class="custom-control-input" checked="yes" value="yes"  id="customSwitch1">
                                                            <label class="custom-control-label"  for="customSwitch1">نمایش</label>
                                                        </div>
                    <button type="submit"  class="btn btn-primary col-6 mx-auto text-center">
                        انتشار مقاله
                    </button>
                </div>
            </div>
        </form>
        <link rel="stylesheet" href="./assets/css/editors/tinymce.css?ver=3.2.3">
    <script src="./assets/js/libs/editors/tinymce.js?ver=3.2.3"></script>
    <script src="./assets/js/editors.js?ver=3.2.3"></script>
    
        <?php
        require_once(footer);
    }
    ?>
    <script src="<?php echo url."blog/adminstrator/tools_script.js" ?>"></script>
    <script>
        tools_script_init("img","link","code_text");
    </script>
    <?php
}else{
    header("location: ".dashboard);
}

?>
