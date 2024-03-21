<?php
require_once(dirname(dirname(__DIR__))."/config/config.php");
if(admin()){
if(!isset($_POST["Suffix"])){
require_once(header);
$data = file_get_contents(site_setting_json);
$decode = json_decode($data, true);
$Suffix_data = $decode["Suffix"];
$Suffix_out = "";

foreach ($Suffix_data as $key) {
    $Suffix_out .= $key.",";
}


?>

<form method="post">
    <div class="row">
        <div class="col-6">
            <label for="Suffix"><h5>پسوند های مجاز برای آپلود</h5></label>
        <input type="text" dir="ltr" name="Suffix" class="form-control " placeholder="هر کدام از پسوند ها را با , از  هم جدا نمایید" id="" value="<?php echo $Suffix_out ?>">
        </div>
        <div class="col-6">
        <label for="Suffix"><h5>تم وبسایت</h5></label>
                                                                    <div class="form-control-wrap">
                                                                        <select id="sel" name="theme" class="form-select js-select2">
                                                                            <option value="1">بنفش</option>
                                                                            <option value="2">سبز</option>
                                                                            <option value="3">قرمز</option>
                                                                            <option value="4">مصری</option>
                                                                            <option value="5">آبی روشن</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
        </div>
    </div>
</form>
<?php
require_once(footer);
}else{
    $data = explode(",",$_POST["Suffix"]);
    if($_POST["theme"] == "1"){
        $theme = "theme-purple.css";
    }
    if($_POST["theme"] == "2"){
        $theme = "theme-green.css";
    }
    if($_POST["theme"] == "3"){
        $theme = "theme-red.css";
    }
    if($_POST["theme"] == "4"){
        $theme = "theme-egyptian.css";
    }
    if($_POST["theme"] == "5"){
        $theme = "theme-bluelite.css";
    }
    
    
    $insert_data = array(
        "Suffix" => $data,
        "theme" => $theme,
    );
    $jsone_data = json_encode($insert_data);
    file_put_contents(site_setting_json,$jsone_data);
    header("location: ".url."user/adminstrator/main_setting.php");
}

}else{
    header("location: ".login_page);
}