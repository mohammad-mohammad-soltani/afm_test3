<?php
require_once (dirname(dirname(__DIR__)).'/config/config.php');
require_once (dirname(dirname(__DIR__)).'/config/db_config.php');
$you =null;
$servername = server;
$username = username;
$password = password;
$dbname = db;

$conn = new mysqli($servername, $username, $password, $dbname);
function delete($id){
    global $conn;
    $sql_remove = "DELETE FROM `key_db` WHERE id='".$id."'";
    $conn->query($sql_remove);
}
if(isset($_GET["delete"])){
    delete($_GET["delete"]);
    header("location: ".url."website/API-manage");
}
// چک کردن اتصال
if ($conn->connect_error) {
    die("اتصال به پایگاه داده انجام نشد: " . $conn->connect_error);
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
        $.post('<?php echo url; ?>user/adminstrator/search_api.php', { 
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
                                                        <div class="form-wrap w-150px">
                                                            <select class="form-select js-select2" data-search="off" data-placeholder="Bulk Action">
                                                                <option value="">Bulk Action</option>
                                                                <option value="email">Send Email</option>
                                                                <option value="group">Change Group</option>
                                                                <option value="suspend">Suspend User</option>
                                                                <option value="delete">Delete User</option>
                                                            </select>
                                                        </div>
                                                        <div class="btn-wrap">
                                                            <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>
                                                            <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                                        </div>
                                                    </div><!-- .form-inline -->
                                                </div><!-- .card-tools -->
                                                <div class="card-tools me-n1">
                                                    <ul class="btn-toolbar gx-1">
                                                        <li>
                                                            <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                                        </li><!-- li -->
                                                        <li class="btn-toolbar-sep"></li><!-- li -->
                                                        <li>
                                                            <div class="toggle-wrap">
                                                                <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                                <div class="toggle-content" data-content="cardTools">
                                                                    <ul class="btn-toolbar gx-1">
                                                                        <li class="toggle-close">
                                                                            <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                                                        </li><!-- li -->
                                                                        <li>
                                                                            <div class="dropdown">
                                                                                <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                                                    <div class="dot dot-primary"></div>
                                                                                    <em class="icon ni ni-filter-alt"></em>
                                                                                </a>
                                                                                <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                                                    <div class="dropdown-head">
                                                                                        <span class="sub-title dropdown-title">Filter Users</span>
                                                                                        <div class="dropdown">
                                                                                            <a href="#" class="btn btn-sm btn-icon">
                                                                                                <em class="icon ni ni-more-h"></em>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="dropdown-body dropdown-body-rg">
                                                                                        <div class="row gx-6 gy-3">
                                                                                            <div class="col-6">
                                                                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                                                                    <input type="checkbox" class="custom-control-input" id="hasBalance">
                                                                                                    <label class="custom-control-label" for="hasBalance"> Have Balance</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                                                                    <input type="checkbox" class="custom-control-input" id="hasKYC">
                                                                                                    <label class="custom-control-label" for="hasKYC"> KYC Verified</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="overline-title overline-title-alt">Role</label>
                                                                                                    <select class="form-select js-select2">
                                                                                                        <option value="any">Any Role</option>
                                                                                                        <option value="investor">Investor</option>
                                                                                                        <option value="seller">Seller</option>
                                                                                                        <option value="buyer">Buyer</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="overline-title overline-title-alt">Status</label>
                                                                                                    <select class="form-select js-select2">
                                                                                                        <option value="any">Any Status</option>
                                                                                                        <option value="active">Active</option>
                                                                                                        <option value="pending">Pending</option>
                                                                                                        <option value="suspend">Suspend</option>
                                                                                                        <option value="deleted">Deleted</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12">
                                                                                                <div class="form-group">
                                                                                                    <button type="button" class="btn btn-secondary">Filter</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="dropdown-foot between">
                                                                                        <a class="clickable" href="#">Reset Filter</a>
                                                                                        <a href="#">Save Filter</a>
                                                                                    </div>
                                                                                </div><!-- .filter-wg -->
                                                                            </div><!-- .dropdown -->
                                                                        </li><!-- li -->
                                                                        <li>
                                                                            <div class="dropdown">
                                                                                <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                                                    <em class="icon ni ni-setting"></em>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                                                    <ul class="link-check">
                                                                                        <li><span>Show</span></li>
                                                                                        <li class="active"><a href="#">10</a></li>
                                                                                        <li><a href="#">20</a></li>
                                                                                        <li><a href="#">50</a></li>
                                                                                    </ul>
                                                                                    <ul class="link-check">
                                                                                        <li><span>Order</span></li>
                                                                                        <li class="active"><a href="#">DESC</a></li>
                                                                                        <li><a href="#">ASC</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div><!-- .dropdown -->
                                                                        </li><!-- li -->
                                                                    </ul><!-- .btn-toolbar -->
                                                                </div><!-- .toggle-content -->
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
                                                    <div class="nk-tb-col"><span class="sub-text">نام کاربری</span></div>
                                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">کلید API</span></div>
                                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">تعداد استفاده شده</span></div>
                                                    <div class="nk-tb-col tb-col-lg"><span class="sub-text">تعداد باقیمانده</span></div>
                                                    <div class="nk-tb-col tb-col-lg"><span class="sub-text">سقف درخواست ها</span></div>
                                                    
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
    <br>
                                               


    <?php
    
// اتصال به پایگاه داده

// استفاده از SQL برای دریافت اطلاعات کاربران
$sql = "SELECT * FROM `key_db` ";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$user_count =  0;
if ($result->num_rows > 0) {
    // خروجی داده‌ها در جدول HTML
    
    while ($row = $result->fetch_assoc()) {
        $user_count++;
        $sql = "SELECT email FROM users_db WHERE username = '".$row["username"]."'";
        $res = $conn->query($sql);
        $email = $res->fetch_assoc()["email"];
        
        echo ' <div class="nk-tb-item " id="ajax!user">
        <div class="nk-tb-col nk-tb-col-check">
            <div class="custom-control custom-control-sm custom-checkbox notext">
                <input type="checkbox" class="custom-control-input" id="uid'.$row["id"].'">
                <label class="custom-control-label" for="uid'.$row["id"].'"></label>
            </div>
        </div>
        <div class="nk-tb-col">
            
                <div class="user-card">
                    <div class="user-avatar bg-primary">
                    <img src=" https://www.gravatar.com/avatar/'.md5($email).'?s=150 " alt="">
                    </div>
                    <div class="user-info">
                        <span class="tb-lead">'.$row["username"].'<span class="dot dot-success d-md-none ms-1"></span></span>
                        
                    </div>
                </div>
            
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
                                <li><a ><tr  ><em class="icon ni ni-award"></em><span>ارتقای این کلید</span></a></li>
                                <li><a href="'.url."website/API-manage?delete=".$row["id"].'"><tr  ><em class="icon ni ni-trash-alt"></em><span>حذف این کلید</span></a></li>
                                
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
$conn->close();
?>


<!--<div class="count" style="color : black; text-align : center;"><h4 style="width : fit-content;margin : auto;background-color : white;padding : 12px;border : 3px  solid;border-radius:7px;"><?php echo "تعداد کاربران:".$user_count ?></h4></div> -->
</div><!-- .nk-tb-list -->
                                        </div><!-- .card-inner -->
                                        
                                    </div><!-- .card-inner-group -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                        </div>
<?php
require_once(footer);
