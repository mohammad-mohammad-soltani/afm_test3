
<?php



if (isset($_GET["max"])) {
    $max = $_GET["max"];
}else{
     
     
     $max = null;
}
if (isset($_GET["min"])) {
    $min = $_GET["min"];
    
}else{
    $min = null;
}
// تابع برای چک کردن اعداد اول
if ($min != null  && $max != null) {
    if($min < $max){
        function isPrime($num) {
            if($num == 1){
                return false;
            }
            if ($num <= 1) return false;
            if ($num <= 3) return true;
            if ($num % 2 == 0 || $num % 3 == 0) return false;
            for ($i = 5; $i * $i <= $num; $i = $i + 6) {
                if ($num % $i == 0 || $num % ($i + 2) == 0) return false;
            }
            return true;
        }
        
        
        
        // آرایه‌ای برای ذخیره اعداد اول
        $primeNumbers = array();
        $n = 0;
        // اعداد اول از 1 تا max را پیدا کنید و در آرایه ذخیره کنید
        for ($i = $min; $i <= $max; $i++) {
            
            if (isPrime($i)) {
                $n ++;
                $primeNumbers[] = array("num"=>$i,"n" => $n);
            }
        }
        echo "<div class='discription'>"." تعداد اعداد اول از".$min." تا".$max." برابر است با: ".count($primeNumbers)."</div>"."<br>";
        // اعداد اول را چاپ کنید
        foreach ($primeNumbers as $prime) {
            echo '<strong data-bs-toggle="tooltip" data-bs-placement="top" title="'.$prime["n"].'" >'.$prime["num"].'</strong>' . '<span class="n">    |    </span>';
            
        }
    }else{
        echo "عدد اول باید از عدد دوم کوچکتر باشد نه بزرگتر";
    }
}

?>
<style>
    .discription{
        text-align: center;
        
    }
    button{
        background-color: yellow;
        font-family: irancell;
        border-radius: 8px;
        margin-left:  46%;
        font-size: 20px;
        margin-top: 1%;
    }
    
    ::-webkit-scrollbar {
    width: 10px; /* عرض اسکرول بار */
}

/* نوار اسکرول بار */
::-webkit-scrollbar-track {
    background: black; /* رنگ پس زمینه نوار اسکرول بار */
}

/* دامنه اسکرول بار */
::-webkit-scrollbar-thumb {
    background: white; /* رنگ دامنه اسکرول بار */
	border-radius: 15px;
}

/* دامنه اسکرول بار در حالت هاور (روی اسکرول بار حرکت کردن موس) */
::-webkit-scrollbar-thumb:hover {
    background: white; /* رنگ دامنه اسکرول بار در حالت هاور */
}
    
    .n{
        color: yellow;
        font-size: 20px;
    }
</style>
