<?php
require_once(dirname(__DIR__)."/config/config.php");
function isPrime($num,$w) {
    $is = true;
    if($num == 1){
        $is = false;
    }
    if ($num <= 1) {$is = false;}
    if ($num <= 3) {$is = true;}
    if ($num % 2 == 0 || $num % 3 == 0){ $is =  false;}
    for ($i = 5; $i * $i <= $num; $i = $i + 6) {
        if ($num % $i == 0 || $num % ($i + 2) == 0){ $is =  false;}
    }
    

    if($is == true){
        echo "<span>عدد ".$w."که وارد کرده اید جزو دسته اعداد اول است</span>";
    }if($is == false){
        echo "<span>عدد ".$w."که وارد کرده اید جزو دسته اعداد اول نیست</span>";
    }
}
function minos($one,$two){
    if($one > $two){
        return $one-$two;
    }else{
        return $two-$one;
    }
}
function gcd($a, $b)
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function findLCM($a, $b)
{
    return abs($a * $b) / gcd($a, $b);
}

function findSmallestCommonMultiple($num1, $num2)
{
    $lcm = findLCM($num1, $num2);
    $gcd = gcd($num1, $num2);
    

    $smallestMultiple = abs($num1 * $num2) / $gcd;
    if($gcd == 1){
        $gcd .= " : این دو عدد نسبت به هم متباین هستند. (شمارنده مشترک ندارند)";
    }
    return [
        'smallestMultiple' => $smallestMultiple,
        'gcd' => $gcd,
        'lcm' => $lcm,
    ];
    
}

function count_prime($one , $two) {
    if($two < $one){
        $save = $two;
        $two = $one;
        $one = $save;
    }
    function is_Prime($num) {
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
    
    // اعداد اول از 1 تا max را پیدا کنید و در آرایه ذخیره کنید
    for ($i = $one; $i <= $two; $i++) {
        if (is_Prime($i)) {
            $primeNumbers[] = $i;
        }
    }
    return count($primeNumbers);
}
function print_info($num){
    $mode = array();
    
    if(!is_float($num)){
        if(!is_float($num)){
            array_push($mode,"اعداد صحیح");
        }
        if($num >= 0){
            array_push($mode,"اعداد حسابی");
        }
        if($num > 0){
            array_push($mode,"اعداد طبیعی");
        }
    }elseif(is_float($num)){
        array_push($mode , "اعداد اعشاری");
    }else{
        return "زیر مجموعه این عدد در سیستم ما تعیین نشده است!";
    }
    $string = "";
    foreach($mode as $key){
        $string = $string.$key." ";
        
    }
    return $string;
    
}
function primeFactors($n) 
{ 
      
    $nums = '';
    $data = [];
    while($n % 2 == 0) 
    { 
        $nums = $nums."2"." * "; 
        if(isset($data[2])){
            $data[2]["count"] += 1;
        }else{
            $data[2] = array(
                "count" => 1,
                "number" => 2,
            );
        }
        $n = $n / 2; 
    } 
  
    
    for ($i = 3; $i <= sqrt($n);  
                   $i = $i + 2) 
    { 
          
         
        while ($n % $i == 0) 
        { 
            $nums = $nums. $i." * "; 
            if(isset($data[$i])){
                $data[$i]["count"] += 1;
            }else{
                $data[$i] = array(
                    "count" => 1,
                    "number" => $i,
                );
            }
            $n = $n / $i; 
        } 
    } 
  
    
    
    if ($n > 2) 
    $nums = $nums. $n." "; 
    $data[$n] = array(
        "count" => 0,
        "number" => $n
    );
    $out = "";
    foreach($data as $key){
        if($key["count"] > 1){
            $out .= " </span>".$key["number"]."<sup>".$key["count"]."</sup>"."</span>"."* ";
        }else{
            $out .= " </span>".$key["number"]."</span>"."* ";
        }
    }
    return $out;
} 
$result = findSmallestCommonMultiple($_GET["num_1"] , $_GET["num_2"] );
?>
<script>
    
</script>
<br>
<ul id="for_save">
    <li class="num1"><span>عدد اول</span><span>:</span><span><?php echo $_GET["num_1"] ?></span></li>
    <li class="num2"><span>عدد دوم</span><span>:</span><span><?php echo $_GET["num_2"] ?></span></li>
    <li class="z1"><span>عدد اول از زیر مجموعه های زیر است</span><span>:</span><span><?php echo print_info($_GET["num_1"]) ?></span></li>
    <li class="z2"><span>عدد دوم از زیر مجموعه های زیر است</span><span>:</span><span><?php echo print_info($_GET["num_2"]) ?></span></li>
    <li class="z1"><span>ک.م.م </span><span>:</span><span><?php echo $result['lcm'] ?></span></li>
    <li class="z2"><span>ب.م.م </span><span>:</span><span><?php echo $result['gcd']  ?></span></li>
    <li class="isprime1"><?php echo isPrime($_GET["num_1"],"اولی ") ?></li>
    <li class="isprime2"><?php echo isPrime($_GET["num_2"],"دومی ") ?></li>
    <li class="t"><span>اختلاف دو عدد:</span><span><?php echo minos($_GET["num_1"],$_GET["num_2"])  ?></span></li>
    <li class="sum"><span>مجموع دو عدد :</span><span><?php echo $_GET["num_1"]+$_GET["num_2"]  ?></span></li>
    <li class="tag1"><span>تجزیه عدد اول : </span><span><?php echo primeFactors($_GET["num_1"])   ?></span></li>
    <li class="tag2"><span>تجزیه عدد دوم : </span><span><?php echo primeFactors($_GET["num_2"])   ?></span></li>
    <li class="sqrt1"><span> جذر عدد اول:</span><span><?php echo sqrt($_GET["num_1"]) ?></span></li>
    <li class="sqrt2"><span>جذر عدد دوم:</span><span><?php echo sqrt($_GET["num_2"])  ?></span></li>
    <li class="min"><span>تفریق عدد اول از عدد دوم :</span><span><?php echo $_GET["num_1"]-$_GET["num_2"]  ?></span></li>
    <li class="zarb"><span>ضرب دو عدد :</span><span><?php echo $_GET["num_1"]*$_GET["num_2"]  ?></span></li>
    <li class="taghsim"><span>تقسیم دو عدد :</span><span><?php echo $_GET["num_1"]/$_GET["num_2"]  ?></span></li>
    <li class="tavan1"><span>مربع عدد اول :</span><span><?php echo $_GET["num_1"]**2  ?></span></li>
    <li class="tavan2"><span>مربع عدد دوم</span><span><?php echo $_GET["num_2"]**2  ?></span></li>
    <li class="primebein"><span>تعداد اعداد اول بین عدد اول و دوم: </span><span><?php echo count_prime($_GET["num_1"],$_GET["num_2"]) ?></span></li>
</ul>
<!--
<a href="<?php /* echo url."math/save.php?filename=".$file_name */ ?>"><button class="btn btn-primary " >دانلود خروجی</button></a>
-->
