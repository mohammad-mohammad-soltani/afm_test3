<?php
require_once(dirname(__DIR__)."/config/db_config.php");
$sql = new mysqli(server, username, password, db);
$sql->query("DELETE FROM `nots_db` WHERE `nots_db`.`id` = ".$_REQUEST['id']);
header("location: note_list.php");
$sql->close();