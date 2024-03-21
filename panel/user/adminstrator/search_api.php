<?php
require_once (dirname(dirname(__DIR__)).'/config/config.php');
require_once (dirname(dirname(__DIR__)).'/config/db_config.php');
$conn = new mysqli(server, username, password, db);

// اعتبارسنجی و فیلتر کردن داده‌های درخواست
$search = $conn->real_escape_string($_REQUEST["search"]);



$sql = "SELECT * FROM key_db WHERE (username LIKE '%$search%' OR api LIKE '%$search%' )";
$result = $conn->query($sql);
$user_count =  0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sql = "SELECT email FROM users_db WHERE username = '".$row["username"]."'";
        $res = $conn->query($sql);
        $email = $res->fetch_assoc()["email"];
        
        echo '  <div class="nk-tb-item " id="ajax!user">
        <div class="nk-tb-col nk-tb-col-check">
            <div class="custom-control custom-control-sm custom-checkbox notext">
                <input type="checkbox" class="custom-control-input" id="uid1">
                <label class="custom-control-label" for="uid1"></label>
            </div>
        </div>
        <div class="nk-tb-col">
            <a href="html/user-details-regular.html">
                <div class="user-card">
                    <div class="user-avatar bg-primary">
                    <img src=" https://www.gravatar.com/avatar/'.md5($email).'?s=150 " alt="">
                    </div>
                    <div class="user-info">
                        <span class="tb-lead">'.$row["username"].'<span class="dot dot-success d-md-none ms-1"></span></span>
                        
                    </div>
                </div>
            </a>
        </div>
        <div class="nk-tb-col tb-col-mb">
            <span class="tb-amount">'.$row["api"].'</span>
        </div>
        <div class="nk-tb-col tb-col-md">
            <span>'.$row["requests"].'</span>
        </div>
        <div class="nk-tb-col tb-col-lg">
            <span>'.$row["max"]-$row["requests"].'</span>
        </div>
        <div class="nk-tb-col tb-col-lg">
            <span>'.$row["max"].'</span>
        </div>
        
        <div class="nk-tb-col nk-tb-col-tools">
            <ul class="nk-tb-actions gx-1">
                
                <li>
                    <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <ul class="link-list-opt no-bdr">
                                <li><a <tr onclick ="user_information('.$row['id'].')" ><em class="icon ni ni-focus"></em><span>ویرایش اطلاعات این کاربر</span></a></li>
                                <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                <li><a href="#"><em class="icon ni ni-repeat"></em><span>Transaction</span></a></li>
                                <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                <li class="divider"></li>
                                <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li>
                                <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div><!-- .nk-tb-item -->';


    }
    
}