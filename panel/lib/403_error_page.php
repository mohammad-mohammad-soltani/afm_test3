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
access_denide();
?>
<div class="nk-content ">
                    <div class="nk-block nk-block-middle wide-md mx-auto">
                        <div class="nk-block-content nk-error-ld text-center ">
                        <div class="wide-xs mx-auto">
                            <img class="nk-error-gfx col-8" src="<?php echo url."images/forbidden-prohibited-icon.svg" ?>" alt="">
                            
                            <h3 class="nk-error-title">شما اجازه دسترسی به این فایل را ندارید</h3>
                                <p class="nk-error-text"><?php echo to_delete() ?> بار دیگر تا حذف دائمی اکانت</p>
                                <a href="<?php echo dashboard ?>" class="btn btn-lg btn-primary mt-2">بازگشت به صفحه اصلی</a>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>

<?php
require_once(footer);