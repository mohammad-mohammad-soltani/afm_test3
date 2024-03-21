<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
require_once(dirname(__DIR__)."/config/config.php");
require_once(dirname(__DIR__)."/config/db_config.php");
function get_title(){
    echo "main";
}
function get_hight(){
    echo "199px";
}

require_once(header); 
?>
<style>
    .message_box{
        background-color: #212529;
        width: 70%;
        float: right;
        margin-top: 1.5%;
        border-radius: 5px;
    }
    .sidebar{
        width: 25%;
        float: right;
        margin-right: 1.5%;
        margin-left: 1.5%;
        margin-top: 1.5%;
        background-color: white;
        border-radius: 5px;
    }
    .sidebar ul li{
        display: block;
        text-align: center;
        background-color: #6464641c;
        margin-top: 2%;
        border-radius: 4px;
    }
    #show_message{
        color: white
    }
</style>

<div class="sidebar">
<ul>
    <li id="send_btn" onclick="changer('send')" >ارسال پیام</li>
    <li id="read_r_btn" onclick="changer('read_r')" >مشاهده پیام های ارسالی</li>
    <li id="read_s_btn" onclick="changer('read_s')" >مشاهده پیام های دریافتی</li>
</ul>
</div>


    

<div class="message_box">
<div id="mtext">
</div>
<div  id="send">
    <?php
    require_once("send.php");
    ?>
</div>
<div id="read_s">
    <?php
    require_once("read_s.php");
    ?>
</div>
<div id="read_r">
    <?php
    require_once("read_r.php");
    ?>
</div>

<div id="sender">
    
</div>
</div>
<script src="script.js"></script>
<?php
require_once(footer);