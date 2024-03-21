<?php
require_once(dirname(__DIR__)."/config/config.php");
require_once(dirname(__DIR__)."/config/db_config.php");
require_once(header);
$conn = new mysqli(server,username,password,db);


if(!isset($_GET["pid"]) && !isset($_GET["search"])){
    $sqls = "SELECT * FROM `posts_db` WHERE `show` = 'yes' ORDER BY id DESC;";
    $result = $conn->query($sqls);
    if($result->num_rows > 0){
        ?>
        <div class="row">
            <?php
            if(admin()){
                ?>
                <div class="col-12">
                <a href="<?php echo url."posts/add" ?>" class="btn btn-primary "><em class="icon ni ni-plus-medi-fill"></em> <span> </span>افزودن مقالات</a>
                <span class="col-1"></span>
                <a href="<?php echo url."posts/manage" ?>" class="btn btn-primary "><em class="icon ni ni-opt-alt-fill"></em><span> </span> مدیریت مقالات</a>
            </div>
                <?php
            }
            ?>
       
            <div class="col-8"></div>
            <br>
            <span></span>
            <br>
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-lg-4">
                    <div class="card">
                        <img src="<?php echo $row["main_img"] ?>" class="card-img-top" alt="">
                        <div class="card-inner">
                            <h5 class="card-title col-12 text-center"><?php echo $row["title"] ?></h5>
                            <p class="card-text"><?php echo $row["main_text"] ?></p>
                            <a href="<?php echo url."posts?pid=".$row["id"] ?>" class="btn btn-primary  ">مشاهده مقاله</a>
                        </div>
                    </div>
                </div>
            <?php
        }
        ?>
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-fill alert-light alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em> Ł…Ł‚Ų§Ł„Ł‡ Ų§Ū ŁŲ¬ŁŲÆ Ł†ŲÆŲ§Ų±ŲÆ ):
        </div>
        <?php
    }
    
       
    

}else{
   if(!writer()){
    $sql2 = "SELECT * FROM `posts_db` WHERE `show` = 'yes' AND `id` = '".$_GET["pid"]."';";
    $result = $conn->query($sql2);
    if($result -> num_rows >0){
        $row = $result->fetch_assoc();
    
        ?>
        <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="content-page wide-md m-auto">
                <div class="nk-block ">
                        <div class="card ">
                                <br>
                                <div class="col-11 hav-image-note mx-auto">
                                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto ">
                                    <div class="nk-block-head-content text-center row -note col-12 ">
                                        <br>
                                        <span></SPAn>
                                        <br>
                                        <div class="col-6 bg-primary mx-right text-white have-border-radius  ">
                                            <h2 class="nk-block-title fw-normal"><?php echo $row["title"] ?></h2>
                                            <div class="nk-block-des ">
                                                <p class="lead text-white"><span>نوشته شده توسط : </span><span><?php echo $row["by_name"] ?></span></p>
                                                
                                            </div>
                                        </div>
                                            <div class="col-6 mx-auto  " dir="">
                                                
                                                <img class="post_img mx-auto align-ltr have-border-radius" src="<?php echo $row["main_img"]; ?>" alt="">
                                            </div>
                                            
                            </div>
                            <br>
                         
                        </div><!-- .nk-block-head -->
                        
                    </div>
                    
                            <div class="card-inner card-inner-xl">
                                <article class="entry">
                                    <?php
                                    echo $row["text"];
                                    ?>
                                </article>
                                <br>
                                <h5 class="bg-dark have-border-radius p-link"> <br><div class="text-center"><span class="text-success">لینک کوتاه مقاله </span> <span class="text-warning post-main-link"><?php echo url."posts?pid=".$_GET["pid"] ?></span><span class="text-warning">
                                     <button class="btn btn-sm btn-icon clipboard-init" title="کلیک کن کپی شه!" data-clipboard-target=".post-main-link" data-clip-success="<em class='icon ni ni-copy-fill'></em>" data-clip-text="<em class='icon ni ni-copy'></em>">
                                                                            <span class="clipboard-text"><em class="icon ni ni-copy"></em></span>
                                                                        </button></span></div> <br></h5> 
                            </div>

                            
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .content-page -->
            </div>
        </div>
    </div>
                <?php
    }else{
        ?>
        <div class="alert alert-fill alert-light alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em> مقاله ای که به دنبال آن میگردید وجود ندارد ):
        </div>
        <?php
    }
   }elseif(writer()){
    $sql2 = "SELECT * FROM `posts_db` WHERE  `id` = '".$_GET["pid"]."';";
    $result = $conn->query($sql2);
    if($result -> num_rows >0){
        

        $row = $result->fetch_assoc();
        $sql_au = "SELECT * FROM `profile_db` WHERE  `username` = '".$row["by_name"]."';";
        $result_au = $conn->query($sql_au);
        $row_au = $result_au->fetch_assoc();
    
        ?>
        <div class="row g-gs">
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="">
                                            <div class="">
                                                <img class="card card-full bg-white " src="<?php echo $row["main_img"]; ?>" alt="">
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="card">
                                            <div class="card-header">
                                            <h3><?php echo $row["title"] ?></h3>
                                            <span class="sub-text">نوشته شده توسط : <?php echo $row_au["display_name"] ?> </span>
                                            <span class="sub-text">تاریخ نگارش : <?php echo jdate("   Y/n/j " ,$row["timeofc"] , "") ?></span>
                                           
                                            </div>
                                            <div class="card-inner">
                                            <p><?php echo $row["main_text"] ?></p>

                                            </div>
                                            <div class="card-footer text-center">
                                                <h5>اینجا محل تبلیغات شماست</h5>
                                            </div>
                                            
                                        </div>
                                    </div><!-- .col -->
                                    
                                </div><!-- .row -->
                                <br>
    <div class="card bg-dark">
        <div class="card-inner">
        <?php
                                    echo $row["text"];
        ?>
        </div>
        
    </div>
    <br>
    <div class="nk-block">
                                    <div class="card">
                                        <div class="card-inner">
                                            <div class="align-center flex-wrap flex-md-nowrap g-4">
                                                <div class="nk-block-image w-120px flex-shrink-0 mh-100">
                                                    <img class="user-avatar lg bg-primary mh-100" src="<?php echo user_avatar ?>" alt="">
                                                </div>
                                                <div class="nk-block-content">
                                                    <div class="nk-block-content-head px-lg-4">
                                                        <h5><?php echo $row_au["display_name"] ?></h5>
                                                        <p class="text-soft">
                                                            <?php
                                                            echo $row_au["discription"]
                                                            ?>

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="nk-block-content flex-shrink-0">
                                                    <a href="<?php echo url."users/".$row_au["username"] ?>" class="btn btn-lg btn-outline-primary">مشاهده پروفایل نویسنده</a>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                    </div><!-- .card -->
                                </div>
                <?php
    }else{
        ?>
        <div class="alert alert-fill alert-light alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em> مقاله ای که به دنبال آن میگردید وجود ندارد ):
        </div>
        <?php
    }
   }
    
}
$conn->close();
?>
<style>
    .p-link{
        border: 20px;
    }
    .post_img{
        width: 100%;
       
    }
    .have-border-radius{
        border-radius: 12px;
    }
    .hav-image-note{
        border-radius:  12px 12px 12px 12px;
        background-image: url(<?php echo url."images/math-background-bg.jpg" ?>);
    background-size: cover; /* یا contain */
    background-position: center center;
    background-repeat: no-repeat;
   
    
    }
</style>

<?php
require_once(footer);