<?php 
require_once(header);
$username = $_SESSION["username"];
if(admin()){
    $result = $conn -> query("SELECT * FROM `image_ai` ");
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        $images = json_decode($row["images"] , true);
        ?>
        <div class="nk-block">
                                <div class="row g-gs">
                                    <?php
                                    foreach($images as $key){
                                        ?>
                                        <div class="col-sm-6 col-lg-4">
                                        <div class="gallery card">
                                            <a class="gallery-image popup-image card-img-container" href="<?php echo url . "image_ai/uploads/".$key ?>">
                                                <div class="zoom-container">
                                                    <img class="w-100 rounded-top" src="<?php echo url . "image_ai/uploads/".$key ?>" alt="">
                                                </div>
                                            </a>
                                            <div class="gallery-body card-inner align-center justify-between flex-wrap g-2 text-white" dir="auto">
                                                <?php
                                                echo $row["prompt"];
                                                echo "<span> Powered By : ".$row["model"]."</span>";
                                                echo "<span> Powered By : ".$row["username"]."</span>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                        <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
        <?php
    }
}else{
    ?>
    <div class="alert alert-fill alert-secondary alert-icon">
        <em class="icon ni ni-alert-circle"></em> شما تاکنون تصویری را با هوش مصنوعی تولید نکرده اید ...
    </div>
    <?php
}
}else{
    $result = $conn -> query("SELECT * FROM `image_ai` WHERE `username`='$username'");
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        $images = json_decode($row["images"] , true);
        ?>
        <div class="nk-block">
                                <div class="row g-gs">
                                    <?php
                                    foreach($images as $key){
                                        ?>
                                        <div class="col-sm-6 col-lg-4">
                                        <div class="gallery card">
                                            <a class="gallery-image popup-image card-img-container" href="<?php echo url . "image_ai/uploads/".$key ?>">
                                                <div class="zoom-container">
                                                    <img class="w-100 rounded-top" src="<?php echo url . "image_ai/uploads/".$key ?>" alt="">
                                                </div>
                                            </a>
                                            <div class="gallery-body card-inner align-center justify-between flex-wrap g-2 text-white" dir="auto">
                                                <?php
                                                echo $row["prompt"];
                                                echo "<span> Powered By : ".$row["model"]."</span>"
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                        <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
        <?php
    }
}else{
    ?>
    <div class="alert alert-fill alert-secondary alert-icon">
        <em class="icon ni ni-alert-circle"></em> شما تاکنون تصویری را با هوش مصنوعی تولید نکرده اید ...
    </div>
    <?php
}
}
?>
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
require_once(footer);