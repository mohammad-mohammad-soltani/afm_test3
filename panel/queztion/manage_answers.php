<?php
require_once(header);
$conn = new mysqli(server,username,password,db);
$username = $_SESSION["username"];
$sql = "SELECT * FROM `queztions` WHERE `username` = '$username' AND `q_type` = 'queztion'";

$res = $conn->query($sql);

if($res-> num_rows > 0){
    $answers_id = array();
    while($row = $res->fetch_assoc()){
        $answers_id[] = array(
            "id" => $row["id"],
            "title" => $row["title"]
        );
    }

    ?>
    <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">پاسخ ها</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>پاسخ هایی که شما باید آنها را تایید یا رد کنید در اینجا هستند</p>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                    
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            
                            <div class="nk-block">
                                <div class="row g-gs">
    <?php
    foreach($answers_id as $key){
        $sql = "SELECT * FROM `queztions` WHERE  `for_id` = '".$key["id"]."' ORDER BY time DESC";
        $res = $conn -> query($sql);

        if($res -> num_rows > 0 ){
            ?>
            <h4>پاسخ های مطرح شده برای : <a href="<?php echo url."question_viwe/".$key["id"] ?>"><?php echo $key["title"] ?></a></h4>
            <?php
            while($row = $res -> fetch_assoc()){

                $sql2 = "SELECT * FROM profile_db WHERE `username` = '".$row["username"] ."' ";
        $result2 = $conn->query($sql2);
        $row_2 = $result2->fetch_assoc();
                $sql2 = "SELECT * FROM users_db WHERE `username` = '".$row["username"] ."' ";
        $result2 = $conn->query($sql2);
        $row_3 = $result2->fetch_assoc();
        
                ?>
                <div class="col-sm-6 col-xl-4">
                                        <div class="card h-100">
                                            <div class="card-inner">
                                                <div class="project">
                                                    <div class="project-head">
                                                        <a href="<?php echo url."users/".$row_2["account_id"] ?>" class="project-title">
                                                            <div class="user-avatar sq bg-purple"><img src="<?php echo user_avatar ?>" alt=""></div>
                                                            <div class="project-info">
                                                                <h6 class="title"><?php echo $row_2["display_name"] ?></h6>
                                                                <span class="sub-text"><?php echo print_access($row_3["access"]) ?></span>
                                                            </div>
                                                        </a>
                                                        <!--<div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="html/apps-kanban.html"><em class="icon ni ni-eye"></em><span>View Project</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Project</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>-->
                                                    </div>
                                                    <div class="project-details">
                                                        <a href="<?php echo url."get_answer/".$row["id"] ?>" class="btn btn-primary mx-auto">مشاهده کامل متن پاسخ</a>
                                                    </div>
                                                    <div class="project-progress">
                                                        
                                                    </div>
                                                    <div class="project-meta">
                                                        
                                                        <span class="badge badge-dim bg-warning"><em class="icon ni ni-clock"></em><span><?php echo jdate("   Y/n/j G:i" ,$row["time"] , "") ?></span></span>
                                                        <?php
                                                        if($row["active"] == "true"){
                                                            ?>
                                                            <span class="badge badge-dim bg-success"></em><span>وضعیت : تایید شده</span></span>
                                                            <?php
                                                        }elseif($row["active"] == "false"){
                                                            ?>
                                                            <span class="badge badge-dim bg-danger"></em><span>وضعیت : رد شده</span></span>
                                                            <?php
                                                        }elseif($row["active"] == "ni"){
                                                            ?>
                                                            <span class="badge badge-dim bg-info"></em><span>وضعیت : تایید نشده</span></span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
            }
        }
    }
    ?>
    
                                    
                                    
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
                </div>
    <?php
}else{
    ?>
    <div class="alert alert-info alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em> <strong>شما تا کنون سوالی مطرح نکرده اید به همین دلیل پاسخی هم برای شما نوشته نشده است !</strong>
                                                        </div>
    <?php
}


$conn->close();
require_once(footer);