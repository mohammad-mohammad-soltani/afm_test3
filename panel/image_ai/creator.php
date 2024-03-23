<?php
require_once(dirname(__DIR__)."/config/db_config.php");
$text = $_REQUEST["request"];
$model = $_REQUEST["ai_model"];
$response = file_get_contents("https://api3.haji-api.ir/lic/ai/image/draw?p=".urlencode($text)."&license=oDAGEwCD6c4A5FdqNJy0jhb06XbOS9IcLOBpUklRLpmu&model=$model");
$response = json_decode($response,true);
?>
<div class="row g-gs">
<?php
$i = 0;
$images = array();
foreach($response["result"] as $key){
    $data = file_get_contents($key);
    $filename = $_SESSION["WEB_C"].uniqid().".jpg";
    $images[] = $filename;
    $file_name = directory."image_ai/uploads/".$filename;
    file_put_contents($file_name , $data);
    $i ++;
    ?>
    
    <div class="col-sm-6 col-lg-4">
         <div class="gallery card">
             <a class="gallery-image popup-image" href="<?php echo url . "image_ai/uploads/".$filename ?>">
                 <img class="w-100 rounded-top" src="<?php echo url . "image_ai/uploads/".$filename ?>" alt="">
             </a>
             <div class="gallery-body card-inner align-center justify-between flex-wrap g-2 text-white" dir="auto">
                 <?php
                 echo $text;
                
                 ?>
             </div>
         </div>
    
    </div>

    <?php
}
$conn = new mysqli(server,username,password,db);
$images = json_encode($images);
$username = ai_init()["username"];
$time = time();

$prompt = $conn -> real_escape_string($text);
$sql = "INSERT INTO `image_ai`(`id`, `username`, `time`, `model`, `images` , `prompt`) VALUES (NULL,'$username','$time','$model','$images' , '$prompt')";
$conn->query($sql);
$conn -> close();
?>
</div>
