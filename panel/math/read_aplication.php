<?php
require_once(dirname(__DIR__).'/config/config.php');
$postdata=array(
    'num_1'=>'12',
    'num_2'=>'12',
    'prampet'=>'2',
);
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
echo get_aplication(url.'math/math_render.php');