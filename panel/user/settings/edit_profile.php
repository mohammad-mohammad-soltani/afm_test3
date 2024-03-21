<?php
$conn = new mysqli(server,username,password,db);
$username = edit_profile()["username"];
$display_name = htmlentities($_POST["display_name"]);
$bio = htmlentities($_POST["bio"]);
$sql = "UPDATE `profile_db` SET `display_name`='$display_name' , `discription`='$bio' WHERE `username`='$username' ";
$conn -> query($sql);
$conn->close();
header("location: ".url);