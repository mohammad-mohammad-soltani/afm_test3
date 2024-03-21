
<?php

require_once(dirname(__DIR__).'/config/config.php');

require_once(header);
if (!isset($_REQUEST['mode'])) {
    # code...

?>

<div id="all">

<!--code-->

<!--code-->
<?php
}
?>


<script>
    function gharbal(){
        document.getElementById("all").innerHTML = "<div id='row' class='row gy-4 gx-4'><div class='col-6'><input type='number' placeholder='از' id='min' class='form-control inputer text-center' dir='ltr' onkeyup='ajaxsender2()'></div><div class='col-6'><input type='number' maxlength='3' placeholder='تا' id='max' dir='ltr' class='form-control text-center inputer col-6' onkeyup='ajaxsender2()'></div></div><div id='answer3'></div>";
        // استفاده از jQuery برای ارسال درخواست GET
        
    }
    function ajaxsender2(message) {
     new Promise((resolve, reject) => {
        // استفاده از jQuery برای ارسال درخواست GET
        $.get('<?php echo url; ?>math/gharbal.php', { min : document.getElementById("min").value ,

             max : document.getElementById("max").value  }, function (data) {
            // در اینجا نتیجه دریافت شده به عنوان پارامتر resolve تابع Promise منتقل می‌شود.
            document.getElementById("answer3").innerHTML = data;
        });
    });
}

    function math(num_1_id, op_id, num_2_id){
        var on = parseFloat(document.getElementById(num_1_id).value);
        var op = document.getElementById(op_id).value;
        var two = parseFloat(document.getElementById(num_2_id).value);
        var answer = 0;
        if (op == "+") {
            answer = on + two; 
        } else if(op == "-" || op == "_"){
            answer = on - two;
        } else if(op == "*"){
            answer = on * two;
        } else if(op == "/"){
            answer = on / two;
        } else if(op == "**" || op == "^"){
            answer = Math.pow(on, two);
        } else {
            answer = "لطفا عمل را وارد کنید";
        }
        
        if (document.getElementById(num_2_id).value == "") {
            answer = "لطفا عدد دوم را وارد کنید";
        }if (document.getElementById(num_1_id).value == "") {
            answer = "لطفا عدد اول را وارد نمایید"
        }
        document.getElementById("answer").value = answer;
        
        
        
    }
    function actiona($a) {
        document.getElementById("op").value = $a;
        math('num_1', 'op', 'num_2')
    }
</script>
<div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        <div class="nk-content-body">
                            
                        
<div class="fast" style="" class="col-12">  
<br>
<br>
<span>حل سریع سوالات</span>
<input  type="number" placeholder="عدد اول" class="form-control" id="num_1" onkeyup="math('num_1', 'op', 'num_2')">
<br>
<input placeholder="چه کاری میخواهید انجام دهید؟" type="text" class="form-control"  id="op" onkeyup="math('num_1', 'op', 'num_2')">
<div class="actions">
    
    <!--<button  onclick="actiona('+')" class="btn btn-primary col-3">جمع</button>
    <button  onclick="actiona('-')" class="btn btn-primary col-2">تفریق</button>
    <button  onclick="actiona('*')" class="btn btn-primary col-2">ضرب</button>
    <button  onclick="actiona('/')" class="btn btn-primary col-2">تقسیم</button>
    <button  onclick="actiona('^')" class="btn btn-primary col-2.5">توان</button>-->
    
    
</div>
<br>
<input placeholder="عدد دوم" type="number" class="form-control"  id="num_2"  onkeyup="math('num_1', 'op', 'num_2');add(event)">
<br>
<input style = "text-align: center;direction: ltr;" type="text"  class="form-control"  id="answer" disabled>
<br>
<div class="row gy-4 gx-4">
<div class="col-6">
<button  class="btn btn-primary"  style="width :100%" data-bs-toggle="modal" data-bs-target="#exampleModal"><div class="mx-auto">رفتن به ماشین حساب</div></button>
</div>
<div class="col-6">
<button  onclick="gharbal()" style="width :100%; text-align:center;"   class="btn btn-primary"><div class="mx-auto">غربال اعداد به روش اراتستن</div></button>

</div>
<div class="col-12">
<a  style="color:white" href="<?php echo url ?>math/nums_information.php" ><button  style="width :100%; text-align:center;"   class="btn btn-primary   "><div class="mx-auto">اطلاعات اعداد</div></button></a>

</div>

</div>
</div>
</div>
                    </div>
                </div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
    <div class="modal-body" onkeyup="keys(event)" >
        <input style="font-size : 24px;font-family: irancell;text-align:left;decreption:ltr;" value="0" class="form-control" type="text" id="answer2" disabled>
        <br>
        <div class="row gy-4 gx-4">
        <div class="r1">
            <button class="btn2" onclick="appendToInput('1')">1</button>
            <button class="btn2" onclick="appendToInput('2')">2</button>
            <button class="btn2" onclick="appendToInput('3')">3</button>
            <button style="background-color: orange;" class="btn2" onclick="appendToInput('+')">+</button>
        </div>
        <div class="r2">
            <button class="btn2" onclick="appendToInput('4')">4</button>
            <button class="btn2" onclick="appendToInput('5')">5</button>
            <button class="btn2" onclick="appendToInput('6')">6</button>
            <button style="background-color: orange;" class="btn2" onclick="appendToInput('-')">-</button>
        </div>
        <!-- اضافه کردن دکمه‌های دیگر برای تفریق، ضرب، تقسیم و عملیات دیگر -->
        <!-- اضافه کردن دکمه مساوی برای محاسبه و نمایش نتیجه -->
        <div class="r3">
            <button  class="btn2" onclick="appendToInput('7')">7</button>
            <button class="btn2" onclick="appendToInput('8')">8</button>
            <button class="btn2" onclick="appendToInput('9')">9</button>
            <button style="background-color: orange;" class="btn2" onclick="appendToInput('/')">/</button>
        </div>
        <div class="r4">
            <button style="background-color: orange;" class="btn2" onclick="appendToInput('*')">*</button>
            <button class="btn2" onclick="appendToInput('0')">0</button>
            <button style="background-color: orange;" class="btn2" onclick="appendToInput('**')">^</button>
            <button style="background-color: red;" class="btn2" onclick="calculate()">=</button>
        </div>
        
        <br>
        <span style="color: black;" id="show" onclick="show_list()">مشاهده میانبر های صفحه کلید</span>
        
        <br>
        <div id="key" style="color:black;font-size:14px;"></div>
    </div>

    <script>
    
        function keys(e){
            var key=e.keyCode
            
            if (key == 67) {
                var input = document.getElementById('answer2');
                input.value = null;
            }if(e.key == 1){
                appendToInput("1")
            }if(e.key == 2){
                appendToInput("2")
            }if(e.key == 3){
                appendToInput("3")
            }if(e.key == 4){
                appendToInput("4")
            }if(e.key == 5){
                appendToInput("5")
            }if(e.key == 6){
                appendToInput("6")
            }if(e.key == 7){
                appendToInput("7")
            }if(e.key == 8){
                appendToInput("8")
            }if(e.key == 9){
                appendToInput("9")
            }if(e.key == 0){
                appendToInput("0")
            }if(e.key == "+"){
                appendToInput("+")
            }if(e.key == "-"){
                appendToInput("-")
            }if(e.key == "="){
                calculate()
            }if(e.key == "/"){
                appendToInput("/")
            }if(e.key == "^"){
                appendToInput("**")
            }if(e.key == "*"){
                appendToInput("*")
            }if(e.key == "("){
                appendToInput("(")
            }if(e.key == ")"){
                appendToInput(")")
            }
        }
        function show_list() {
            var now = document.getElementById("show").innerHTML
            if (now == "مشاهده میانبر های صفحه کلید") {
                document.getElementById("key").innerHTML = "<span>کلید c برای پاک کردن صفحه نمایش</span>"
                document.getElementById("show").innerHTML = "پنهان کردن"
            }else{
                document.getElementById("show").innerHTML = "مشاهده میانبر های صفحه کلید"
                document.getElementById("key").innerHTML = null
            }
        }
        // تابع برای افزودن اعداد و عملگرها به ورودی نمایشگر
        function appendToInput(value) {
            var input = document.getElementById('answer2');
            input.value += value;
        }

        // تابع برای محاسبه و نمایش نتیجه
        function calculate() {
            var input = document.getElementById('answer2');
            try {
                input.value = eval(input.value);
            } catch (error) {
                input.value = null;
                input.placeholder = 'خطا';
            }
        }
    </script>
    </div>
  </div>
</div>
</div>
</div>
<?php

require_once(footer);
?>
</div>
<style>
    
   
</style>