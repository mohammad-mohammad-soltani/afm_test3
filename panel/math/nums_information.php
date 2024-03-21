<?php 


require_once(dirname(__DIR__).'/config/config.php');
require_once(header);
?>
<script>
    
    function solve(){
        
            if(document.getElementById("first").value != "" && document.getElementById("seccond").value != ""){
            
            
                document.getElementById("main_answer").innerHTML = "<p>در حال محاسبه</p>";
         new Promise((resolve, reject) => {
            // استفاده از jQuery برای ارسال درخواست GET
            $.get('<?php echo url; ?>math/nums_render.php', {
        num_1: eval(document.getElementById("first").value),
        num_2: eval(document.getElementById("seccond").value),
       }, function (data) {
                document.getElementById("answer").style.display = "block";
                // در اینجا نتیجه دریافت شده به عنوان پارامتر resolve تابع Promise منتقل می‌شود.
                document.getElementById("main_answer").innerHTML = data;
                
                
                
            });
        });
        }else if(document.getElementById("first").value == "" && document.getElementById("seccond").value == ""){
            document.getElementById("main_answer").innerHTML = "شما هیچ کدام از اعداد را وارد نکرده اید!";
        }else if(document.getElementById("first").value == "" ){
            document.getElementById("main_answer").innerHTML = "شما عدد اول را وارد نکرده اید";
        }else if( document.getElementById("seccond").value == ""){
            document.getElementById("main_answer").innerHTML = "شما عدد دوم را وارد نکرده اید";
        }
    }
    var styles;
    function ajax_save_sender(data_2){
        
        new Promise((resolve, reject) => {
           // استفاده از jQuery برای ارسال درخواست GET
           $.post('<?php echo url; ?>math/read.php', {
               
       
       },function (data){
        styles = data;

       });
       });
            
            
        
        new Promise((resolve, reject) => {
           // استفاده از jQuery برای ارسال درخواست GET
           $.post('<?php echo url; ?>math/save.php', {
               content: data_2,
       
       },function (data){
        document.getElementById("dowenload-link").href = "/kharazmi/math/dowenload.php?file_name=" + data;

       });
       });
       }
           function save(){
               var data =document.getElementById("for_save").innerHTML
               
               ajax_save_sender(data);
               document.getElementById("dowenload-btn").innerHTML = "یکبار دیگر کلیک نمایید";
           }
    
</script>
<div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        <div class="nk-content-body">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" dir="ltr" onkeyup="solve()"  id="first" placeholder="عدد اول" class="form-control">
                            </div>
                            <div class="col-6">
                            <input type="text" dir="ltr" onkeyup="solve()"   id="seccond" placeholder="عدد دوم" class="form-control">
                            </div>
                            <br>                           
                            <br>
                            <!--<button class="col-12 mx-auto btn btn-primary" type="button" onclick="solve()"><div class="mx-auto">نمایش اطلاعات</div></button>-->
                            <br>
                            
                        </div>
                        <div id="answer">
                            <div id="main_answer">

                            </div>
                       <!--<a  id="dowenload-link"><button id="dowenload-btn" class="btn btn-primary " onclick="save()">دانلود خروجی</button></a>-->
                        </div>
                        </div>
                    </div>
                    <script>
                        document.getElementById("answer").style.display = "none";
                    </script>
                    </div>
<?php

require_once(footer);
