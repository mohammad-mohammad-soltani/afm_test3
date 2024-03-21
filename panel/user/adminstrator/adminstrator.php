<?php
require_once (dirname(dirname(__DIR__)).'/config/config.php');
require_once (dirname(dirname(__DIR__)).'/config/db_config.php');
$you =null;

if(admin()){
    $servername = server;
    $username = username;
    $password = password;
    $dbname = db;
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(isset($_GET["delete"])){
        if(isset($_GET["user"])){
            $sql_remove = "DELETE FROM `users_db` WHERE username='".$_GET["user"]."'";
        $sql_remove_p = "DELETE FROM `profile_db` WHERE username='".$_GET["user"]."'";
        $sql_remove_q = "DELETE FROM `queztions` WHERE username='".$_GET["user"]."'";
        $sql_remove_a = "DELETE FROM `key_db` WHERE username='".$_GET["user"]."'";
        $conn->query($sql_remove);
        $conn->query($sql_remove_p);
        $conn->query($sql_remove_q);
        $conn->query($sql_remove_a);
       // header("location:".url."website/users");
        }else{
            ?>
            <script>
                consol.log(<?php echo $_GET["users"] ?>);
            </script>
            <?php
        }
        
        
    }
    function get_title(){
        echo "مدیریت";
    }
    function get_hight(){
        echo '500px';
    }
    require_once(header);
    ?>
    <script>
        function changer(id){
       
    }
    function user_information(id){
        window.open("<?php echo url?>"+"user/adminstrator/user_check.php?id="+id);
    }
    function ajax_users(t){
        var value = t.value
        var value2 = document.getElementsByClassName("nk-tb-item").innerHTML;
        
        new Promise((resolve, reject) => {
            // استفاده از jQuery برای ارسال درخواست GET
            $.post('<?php echo url; ?>user/adminstrator/search.php', { 
        search: value}, function (data) {
                // در اینجا نتیجه دریافت شده به عنوان پارامتر resolve تابع Promise منتقل می‌شود.
                document.getElementById("data").innerHTML =  data ;
                
            });
        });
       
    
    }
    </script>

    <div class="nk-content-body">
                                <div class="nk-block">
                                    <div class="card card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner position-relative card-tools-toggle">
                                                <div class="card-title-group">
                                                    <div class="card-tools">
                                                        <div class="form-inline flex-nowrap gx-3">
                                                           
                                                            
                                                        </div><!-- .form-inline -->
                                                    </div><!-- .card-tools -->
                                                    <div class="card-tools me-n1">
                                                        <ul class="btn-toolbar gx-1">
                                                            <li>
                                                                <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                                            </li><!-- li -->
                                                            
                                                                <div class="toggle-wrap">
                                                                    <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                                   
                                                                </div><!-- .toggle-wrap -->
                                                            </li><!-- li -->
                                                        </ul><!-- .btn-toolbar -->
                                                    </div><!-- .card-tools -->
                                                </div><!-- .card-title-group -->
                                                <div class="card-search search-wrap" data-search="search">
                                                    <div class="card-body">
                                                        <div class="search-content">
                                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                            <input type="text" onkeydown="ajax_users(this)" class="form-control border-transparent form-focus-none" placeholder="نام کاربری یا نام کاربر را وارد نمایید">
                                                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-search -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list nk-tb-ulist" id="data">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col nk-tb-col-check">
                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                <input type="checkbox" class="custom-control-input" id="uid">
                                                                <label class="custom-control-label" for="uid"></label>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col"><span class="sub-text">کاربر</span></div>
                                                        <div class="nk-tb-col tb-col-mb"><span class="sub-text">سطح دسترسی</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">تلفن</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">چت آیدی</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">نام کاربری</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">تاریخ تولد</span></div>
                                                        <div class="nk-tb-col nk-tb-col-tools text-end">
                                                            <div class="dropdown">
                                                                <a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-bs-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                                    <ul class="link-tidy sm no-bdr">
                                                                        <li>
                                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" checked="" id="bl">
                                                                                <label class="custom-control-label" for="bl">سطح دسترسی</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" checked="" id="ph">
                                                                                <label class="custom-control-label" for="ph">Phone</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="vri">
                                                                                <label class="custom-control-label" for="vri">Verified</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="st">
                                                                                <label class="custom-control-label" for="st">Status</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
    
                                                   
    
    
        <?php
        
    // اتصال به پایگاه داده
    
    
    // چک کردن اتصال

    
    // استفاده از SQL برای دریافت اطلاعات کاربران
    $sql = "SELECT * FROM users_db ORDER BY 'id' ASC";
    $result = $conn->query($sql);
    $user_count =  0;
    if ($result->num_rows > 0) {
        // خروجی داده‌ها در جدول HTML
        
        while ($row = $result->fetch_assoc()) {
            $user_count++;
            $you = null;
            if(  $_SESSION['username']===$row["username"]){
                $you = "(شما)";
            }
            echo ' <div class="nk-tb-item " id="ajax!user">
            <div class="nk-tb-col nk-tb-col-check">
                <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input user_delete" data-username="'.$row["username"].'" id="'.$row["id"].'">
                    <label class="custom-control-label" for="'.$row["id"].'"></label>
                </div>
            </div>
            <div class="nk-tb-col">
                <a href="html/user-details-regular.html">
                    <div class="user-card">
                        <div class="user-avatar bg-primary">
                        <img src="'.user_avatar.'" alt="">
                        </div>
                        <div class="user-info">
                            <span class="tb-lead">'.$row["name"].'<span class="dot dot-success d-md-none ms-1"></span></span>
                            <span>'.$row["email"].'</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="nk-tb-col tb-col-mb">
                <span class="tb-amount">'.print_access($row["access"]).'</span>
            </div>
            <div class="nk-tb-col tb-col-md">
                <span>'.$row["tel"].'</span>
            </div>
            <div class="nk-tb-col tb-col-lg">
                <span>'.$row["chat_id"].'</span>
            </div>
            <div class="nk-tb-col tb-col-lg">
                <span>'.$row["username"].'</span>
            </div>
            <div class="nk-tb-col tb-col-md">
                <span class="tb-status text-success">'.$row["birth_date"].'</span>
            </div>
            <div class="nk-tb-col nk-tb-col-tools">
                <ul class="nk-tb-actions gx-1">
                    
                    <li>
                        <div class="drodown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-opt no-bdr">
                                    <li><a <tr onclick ="user_information('.$row['id'].')" ><em class="icon ni ni-focus"></em><span>ویرایش اطلاعات این کاربر</span></a></li>
                                    <li><a href="'.url."website/users?delete=true&user=".$row["username"].'"><em class="icon ni ni-eye"></em><span>حذف این کاربر از سیستم</span></a></li>
                                    <!--<li><a href="#"><em class="icon ni ni-repeat"></em><span>Transaction</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>-->
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-tb-item -->';
    
    
        }
        
    } else {
        echo "هیچ کاربری یافت نشد.";
    }
    
    // قطع اتصال به پایگاه داده
    
    
    
    ?>
    <script>
    // تابعی برای حذف کاربران انتخاب شده
    function deleteSelectedUsers(event) {
    if (event.keyCode === 46) {
        var selectedUsers = document.querySelectorAll('input.user_delete[type="checkbox"]:checked');
        var usernames = [];
        selectedUsers.forEach(function(user) {
            usernames.push(user.getAttribute('data-username'));
        });

        if (usernames.length > 0) {
            if (confirm('آیا مطمئن هستید که می‌خواهید این کاربران را حذف کنید؟')) {
                return new Promise((resolve, reject) => {
        // استفاده از jQuery برای ارسال درخواست GET
        $.post('<?php echo url; ?>website/users', { 
            delete: true,
                        users: JSON.stringify(usernames)
        }, function (data) {
            // در اینجا نتیجه دریافت شده به عنوان پارامتر resolve تابع Promise منتقل می‌شود.
            document.getElementById("profile-tab-pane2").innerHTML = data;
            resolve(data); // فراخوانی تابع resolve برای حل Promise
        }).fail(function (error) {
            // در صورت بروز خطا، تابع reject فراخوانی می‌شود.
            reject(error);
        });
    });
}
        } else {
            alert('لطفاً یک کاربر را برای حذف انتخاب کنید.');
        }
    }
}

document.addEventListener('keydown', deleteSelectedUsers);

</script>

    
    <!--<div class="count" style="color : black; text-align : center;"><h4 style="width : fit-content;margin : auto;background-color : white;padding : 12px;border : 3px  solid;border-radius:7px;"><?php echo "تعداد کاربران:".$user_count ?></h4></div> -->
    </div><!-- .nk-tb-list -->
                                            </div><!-- .card-inner -->
                                            
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
    <?php
    
    $conn->close();
    require_once(footer);
}else{
    header("location: ".login_page);
}
