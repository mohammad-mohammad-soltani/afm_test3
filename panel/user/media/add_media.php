<?php
require_once(dirname(dirname(__DIR__))."/config/config.php");
if(admin()){
    require_once(dirname(dirname(__DIR__))."/config/db_config.php");
    if(!isset($_FILES['file'])){
        require_once(header);
        $conn = new mysqli(server,username,password,db);
        ?>
        <form method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col-6">
        <h5 class="col-12 text-center text-dark"><label for="file">فایل مورد نظر</label></h5>
                            <br>
                            <div class="form-control-wrap col-12">
                                <div class="form-file">
                                    <input type="file" name="file" class="form-file-input" id="customFile">
                                    <label class="form-file-label" for="customFile">انتخاب کنید</label>
                                </div>
                            </div>
        </div>

            <div class="col-6">
                <h5 class="text-center text-dark"><label for="name">نام اختصاری فایل مورد نظر</label></h5>
                <br>
                
            <input type="text" name="name" class="form-control" id="">
            </div>

            <br>
            <span></span>
            <br>
            <div class="form-group">
                                                                    <label class="form-label col-12 text-center">تایپ فایل خود را انتاب کنید</label>
                                                                    <div class="form-control-wrap">
                                                                        <select id="sel" name="type" class="form-select js-select2">
                                                                            <option value="1">تصویر</option>
                                                                            <option value="2">ویدیو</option>
                                                                            <option value="3">فایل های غیره</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                    <br>
            <span></span>
            <br>
            <button type="submit" class="btn btn-primary col-4 mx-auto"><span class="text-center">ذخیره</span></button>
        </div>
        </form>
        <?php
        $conn->close();
    require_once(footer);
}else{
    $conn = new mysqli(server,username,password,db);
    if($_POST["type"]=="1"){
        $type = "img";
    }elseif($_POST["type"]=="2"){
        $type = "vid";
    }elseif($_POST["type"]=="3"){
        $type = "oder_file";
    }
    // اطلاعات فایل
    $file = $_FILES['file']; // نام input مربوط به فایل را وارد کنید
    $upload_directory = dirname(dirname(__DIR__))."/upload/"; // مسیر دایرکتوری ذخیره فایل
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'pdf', 'html', 'txt', 'mp4', 'm4v', 'gif', 'php']; // پسوند‌های مجاز

    // بررسی آیا فایل انتخاب شده مجاز است
    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    if (!in_array(strtolower($file_extension), $allowed_extensions)) {
        die("پسوند فایل مجاز نیست.");
    }

    // ایجاد نام یکتا برای فایل
    $unique_name = $_POST["name"]."_".uniqid() ."." .strtolower($file_extension);

    // مسیر کامل فایل
    $upload_path = $upload_directory . $unique_name;

    // ارسال فایل به دایرکتوری مورد نظر
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        echo "فایل با موفقیت ارسال شد و با نام یکتا '$unique_name' ذخیره شد.";
        $sql = "INSERT INTO `site_media_db` (`id`, `type`, `link`, `time`, `name`) VALUES (NULL, '$type', '".$unique_name."', '".time()."', '".$_POST["name"]."');";
        $conn -> query($sql);
        header("location: ".url."user/media/media.php");
    } else {
        echo "مشکلی در ارسال فایل به وجود آمده است.";
    }
    

}
}else{
    header("location: ".login_page);
}