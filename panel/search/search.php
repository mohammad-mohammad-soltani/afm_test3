<?php
require_once(dirname(__DIR__)."/config/db_config.php");
$conn = new mysqli(server,username,password,db);
function search_posts($keyword) {
    if($keyword != '' && $keyword != ' ' ){
        global $conn;
    $sql = "SELECT * FROM posts_db WHERE title LIKE '%$keyword%' OR text LIKE '%$keyword%' OR text LIKE '%$keyword%'";
    $result = $conn->query($sql);
    return $result;
    }else{
        global $conn;
        $sql = "SELECT * FROM posts_db ORDER BY id DESC LIMIT 5";
        $result = $conn->query($sql);
        return $result;
    }
}
function searcher($keyword){
    
    $result = search_posts($keyword);
    

    if($result->num_rows > 0){
        
        ?>
        <br>
        <h5 class="text-center"> نمایش نتایج جستجو برای <strong><?php echo $keyword ?></strong></h5>
        <div class="row">
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-lg-4">
                    <div class="card">
                        <img src="<?php echo $row["main_img"] ?>" class="card-img-top" alt="">
                        <div class="card-inner">
                            <h5 class="card-title col-12 text-center"><?php echo $row["title"] ?></h5>
                            <p class="card-text"><?php echo $row["main_text"] ?></p>
                            <br>
                            <a href="<?php echo url."posts?pid=".$row["id"] ?>" class="btn btn-primary  ">مشاهده مقاله</a>
                        </div>
                    </div>
            </div>
        </div>
        
            <?php
        }
    }else{
        ?>
        <br>
        <h5 class="mx-auto text-center">مقاله مورد نظر شما پیدا نشد</h5>
        <?php
    }
    ?>
    <h4 class="text-center">مطالب مرتبط با این موضوع در ویکی پدیا : </h4>
    <?php
}
?>

<?php
if(isset($_GET["search"])){
    
    require_once(header);
    ?>
    
    <?php
    echo searcher($_GET["search"]);
    
    require_once(footer);
}elseif(isset($_GET["big_search"])){
    echo searcher($_GET["big_search"]);
}else{
    require_once(header);
    ?>
    
            
             
    <?php
    require_once(footer);
}

?>
       <script>
    document.querySelector(".big_post_searcher").addEventListener("keyup", function () {
        var searchValue = this.value;
        $.get('<?php echo url; ?>search/search.php', { 
            big_search: searchValue
        }, function (data) {
            // پاک کردن گزینه‌های قبلی داده‌لیست
            document.getElementById("big_postsajaxcontrol").innerHTML = data;

            // اضافه کردن گزینه‌های جدید به داده‌لیست
            
        });
    });

</script>