<?php
require_once(dirname(__DIR__)."/markdown/vendor/erusev/parsedown/Parsedown.php");
function get_month($month){
    switch ($month) {
        case '1':
            # code...
            $month = "فروردین";
            break;
        case '2':
            # code...
            $month = "اردیبهشت";
            break;
        case '3':
            # code...
            $month = "خرداد";
            break;
        case '4':
            # code..
            $month = "تیر";
            break;
        case '5':
            # code...
            $month = "مرداد";
            break;
        case '6':
            # code...
            $month = "شهریور";
            break;
        case '7':
            # code...
            $month = "مهر";
            break;
        case '8':
            # code...
            $month = "آبان";
            break;
        case '9':
            # code...
            $month = "آذر";
            break;
        case '10':
            # code...
            $month = "دی";
            break;
        case '11':
            # code...
            $month = "بهمن";
            break;
        case '12':
            # code...
            $month = "اسفند";
            break;
    }
    return $month;
}
function date_time_stamp($time){
    $year = jdate(" Y " ,$time , "");
    $month = get_month($data= jdate("n" ,$time , ""));
    $day = jdate("j" ,$time , "");
    return "در ".$day." ".$month." سال ".$year."مطرح شد.";


}
