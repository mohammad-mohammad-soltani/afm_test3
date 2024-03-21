<?php
function afm_clinet($api){
    define('API_TOKEN_AFM',$api);
    function afm_chat_with_ai($prompt,$num_1,$num_2,$save){
        if(is_int($prompt)&&is_int($num_1)&&is_int($num_2)){
            file_get_contents("");
        }else{
            die("ERROR : Invalid type parameter of afm_chat_whith_ai in file:".__FILE__."  and line : ".__LINE__);
        }
    }
}
class CHAT_WITH_AFM {
    function start($apiToken=null){
        if(!is_null($apiToken)){
            $this->API_TOKEN_AFM = $apiToken;
            return true;
            if(!function_exists("AFM")){

            }else{
                return false;
            die("ERROR : plz type  FILE : :".__FILE__."  and LINE : ".__LINE__);
            }
        }else{
            return false;
            die("ERROR : enter api token in start function FILE : :".__FILE__."  and LINE : ".__LINE__);
            
        }
        
    }
}
