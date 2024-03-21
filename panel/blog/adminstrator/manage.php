<?php
require_once(dirname(dirname(__DIR__))."/config/config.php");
if(writer()){

require_once(dirname(dirname(__DIR__))."/config/db_config.php");
$conn = new mysqli(server,username,password,db);
function is_show($input){
    if($input == "yes"){
        return '<span class="badge badge-dot bg-success">منتشر شده</span>';
    }else{
        return '<span class="badge badge-dot bg-danger">پیش نویس</span>';
    }
}
if(isset($_GET["delete"])){
    $sql = "DELETE FROM `posts_db` WHERE `id` = '".$_GET["delete"]."';";
        $conn->query($sql);

        header("location: ".url."posts/manage");
}else{
    require_once(header);
    ?>
    <div class="card card-preview">
    <table class="table table-orders">
        <thead class="tb-odr-head bg-light bg-opacity-75">
            <tr class="tb-odr-item">
                <th class="tb-odr-info">
                    <span class="tb-odr-id">نام پست</span>
                    <span class="tb-odr-date d-none d-md-inline-block">زمان</span>
                </th>
                <th class="tb-odr-amount">
                    <span class="tb-odr-total">نویسنده</span>
                    <span class="tb-odr-status d-none d-md-inline-block">وضعیت</span>
                </th>
                <th class="tb-odr-action">&nbsp;</th>
            </tr>
        </thead>
        <tbody class="tb-odr-body">
    <?php
    $sql = "SELECT * FROM `posts_db` ";
    $result = $conn -> query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo ' <tr class="tb-odr-item">
            <td class="tb-odr-info">
                <span class="tb-odr-id"><a href="'.url."posts?pid=".$row["id"].'">'.$row["title"].'</a></span>
                <span class="tb-odr-date">23 Jan 2019, 10:45pm</span>
            </td>
            <td class="tb-odr-amount">
                <span class="tb-odr-total">
                    <span class="amount">'.$row["by_name"].'</span>
                </span>
                <span class="tb-odr-status">
                    '.is_show($row["show"]).'
                </span>
            </td>
            <td class="tb-odr-action">
                <div class="tb-odr-btns d-none d-md-inline">
                    <a href="'.url."posts?pid=".$row["id"].'" class="btn btn-sm btn-primary">مشاهده</a>
                </div>
                <div class="dropdown">
                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                        <ul class="link-list-plain">
                            <li><a href="'.url."posts/add?edit=".$row["id"].'" class="text-primary">ویرایش</a></li>
                            <li><a href="'.url."posts?pid=".$row["id"].'" class="text-primary">مشاهده</a></li>
                            <li><a href="'.url."posts/manage?delete=".$row["id"].'" class="text-danger">حذف</a></li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>';
        }
    }
    ?>
            </tbody>
        </table>
    </div>
    
    <?php
    require_once(footer);
}
$conn->close();

}else{
    header("location: ".dashboard);
}