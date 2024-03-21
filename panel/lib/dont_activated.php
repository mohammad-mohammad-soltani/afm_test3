<?php 
require_once(dirname(__DIR__).'/config/config.php');
require_once(login_check_dir);
function get_title(){
    echo '404 eror';
}
function get_hight(){
    echo '100%';
}
require_once(header);
$data = inactive_init();
?>
<div class="nk-content ">
                    <div class="nk-block nk-block-middle wide-md mx-auto">
                        <div class="nk-block-content nk-error-ld text-center ">
                        <div class="wide-xs mx-auto">
                            
                            
                            <h3 class="nk-error-title"><?php echo $data["title"] ?></h3>
                                
                                <p>
                                    <?php echo $data["information"] ?>
                                </p>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>

<?php
require_once(footer);