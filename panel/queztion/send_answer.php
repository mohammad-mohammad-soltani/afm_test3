<?php
require_once(dirname(__DIR__).'/config/config.php');
require_once(dirname(__DIR__).'/config/db_config.php');
$conn = new mysqli(server,username,password,db);
if(isset($_REQUEST["text"])){
    $name = "answer";
$text = $_REQUEST["text"];
$text = $conn->real_escape_string($text);
$name = $conn->real_escape_string($name);
$text = $Parsedown->text($text);
$name = $Parsedown->text($name);
$id = $_REQUEST["id"];
$username = math_ai_init()["username"]; 
$sql = "INSERT INTO `queztions`(`id`, `username`, `time`, `q_type`, `for_id`, `title`, `text`,`active`) VALUES (NULL,'".$username."','".time()."','answer','$id','".$name."','".$text."','ni')";
$conn->query($sql);
$conn->close();


}
