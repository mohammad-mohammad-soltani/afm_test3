<?php
require_once(dirname(__DIR__).'/config/config.php');
require_once(dirname(__DIR__).'/config/db_config.php');
require_once(dirname(__DIR__)."/markdown/vendor/erusev/parsedown/Parsedown.php");
$Parsedown = new Parsedown();
$conn = new mysqli(server,username,password,db);
$name = $_REQUEST["name"];
$text = $_REQUEST["text"];
$text = $conn->real_escape_string($text);
$name = $conn->real_escape_string($name);
$text = $Parsedown->text($text);
$name = $Parsedown->text($name);
$username = math_ai_init()["username"]; 
$sql = "INSERT INTO `queztions`(`id`, `username`, `time`, `q_type`, `for_id`, `title`, `text`, `active`) VALUES (NULL,'".$username."','".time()."','queztion','..','".$name."','".$text."','question')";
$conn->query($sql);
$conn->close();

