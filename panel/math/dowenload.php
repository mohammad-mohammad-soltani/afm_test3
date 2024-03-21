<?php

    // گرفتن متن از فرم POST
    $filename = $_REQUEST["file_name"];

    // تنظیم هدر برای دانلود فایل
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    
    // ارسال محتوای فایل به کاربر
    readfile($filename);

    // حذف فایل پس از ارسال
    unlink($filename);

?>
<script>
    
</script>
