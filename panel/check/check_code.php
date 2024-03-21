<?php
if(isset($_POST["code"]) && isset($_GET["username"])){
    $data=json_decode(file_get_contents(directory."check/active_codes.json"),true);
    if($data[$_GET["username"]]["code"] == $_POST["code"]){
        $conn = new mysqli(server,username,password,db);
        $username = $_GET["username"];
        $sql = "UPDATE `users_db` SET `active`='true' WHERE `username`='$username';";
        $conn -> query($sql);
        $conn -> close();
        echo "true";
        $_SESSION['username'] = $username;
    $_SESSION['access'] = "sub";
    $_SESSION['defult_mode'] = "dark_mode";
    $_SESSION['login_time'] = time();
    create_web_client($username);
    header("location: ".login_page);
    }else{
        header(url."auth/singup/active_account?U=".$_GET["username"]."&false");
    }

}else{
    header(url."auth/singup/active_account?U=".$_GET["username"]."&false");
}
