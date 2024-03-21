<?php 
require_once(dirname(__DIR__).'/config/config.php');
function get_title(){
    echo '404 eror';
}
function get_hight(){
    echo '100%';
}
require_once(header);
?>
<div class="nk-content ">
                    <div class="nk-block nk-block-middle wide-md mx-auto">
                        <div class="nk-block-content nk-error-ld text-center">
                            <img class="nk-error-gfx" src="<?php echo url."images/error-404.svg" ?>" alt="">
                            <div class="wide-xs mx-auto">
                                <h3 class="nk-error-title">صفحه ای که به  دنبال آن هستید پیدا نشد</h3>
                                <p class="nk-error-text">ما صفحه ای که به دنبال آن هستید را پیدا نکردیم </p>
                                <a href="<?php echo dashboard ?>" class="btn btn-lg btn-primary mt-2">بازگشت به صفحه اصلی</a>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>

<?php
require_once(footer);