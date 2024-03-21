<?php
function get_hight(){
    echo '550px';
}
function get_title(){
    return 'دیگر امکانات';
}
require_once(dirname(__DIR__).'/config/config.php');
require_once(header);
?>
<style>
    #main{
        background-color: #2ab1ff;
        border-radius: 0 0 12px 12px;
    }
    .all div{
        border-radius: 5px;
        width: 40%;
        margin: 5% 5% 0 0;
        text-align: center;
    }
    .one,.two,.three,.four{
        background-color: white;
        float: right;
    }
    .btn{
        margin-right: 0%;
        margin-top: 5px;
        margin-bottom: 15px;
    }
    h4{
        margin-top: 15px;
    }
</style>
<div class="all">
    <div  class="one">
        <h4>لیست یادداشت ها</h4>
        <button class="btn btn btn-primary" >مشاهده کنید</button>
    </div>
    <div class="four">
        <h4>مستندات api</h4>
        <button class="btn btn btn-primary" >مشاهده کنید</button>
    </div>
    <div class="two">
        <h4>درون ریزی</h4>
        <a href="<?php echo in ; ?>"><button class="btn btn btn-primary" >درون ریزی کنید</button></a>
        
    </div>
    <div class="three">
        <h4>برون ریزی</h4>
        <a href="<?php echo out ; ?>"><button class="btn btn btn-primary" >برون ریزی کنید</button></a>
        
    </div>
    
</div>
<?php
require_once(footer);