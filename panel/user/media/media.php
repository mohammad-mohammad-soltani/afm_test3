<?php
require_once(dirname(dirname(__DIR__))."/config/config.php");
function image_vid($type,$link){
    if($type == "vid"){
        return '<video controls="" class="card-img-top" name="media" __idm_id__="3096577"><source src="'.$link.'" type="video/mp4"></video>';
    }elseif($type == "img"){
        return '<img src="'.$link.'" class="card-img-top">';
    }elseif($type == "oder_file"){
        return '<img src="'.url."upload/oder_file.png".'" class="card-img-top oder_f">';
    }
}

if(admin()){
    
    require_once(dirname(dirname(__DIR__))."/config/db_config.php");
    $conn = new mysqli(server,username,password,db);
    if(isset($_GET["delete"])){
        $sql = "DELETE FROM `site_media_db` WHERE `id` = '".$_GET["delete"]."';";
        $conn->query($sql);

        header("location: ".url."user/media/media.php");
    }
    require_once(header);
    if(isset($_GET["ERROR"])){
            ?>
            <script>
                Swal.fire("یه مشکلی هست", "پسوند فایل وارد شده مجاز نیست.فایل ذخیره نشد", "errore");
            </script>
            <?php
        }
    
    $sqls = "SELECT * FROM `site_media_db`";
    $result = $conn->query($sqls);
    if($result->num_rows > 0){
        ?>
        <div class="row">
            <div class="col-4">
                <a href="<?php echo url."user/media/add_media.php" ?>" class="btn btn-primary"><em class="icon ni ni-plus-medi-fill"></em> <span> </span> افزودن فایل به رسانه  </a>
            </div>
            <div class="col-8"></div>
            <br>
            <div class="col-12"></div>
            <br>
            <?php
while ($row = $result->fetch_assoc()) {
?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-img-container">
                <div class="zoom-container">
                    <?php echo image_vid($row["type"], url."upload/".$row["link"]); ?>
                </div>
            </div>
            <div class="card-inner">
                <h5 class="card-title col-12 text-center"><?php echo $row["name"] ?></h5>
                <p class="card-text" dir="ltr">
                    TYPE: <?php echo $row["type"] ?>
                    <br>
                    link: <a href="<?php echo url."upload/".$row["link"] ?>"><?php echo url."upload/".$row["link"] ?></a>
                    <br>
                    DIR: <?php echo directory."upload/".$row["link"]?>
                </p>
                <a href="<?php echo url."upload/".$row["link"]; ?>" class="btn btn-primary col-12 text-center  "><span class="text-center">مشاهده فایل</span></a>
                <br>
                <br>
                <a href="<?php echo url."user/media/media.php?delete=".$row["id"]; ?>" class="btn btn-danger col-12 text-center  "><span class="text-center">حذف فایل</span></a>
            </div>
        </div>
    </div>
<?php
}
?>

       
        
        </div>
        <style>
    .card-img-container {
        height: 200px; /* Set the desired height for the container */
        overflow: hidden;
    }

    .zoom-container {
        overflow: hidden;
        transition: transform 0.3s;
        
    }

    .zoom-container:hover {
        transform: scale(1.2); /* Adjust the scale factor for zoom level */
        
    }

    .zoom-container img {
        width: 100%;
        height: auto;
        object-fit: cover; /* This ensures the entire image is visible, cropping if necessary */
    }
</style>



        <?php
    }else{
        ?>
        <div class="col-4">
                <a href="<?php echo url."user/media/add_media.php" ?>" class="btn btn-primary"><em class="icon ni ni-plus-medi-fill"></em> <span> </span> افزودن فایل به رسانه  </a>
            </div>
            <br>
        <div class="alert alert-fill alert-light alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em>  نیست فایلی ):
        </div>
        
        <?php
    }
    require_once(footer);
}else{
    header("location: ".login_page);
}