<?php
$text = $_REQUEST["request"];
$response = file_get_contents("https://api3.haji-api.ir/lic/ai/image/draw?p=".urlencode($text)."&license=oDAGEwCD6c4A5FdqNJy0jhb06XbOS9IcLOBpUklRLpmu&model=defult");
$response = json_decode($response,true);
?>
<div class="img row" dir="rtl">
<?php
$i = 0;
foreach($response["result"] as $key){
    $data = file_get_contents($key);
    $file_name = directory."image_ai/uploads/".$_SESSION["WEB_C"].uniqid().".jpg";
    $handle = fopen($file_name , "w");
    fwrite($handle , $data);
    fclose($handle);
    $i ++;
    ?><div class="col-sm-6 col-xl-4">
    
    <img src="<?php echo $key ?>" class="card h-100" alt="<?php echo $text ?>">
    
    </div>

    <?php
}
?>
</div>
