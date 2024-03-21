<?php
require_once(dirname(__DIR__)."/markdown/vendor/erusev/parsedown/Parsedown.php");
require_once(dirname(__DIR__).'/config/config.php');
require_once(dirname(__DIR__).'/config/db_config.php');
$Parsedown = new Parsedown();


    $ai = "AFM";
    $ai_link = "https://api3.haji-api.ir/sub/gpt/4";
    $ai_list = array(
        "0" => array(
            "name" => "ریاضی دان AFM :",
            "link" => "https://api3.haji-api.ir/sub/gpt/3/role",
        ),
        "1" => array(
            "name" => "GPT-4",
            "link" => "https://api3.haji-api.ir/sub/gpt/4",
        ),
        "2" => array(
            "name" => "GPT-3.5 turbo",
            "link" => "https://api3.haji-api.ir/sub/gpt/3-5/turbo",
        ),
        "3" => array(
            "name" => "GPT-3",
            "link" => "https://api3.haji-api.ir/sub/gpt/3",
        ),
        "4" => array(
            "name" => "GPT-3",
            "link" => "https://api3.haji-api.ir/sub/gpt/bing",
        ),
        "5" => array(
            "name" => "GPT-4 web",
            "link" => "https://api3.haji-api.ir/sub/gpt/4/web",
        ),
    );
    if(isset($_POST["username"])){
        $username = $_POST["username"];
        $continue = true;
    }else{
        if($_SESSION["username"] == math_ai_init()["username"]){
            $username = math_ai_init()["username"];
            $continue = true;
        }else{
            $continue = false;
        }
        
    }
    if(isset($_REQUEST["ai"])){
        $ai_num =  $_REQUEST["ai"];
        $ai_link = $ai_list[$ai_num]["link"];
        $ai = $ai_list[$ai_num]["name"];
    }

if($continue != false && $_REQUEST["ai"] != 0 ){
    function prampet_read($column_name)
{
    global $sql;
    global $username;
    $column = "prampet".$column_name;
    
    $result = $sql->query("SELECT $column FROM users_db WHERE username = '$username'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row[$column];
    }
    return '';
}

$sql = new mysqli(server, username, password, db);
function get_action(){
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action']==true) {
            return 'جواب  این سوال را با راه حل ارائه کن';
        }
    }
    if(!isset($_REQUEST['action'])){
            return 'بدون راه حل فقط جواب سوال را ارائه کن';
    }
    
}
function numbers($num){
    if ($num=1) {
        if (isset($_REQUEST['num_1'])) {
            return $_REQUEST['num_1'];
        }
    }
    if ($num=2) {
        if (isset($_REQUEST['num_2'])) {
            return $_REQUEST['num_2'];
        }
    }
}
function text_reader($column_name){
    global $sql;
    global $username;
    $result = $sql->query("SELECT * FROM users_db WHERE username = '$username'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row[$column_name];
    }
    return '';
}

$txt = "role : sistem  message : "."تو یه هوش مصنوعی به اسم AFM هستی که باید به طور دقیق و کامل به سوالات ریاضی کاربران وبسایت من پاسخ بدهی".PHP_EOL;
$replacer=$txt."role : user massage :  ".str_replace('%n1%',numbers(1),prampet_read($_REQUEST["prampet"]).text_reader("text_variable"));
$replacer2=str_replace('%n2%',numbers(2),$replacer);
$replacer3=str_replace('%last%',text_reader('last_answer'),$replacer2);
$replacer4=str_replace('%name%',text_reader('name'),$replacer3);
$replacer5=str_replace('%user%',text_reader('username'),$replacer4);



$aplication= $replacer5;
//echo $aplication;

function get_aplication($url){
    global $postdata;
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$postdata);
    $out=curl_exec($ch);
    
    curl_close($ch);
    return $out;
}

$postdata = array(
    'text'=>$aplication,
);

$text = $aplication;
if(isset($_REQUEST["added_text"])){
    $r = $_REQUEST["added_text"];
}else{
    $r = null;
}
$added = $r;
$url = $ai_link."?key=6g3hXi3bf140bsSdPDt5dphA3GXCKF5Wct8UZ7N0U&q=" . urlencode($text.$added);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

    $json = json_decode($response, true);
    if (isset($json['result'])) {
        
            $answer = $json['result'];
        echo "پاسخ ارائه شده توسط هوش مصنوعی  ".$ai.":"."<br> <br>";
        echo  $Parsedown->text($answer);

        $answer = $sql->real_escape_string($answer);
        $sql->query("UPDATE `users_db` SET  `last_answer` = '".$Parsedown->text($answer)."' WHERE `username` =  '".$username."'");
        exit;
        
        
    }else{
        echo "خطایی وجود دارد لطفا بعدا امتحان کنید";
        //echo $aplication;
    }
    








$sql->close();


}else{
    echo "ERROR";
}

