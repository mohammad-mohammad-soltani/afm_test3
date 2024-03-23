<?php 

require_once(dirname(__DIR__)."/markdown/vendor/erusev/parsedown/Parsedown.php");
$Parsedown = new Parsedown();
if(trim($_POST["value"]) == ""){
    echo "لطفا متنی را وارد نمایید";
}else{
    $conn = new mysqli(server,username,password,db);
    $username = ai_init()["username"];
    $sql = "SELECT * FROM `special_ai` WHERE `username`='$username'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $messages = array();
        while($row = $result->fetch_assoc()){
            $messages[] = array(
                "role" => $row["role"],
                "content" => $row["text"]
            );
        }
        $data = array(
            "messages" => $messages,
            "prompt" => $_POST["value"],
        );
        
        $jsonData = json_encode($data);

        $url = "https://api3.haji-api.ir/sub/gpt/3/role?key=".hajiAPI;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);
        if($response == false){
            echo "خطایی به وجود آمد لطفا بعدا دوباره امتحان کنید";

        }else{
            $time = time();
            $question = $_POST["value"];
            if(isset(json_decode($response,true)["result"])){
                $answer = json_decode($response,true)["result"];
           // $answer =  str_replace("\n"," <br> ",$answer);
           // Create a new Parsedown object
            

                // Parse the Markdown content to HTML
                $html = $Parsedown->text($answer);

                // Output the HTML content
                echo $html;

            
            // تصحیح متغیرهای $question و $answer
$question = $conn->real_escape_string($question);
$answer = $conn->real_escape_string($html);

// دستور SQL بعد از تصحیح متغیرها
$sql = "INSERT INTO `special_ai`(`id`, `time`, `text`, `role`, `username`) VALUES (NULL, '$time', '$question', 'user', '$username')";
$conn->query($sql);

$sql = "INSERT INTO `special_ai`(`id`, `time`, `text`, `role`, `username`) VALUES (NULL, '$time', '$answer', 'assistant', '$username')";
$conn->query($sql);
            }else{
                echo "خطایی وجود دارد";
            }
            
        }
        }else{
            $time = time();
        echo "خوش آمدید . برای استفاده از چت بات شما میتوانید پیام های خودتان را ارسال کنید . نکته : پیام های شما در کارکرد ربات تاثیر مستقیم دارد";
        $sql = "INSERT INTO `special_ai`(`id`,`time`, `text`, `role`, `username`) VALUES (NULL,'$time', 'first_message', 'user', '$username')";
        $conn -> query($sql);
    }

    

    $conn -> close();
}
    
