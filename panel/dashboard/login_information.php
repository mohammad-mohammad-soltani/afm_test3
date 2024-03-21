<?php

require_once(dirname(__DIR__).'/config/config.php');
$handle=fopen(last_ip,'r+');
function count_of_login_reader(){
    $handle=fopen(directory.'check/count_login.data','w+');
    $data=fread($handle,1024);
    $data_new = unserialize($data);
    if (isset($data_new['count'])) {
        $data_orginal = $data_new['count'];
    }else {
        $data_orginal = 'ther is a eror';
    }
    
    fclose($handle);
    return $data_orginal;
}

$data = fread($handle,1024);

$data_decode=unserialize($data);

fclose($handle);

$ip = $data_decode['ip']; 
$count = count_of_login_reader();
require_once(login_check_dir);
if (login_check()) {
    function get_title(){
        echo 'اطلاعات ورود';
    }
    function get_hight(){
        echo '60px';
    }
    require_once(header);
    
    ?>
    
    <!--code-->
    <style>
        .content{
            background-color: royalblue;
            border-radius: 8px;
            text-align: center;
            color: white;
        }
        .text h1{
            color: white;
            text-align: center;
            font-size: 20px;
            margin-top: 5px;
        }
        span{
            font-size: 30px;

        }
    </style>
    <div class="content">
        <br>
        <div class="text">
            <h1>آخرین آی پی وارد شده به اکانت شما</h1>
        </div>
        <br>
        <div class="ip">
        <span>
                <?php
                echo $ip;
                ?>
            </span>
        </div>
        <br>
        <div class="text">
            <h1> تعداد ورود به اکانت شما از زمان ایجاد:</h1>
        </div>
        <br>
        <div class="ip">
        <span>
                <?php
                echo $count;
                ?>
            </span>
        </div>
        
    </div>
    <!--code-->
    <?php
    require_once(footer);
    
}else {
    header('location: '.login_page.'/?redirect');
}