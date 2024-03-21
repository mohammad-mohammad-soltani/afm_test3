<?php

function insert_into($data , $value, $file = null){
    $data[] = $value;
    if(!is_null($file)){
        file_put_contents($file , json_encode($data, JSON_UNESCAPED_UNICODE));
    }
    return $data;

}
function get_updates(){
    return json_decode(file_get_contents("msg_validate.json",true));
}
class client {
    
   
    
    function msg_add($update_id){
        
        $insertData = array(
            "update_id" => $update_id,
            "chatID" => $this -> chatId,
            "time" => time()
        );
        insert_into(get_updates(),$insertData,"msg_validate.json");
        
    }

    function isset_msg($update_id){
        
    }
    function bot_run($token){
        $this -> botToken = $token;
        $this -> webhookURL = "https://tapi.bale.ai/bot".$this -> botToken;
        $input = file_get_contents("php://input");
        $update = json_decode($input, true);
        global $update;
    }
    
    function get_msg(){
        global $update;
        
        if(isset($update['callback_query'])){
            $this -> method = "call_back";
            $this -> chatId = $update['callback_query']['message']['chat']['id'];
        }else{
            $this -> method = "text";
            $this -> chatId = $update['message']['chat']['id'];
        }
        return $update;
    }
}
$data = new client();
