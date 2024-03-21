<?php

require_once(dirname(__DIR__)."/config/db_config.php");
$conn = new mysqli(server,username,password,db);
$api = sha1($_POST["username"].uniqid());
echo $api;
$username = $_POST["username"];
$conn->query("INSERT INTO `key_db`(`id`, `api`, `username`, `requests`,`max`) VALUES (NULL,'$api','$username','0','1000')");
$conn->close();
