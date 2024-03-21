<?php
require_once(dirname(dirname(__DIR__))."/config/db_config.php");
$con = new mysqli(server,username,password,db);
$sql = "DELETE FROM `users_db` WHERE `users_db`.`id` ='".$_GET['id']."'";
$con->query($sql);
?>
<script>window.close()</script>