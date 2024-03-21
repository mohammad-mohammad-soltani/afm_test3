<?php
if(function_exists("answer_manage_init")){
    $data = answer_manage_init();
    $WEB_C = $key;
    require_once(header);
    $conn = new mysqli(server,username,password,db);
    if($_SESSION["WEB_C"] == $WEB_C && $_SESSION["username"] == $data["username"]){
        if(isset($_GET["active"])&&isset($_GET["id"])){
            $mode = $_GET["active"];
            $id = $_GET["id"];
            
                $sql = "SELECT `for_id` FROM `queztions` WHERE `id` = '$id' AND `q_type`='answer'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    $f_id = $row["for_id"]; 
                    $sql = "SELECT `username` FROM `queztions` WHERE `id` = '$f_id' ";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    if($row["username"] == $_SESSION["username"]){
                        if($mode == "true"){
                            $sql = "UPDATE `queztions` SET `active`='true' WHERE `id` = '$id'";
                            
                            $sql2 = "SELECT * FROM  `queztions`  WHERE `id` = '$id'";
                            $result = $conn->query($sql2);
                            if($result->num_rows > 0){
                                $row = $result -> fetch_assoc();
                                $username = $row["username"];
                                if($username != $_SESSION["username"]){
                                    $sql3 = "SELECT `coin` FROM  `users_db`  WHERE `id` = '$id'";
                                $coin = $conn->query($sql3)->fetch_assoc()["coin"];
                                $coin += 1;
                                $sql4 = "UPDATE `users_db` SET `coin`='".$coin."' WHERE `username` = '$username'";
                                $conn -> query($sql4);
                                }
                                
                            }
                            if($conn->query($sql)){
                                ?>
                                <p>عملیات تایید پاسخ با موفقیت صورت پذیرفت</p>
                                <script>
                                    window.location = '<?php echo url."manage_answers" ?>';
                                </script>
                                <?php
                            }else{
                                ?>
                                <p>مشکلی پیش آمده.لطفا مجددا امتحان نمایید</p>
                                <?php
                            }
                        }elseif($mode == "false"){
                            $sql = "UPDATE `queztions` SET `active`='false' WHERE `id` = '$id'";
                            
                            $sql2 = "SELECT * FROM  `queztions`  WHERE `id` = '$id'";
                            $result = $conn->query($sql2);
                            if($result->num_rows > 0){
                                $row = $result -> fetch_assoc();
                                $username = $row["username"];
                                if($username != $_SESSION["username"]){
                                    $sql3 = "SELECT `coin` FROM  `users_db`  WHERE `id` = '$id'";
                                $coin = $conn->query($sql3)->fetch_assoc()["coin"];
                                $coin -= 1;
                                $sql4 = "UPDATE `users_db` SET `coin`='".$coin."' WHERE `username` = '$username'";
                                $conn -> query($sql4);
                                
                                }
                                
                            }
                            if($conn->query($sql)){
                                ?>
                                <p>عملیات رد کردن پاسخ با موفقیت صورت پذیرفت</p>
                                <script>
                                    window.location = '<?php echo url."manage_answers" ?>';
                                </script>
                                <?php
                                
                            }else{
                                ?>
                                <p>مشکلی پیش آمده.لطفا مجددا امتحان نمایید</p>
                                <?php
                            }
                        }else{
                            access_denide();
                            ?>
                             <p>شما توسط سیستم ما یک بد افزار شناسایی شده اید به این منظور اگر بار دیگر درخواست به این صفحه تکرار شود اکانت شما به کلی حذف خواهد شد</p>
                            <?php
                        }
                    }else{
                        ?>
                        <p>شما سازنده این سوال نیستید و اجازه رد کردن یا تایید پاسخ ها را ندارید</p>
                        <?php
                    }
                }else{
                    access_denide();
                ?>
                 <p>شما توسط سیستم ما یک بد افزار شناسایی شده اید به این منظور اگر بار دیگر درخواست به این صفحه تکرار شود اکانت شما به کلی حذف خواهد شد</p>
                <?php
                }
            
        }else{
            ?>
            <p>مشکلی وجود دارد . لطفا به صفحه قبل بازگردید و دوباره اقدام بفرمایید</p>
            <?php
        }
    }else{
        access_denide();
        ?>
        <p>شما توسط سیستم ما یک بد افزار شناسایی شده اید به این منظور اگر بار دیگر درخواست به این صفحه تکرار شود اکانت شما به کلی حذف خواهد شد</p>
        <?php
    }
    $conn->close();
    require_once(footer);
}else{
    access_denide();
    echo "شما اجازه دسترسی به این صفحه را ندارید";
}
