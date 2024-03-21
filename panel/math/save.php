<?php
    $content = $_REQUEST["content"];
    
    // تعیین نام فایل به صورت تصادفی
    $filename = "downloaded_file_" . uniqid() . ".html";
    echo $filename;
    // ایجاد یک فایل جدید و نوشتن محتوا در آن
    file_put_contents($filename, $content);