<?php
require(dirname(__DIR__).'/config/config.php');
function get_title(){
    echo "دستیار فیزیک";
}
function get_hight(){
    echo "100%";
}
require_once(header);
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
    <div class="modal-body" onkeyup="keys(event)" >
    <style>
        .modal-body ul li{
            display: block;
        }
    </style>
        <ul>
            <li>عطارد = 3.7</li>
            <li>زهره = 8.8</li>
            <li>زمین = 9.8</li>
            <li>مریخ = 3.71</li>
            <li>مشتری = 24.7</li>
            <li>زحل = 10.44</li>
            <li>اورانوس = 8.8</li>
            <li>نپتون = 11</li>
            <li>پلوتون = 0.64</li>
            <li>ماه = 1.6</li>
            <li>خورشید = 270</li>
        </ul>
    </div>

    
    </div>
  </div>
</div>
<style>
    #n{
        display: none;
    }
    #n2{
        display: none;
    }
    #to{
        display: none;
    }
    .def {
        text-align: center;
    }
    .actions ul li{
        color: black;
        display: block;
        background-color: white;
        
        margin-top: 2%;
        border-radius: 4px;
        text-align: center;
        
    }
    .actions{
        margin-top: 1.5%;
        width: 20%;
        float: right;
    }
    .form{
        margin-top: 1.5%;
        width: 75%;
        background-color: white;
        /*border-color: red;
        border-style: solid;
        border-width: 5px;*/
        float: right;
        margin-left: 5%;
        border-radius: 10px;
    }
    .form h3{
        text-align: center;
    }
    .form-control{
        width: 40%;
        float: right;
    }
    .form span{
        float: right;
        width: 15%;
        font-size: 25px;
        text-align: center;
        
    }
    .form text{
        margin-right: 2.5%;
    }
</style>
<script>
    document.getElementById("to").style.display = "none";
    document.getElementById("n2").style.display = "none";
    document.getElementById("n").style.display = "none";

    function n() {
        document.getElementById("def").style.display = "none";
        // مخفی کردن تمام محتویات دیگر
        document.getElementById("n2").style.display = "none";
        document.getElementById("to").style.display = "none";

        // نمایش محتویات مربوط به تبدیل جرم به وزن
        document.getElementById("n").style.display = "block";
        //..........................................................
        document.getElementById("one").style.backgroundColor = "#0d6efd";
        document.getElementById("one").style.color = "white";

        document.getElementById("two").style.backgroundColor = "white";
        document.getElementById("two").style.color = "black";
        document.getElementById("three").style.backgroundColor = "white";
        document.getElementById("three").style.color = "black";
    
}

function n2() {
    document.getElementById("def").style.display = "none";
    // مخفی کردن تمام محتویات دیگر
    document.getElementById("n").style.display = "none";
    document.getElementById("to").style.display = "none";

    // نمایش محتویات مربوط به محاسبه نیرو مصرفی
    document.getElementById("n2").style.display = "block";
    //...................................................
    document.getElementById("two").style.backgroundColor = "#0d6efd";
        document.getElementById("two").style.color = "white";

        document.getElementById("one").style.backgroundColor = "white";
        document.getElementById("one").style.color = "black";
        document.getElementById("three").style.backgroundColor = "white";
        document.getElementById("three").style.color = "black";
}

function to() {
    document.getElementById("def").style.display = "none";
    // مخفی کردن تمام محتویات دیگر
    document.getElementById("n").style.display = "none";
    document.getElementById("n2").style.display = "none";

    // نمایش محتویات مربوط به تبدیل واحد
    document.getElementById("to").style.display = "block";
    //....................................................
    document.getElementById("three").style.backgroundColor = "#0d6efd";
        document.getElementById("three").style.color = "white";

        document.getElementById("two").style.backgroundColor = "white";
        document.getElementById("two").style.color = "black";
        document.getElementById("one").style.backgroundColor = "white";
        document.getElementById("one").style.color = "black";
}

</script>
<div class="actions">
    <ul>
        <li id="one" onclick="n()" >تبدیل جرم به وزن</li>
        
        <li id="two" onclick="n2()" >محاسبه کار</li>
        <li id="three" onclick="to()">تبدیل واحد</li>
        
    </ul>
</div>

<div class="form" id="form">
    <div  class="def" id="def">
        <h2 style="margin-top:3%;margin-bottom:3%;">لطفا موردی را انتخاب نمایید</h2>
    </div>
<div class="nioton" id="n">
    <script>
    function calculate(){
        var $var1 = document.getElementById("var1").value;
        var $var2 = document.getElementById("var2").value;
        if ($var1 == "") {
            $var1 = 10;
        }
        document.getElementById("answer").value = $var1 * $var2;
    }
    function calculate2(){
        var $var1 = document.getElementById("var4").value;
        var $var2 = document.getElementById("var5").value;
        var $var3 = document.getElementById("deg").value;
        var $var6 = document.getElementById("deg").value;
        if ($var3 == "") {
            $var3 = 1;
        }else{
            $var3 =Math.cos($var6);
        }
        document.getElementById("answer2").value = $var1 * $var2 * $var3;
    }
</script>
<br>
    <h3>تبدیل جرم به وزن</h3>
    <br>

    <input style="width:95%;margin-right:2.5%" placeholder="شتاب جاذبه سیاره مورد نظر را وارد نمایید" id="var1" type="number" class="form-control" onkeyup="calculate()" >
    <br>
    <br>
    <text data-bs-toggle="modal" data-bs-target="#exampleModal">مشاهده شتاب جاذبه سیارات مختلف</text>
    <br>
    <br>
    <input style="margin-right:2.5%;margin-bottom: 3%;" placeholder="جرم را  بر حسب گرم وارد نمایید" id="var2" type="number" class="form-control" onkeyup="calculate()">
    <span>=></span>
    <input type="number" class="form-control" id="answer" style="matgin-bottom: 3%" disabled>
    <br>
    
    
</div>
<!-- .................................................-->
<div id="n2">
<script>
    function calculate(){
        var $var1 = document.getElementById("var1").value;
        var $var2 = document.getElementById("var2").value;
        if ($var1 == "") {
            $var1 = 10;
        }
        document.getElementById("answer").value = $var1 * $var2;
    }
    function keyup(){
        var as =document.getElementById("as_yaka").value;
        var to =document.getElementById("to_yaka").value;
        var as_value = document.getElementById("as_var").value;
        var to_yaka = document.getElementById("to_var").value;
        var calc = null;
        var answer = null;
        if (as == "cm") {
            switch (to) {
                
                case "mm" : calc = -10 break;
                case "cm" : calc = 1 break;
                case "dm" : calc = 10 break;
                case "m" : calc = 100 break;
                case "Dm" : calc = 1000 break;
                case "Hm" : calc = 10000 break;
                case "Hm" : calc = 100000 break;
                
                if (eval(calc) < 0) {
                    answer = -as_value * calce;
                }else{
                    answer = as_value / calce;
                }
            }
            
        }
        document.getElementById("to_var").value = answer;
    }
</script>
<br>
    <h3>محاسبه کار</h3>
    <br>

    <input style="width:40%;margin-right:2.5%" placeholder="جابجایی را بر حسب متر وارد نمایید" id="var4" type="number" class="form-control" onkeyup="calculate2()" >
    <input style="width:40%;margin-right:15%" placeholder="زاویه  نیرو بر جابجایی را وارد نمایید" id="deg" type="number" class="form-control" onkeyup="calculate2()" >
    <br>
    <br>
    
    
    <br>
    <input style="margin-right:2.5%;margin-bottom: 3%;  " placeholder="وزن را بر حسب نیوتون وارد نمایید" id="var5" type="number" class="form-control" onkeyup="calculate2()">
    <span>=></span>
    <input type="number" class="form-control" id="answer2" disabled>
    <br>
</div>
<!-- .................................................-->
<style>
    #to .tabs ul li {
        float: right;
        display: block;
        margin-right: 5px;
        background-color: black;
        color: white;
        width: 10%;
        text-align: center;
        margin-top: -8px;
        border-radius: 4px;
        
    }
    
</style>

<div id="to">
    <div class="tabs">
        <ul>
            <li id="tabf" onclick="tab1()">تبدیل  محیط</li>
            <li id="tabs" onclick="tab2()">تبدیل مساحت</li>
            <li id="tabt" onclick="tab3()">تبدیل حجم</li>
        </ul>
    </div>
    <br>
    <nav>
        <div id="tabone">
            <input onkeydown="keyup()" id="as_yaka" class="form-control" style="margin-right:3%" type="text" placeholder="واحد مبدا" >
            <input onkeydown="keyup()" id="to_yaka" class="form-control" style="margin-left:3%;margin-right:14%" type="text" placeholder="واحد مقصد" >
            <br>
            <br>
            <input onkeydown="keyup()" id="as_var" class="form-control" style="margin-right:3%" type="number" placeholder="مقدار مبدا" >
            <input onkeydown="keyup()" id="to_var" class="form-control" style="margin-left:3%;margin-right:14%" type="number" placeholder="مقدار مقصد" disabled>
            <br>
            <br>
        </div>
        <div id="tabtwo">
        <h1>hy2</h1>
        </div>
        <div id="tabthree">
        <h1>hy3</h1>
        </div>
    </nav>
</div>
<script>
    
    document.getElementById("tabone").style.display = "block";
    document.getElementById("tabf").style.backgroundColor = "red";
    document.getElementById("tabf").style.color = "white";
    document.getElementById("tabtwo").style.display = "none";
    document.getElementById("tabthree").style.display = "none";
    
    function tab1(){
        document.getElementById("tabone").style.display = "block";

        document.getElementById("tabs").style.backgroundColor = "black";
        document.getElementById("tabt").style.backgroundColor = "black";

        document.getElementById("tabf").style.backgroundColor = "red";
        document.getElementById("tabf").style.color = "white";
        document.getElementById("tabtwo").style.display = "none";
        document.getElementById("tabthree").style.display = "none";
    }
    function tab2(){
        document.getElementById("tabone").style.display = "none";
        document.getElementById("tabs").style.backgroundColor = "red";
        document.getElementById("tabf").style.backgroundColor = "black";
        document.getElementById("tabt").style.backgroundColor = "black";
        document.getElementById("tabs").style.color = "white";
        document.getElementById("tabtwo").style.display = "block";
        document.getElementById("tabthree").style.display = "none";
    }
    function tab3(){
        document.getElementById("tabone").style.display = "none";
        document.getElementById("tabt").style.backgroundColor = "red";
        document.getElementById("tabf").style.backgroundColor = "black";
        document.getElementById("tabs").style.backgroundColor = "black";
        document.getElementById("tabs").style.color = "white";
        document.getElementById("tabthree").style.display = "block";
        document.getElementById("tabtwo").style.display = "none";
    }
    
</script>
</div>


<?php
require_once(footer);