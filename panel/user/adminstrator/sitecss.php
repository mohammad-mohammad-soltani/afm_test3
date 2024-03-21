<?php
require_once(dirname(dirname(__DIR__))."/config/config.php");

if(admin()){
    if(!isset($_POST["code"])){
        require_once(header);
    $file = file_get_contents(url."lib/addon.css");
    ?>
    <form method="post" >
       <div class="row">
        <div class="col-6">
        <h5 ><label for="code">کد های css را اینجا وارد نمایید</label></h5>
        </div>
       
       <div class="col-6" dir="ltr">
        <button class="btn btn-primary" type="submit">ذخیره</button>
       </div>
       <br>
       <span></span>
       <br>
        <textarea dir="ltr" name="code" class="form-control" id="" cols="100" rows="20"><?php echo $file ?></textarea>
       </div>
    </form>
    <?php
    require_once(footer);
    }else{
        file_put_contents(directory."lib/addon.css",$_POST["code"]);
        header("location: ".url."website/css");
    }
}else{
    header("location: ".login_page);
}
?>