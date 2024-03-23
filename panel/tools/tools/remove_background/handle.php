<?php
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    // بررسی آیا فایل یک تصویر است
    $fileInfo = getimagesize($_FILES['file']['tmp_name']);
    if ($fileInfo !== false) {
        // بررسی پسوند فایل
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        if (in_array($extension, $allowedExtensions)) {
            $targetDir = dirname(dirname(__DIR__)).'/uploads/'; // مسیر برای ذخیره فایل
            $uniqId = uniqid(); // تولید یک شناسه یکتا
            $filename = $_SESSION["WEB_C"]. "_" . $uniqId . '_' . $_FILES['file']['name']; // نام فایل با استفاده از شناسه یکتا

            $targetFile = $targetDir . $filename; // مسیر نهایی فایل با نام ارسالی

            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                $result = file_get_contents("https://api3.haji-api.ir/majid/tools/image/remove/background?url=".url."tools/uploads/".$filename);
                $result = json_decode($result , true);
                if($result["success"] && $result["result"] != "Error!" ){
                    $result_file = $target_dir."remove_back".$_SESSION["WEB_c"]."_".uniqid().".png"
                   ?>
                   <div class="gallery card">
                        <a class="gallery-image popup-image" href="./images/stock/a.jpg">
                            <img class="w-100 rounded-top" src="./images/stock/a.jpg" alt="">
                        </a>
                        <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <img src="./images/avatar/a-sm.jpg" alt="">
                                </div>
                            </div>
                            <p>پس زمینه تصویر شما با موفقیت حذف گردید!</p>
                        </div>
                    </div>
                   <?php

                }else{
                    ?>
                    <br>
                    <br>
                    <div class="alert alert-danger alert-icon">
                        <em class="icon ni ni-cross-circle"></em>خطایی وجود داشت  <?php if(isset($result["message"]))  echo " : ".$result["message"]  ;?>
                    </div>
                    <?php
                }
                unlink($targetFile);
            } else {
                ?>
                <br>
                <br>
                <div class="alert alert-danger alert-icon">
                        <em class="icon ni ni-cross-circle"></em>خطایی وجود داشت 
                    </div>
                <?php
            }
        } else {
            $message = 'فرمت فایل معتبر نیست. فرمت‌های مجاز شامل jpg، jpeg و png می‌باشند.';
            ?>
            <br>
            <br>
            <div class="alert alert-danger alert-icon">
                <em class="icon ni ni-cross-circle"></em>خطایی وجود داشت : <?php echo $message ?>
            </div>
            <?php
            
        }
    } else {
        $message = 'فرمت فایل معتبر نیست. فرمت‌های مجاز شامل jpg، jpeg و png می‌باشند.';
        ?>
        <br>
        <br>

        <div class="alert alert-danger alert-icon">
            <em class="icon ni ni-cross-circle"></em>خطایی وجود داشت : <?php echo $message ?>
        </div>
        <?php
    }
} else {
    $message = "لطفا ابتدا فایلی را انتخاب نمایید";
    ?>
    <br>
    <br>
     <div class="alert alert-danger alert-icon">
            <em class="icon ni ni-cross-circle"></em>خطایی وجود داشت : <?php echo $message ?>
        </div>
    <?php
}

?>
