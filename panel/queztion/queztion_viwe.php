<?php
require_once(dirname(__DIR__).'/config/config.php');
require_once(dirname(__DIR__).'/config/db_config.php');
$conn = new mysqli(server,username,password,db);
function get_hight(){
    echo '650px';
}
function get_title(){
    echo 'افزودن یادداشت';
}
require_once(header);
$id = questioninfo_init();
$sql = "SELECT * FROM queztions WHERE id = '".$id."' AND q_type = 'queztion'";
$result = $conn->query($sql);
if($result->num_rows == 0){
    header("location: ".url."lib/404_eror_page.php");
}
if(isset($_GET["delete"]) && admin()){
    $sql = "DELETE FROM `queztions` WHERE `id`='$id' OR `for_id`='$id'";
    $conn->query($sql);
    ?>
    <script>
        window.location = '<?php echo url."queztions" ?>'
    </script>
    <?php
}
$row = $result->fetch_assoc();
$text = $row["text"];
$title = $row["title"];
$time = $row["time"];

$username = $row["username"];
$sql2 = "SELECT * FROM profile_db WHERE `username` = '".$row["username"] ."' ";
        $result2 = $conn->query($sql2);
        $row_2 = $result2->fetch_assoc();
        
        $sql3 = "SELECT * FROM users_db WHERE `username` = '".$row["username"] ."' ";
        $result3 = $conn->query($sql3);
        $row_3 = $result3->fetch_assoc();
        

if(admin()){
    $delete = '<a href="'.url.'question_viwe/'.$row["id"].'?delete=true"><span class="text-danger">حذف تمامی اطلاعات این سوال</span></a>';
}else{
    $delete = null;
}
                echo '<div class="card">
        
                <div class="card-header border-bottom bg-dark text-light col-12">
                    <div class="row">
                   
                    <div class="user-card">
                        <div class="user-avatar">
                        <a href="'.url."users/".$row_2["account_id"].'"><img src="'.user_avatar.'" alt="'.$row_2["display_name"].' "></a>
                        </div>
                        <div class="user-info">
                        <a href=" '.url."question_viwe/".$row["id"].' "><span class="col-3 text-white">'.$row["title"].'</span></a>
                        <span class="sub-text text-light">'."توسط"."<a href='".url."users/".$row_3["username"]."'>".$row_2["display_name"]."</a> ".date_time_stamp($row["time"]).'</span>
                        '.$delete.'
                        </div>
                    </div>
                    
                        
                    </div>
                </div>
                <div class="card-inner">
                    
                    <p class="card-text text-white">'.$row['text'].'</p>
                    <a href="'.url.'answer_the_question/'.$row["id"].'" class="btn btn-primary col-12"><span>ثبت پاسخ بر روی این پرسش</span></a>
                    
                </div>
            </div>';
                ?>
                <br>
                <?php
                $id = $row["id"];
                $sql = "SELECT * FROM `queztions` WHERE `for_id`='$id' AND `q_type`='answer' AND `active`='true' ORDER BY time DESC";
                $result = $conn->query($sql);
                if($result -> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        ?>
                    <div class="card">       
                        <div class="card-header border-bottom bg-dark text-light col-12">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <a href="<?php echo url."users/".$row_2["account_id"] ?>"><img src=" <?php echo user_avatar;?> " alt="<?php echo $row_2["display_name"] ?> "></a>
                                </div>
                                <div class="user-info">
                                    <a href=" <?php echo url."users/".$row_3["username"] ?>"><span class="col-3 text-white"><?php echo $row_2["display_name"] ?></span></a>
                                    <?php
                                    echo '<span class="sub-text text-light">'."توسط"."<a href='".url."users/".$row_3["username"]."'>".$row_2["display_name"]."</a> ".date_time_stamp($row["time"]).'</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner text-white">
                            <?php
                            echo $row["text"];
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                    
                }else{
                    ?>
                        <h4 class="alert text-danger">پاسخ تایید شده ای برای این سوال وجود ندارد</h4>
                    <?php
                }
                ?>
                          
<?php
$conn->close();
require_once(footer);
?>