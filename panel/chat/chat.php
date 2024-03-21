<?php
require_once(dirname(__DIR__) . '/config/config.php');
require_once(dirname(__DIR__) . '/config/db_config.php');
require_once(header);
require_once(login_check_dir);
function get_title(){
    echo "چت با هوش مصنوعی";
}
function get_hight(){
    echo "100%";
}
$Parsedown = new Parsedown();

                // Parse the Markdown content to HTML
                
if(true){
    $username = $_SESSION["username"];
    $m_result = $conn->query("SELECT * FROM `special_ai` WHERE `username`='$username'");
    ?>
    <style>
        body{
            overflow: hidden;
            overflow-x: hidden;
        }
        
    </style>
    <script>
        let url = "<?php echo url ?>";
        let client = "<?php echo $_SESSION["WEB_C"] ?>";
    </script>

    <div class="nk-chat">
                                <!-- .nk-chat-aside -->
                                <div class="nk-chat-body show-chat">
                                    <div class="nk-chat-head">
                                        <ul class="nk-chat-head-info">
                                            <li class="nk-chat-body-close">
                                                <a href="<?php echo url; ?>" class="btn btn-icon btn-trigger nk-chat-hide ms-n1"><em class="icon ni ni-arrow-left"></em></a>
                                            </li>
                                            <li class="nk-chat-head-user">
                                                <div class="user-card">
                                                    <div class="user-avatar bg-purple">
                                                        <img src="<?php echo url."images/bot-avatar.jpg" ?>" alt="">
                                                    </div>
                                                    <div class="user-info">
                                                        <div class="lead-text">دستیار چت AFM</div>
                                                        <div class="sub-text text-success"><span class="d-none d-sm-inline me-1">فعال</div>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                        <ul class="nk-chat-head-tools">
                                            
                                            
                                            
                                            
                                        </ul>
                                        <li >
                                                <button class="btn btn-outline-danger" id="clear-chat">پاکسازی چت</button>
                                            </li>
                                    </div><!-- .nk-chat-head -->
                                    <div class="nk-chat-panel" data-simplebar="init"><div class="simplebar-wrapper" style="margin: -20px -28px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" id="msg" style="padding: 20px 28px;">
                                    <?php 
                                    while($row = $m_result->fetch_assoc()){
                                        switch ($row['role']) {
                                            case 'user':
                                                $role = "you";
                                                break;
                                            
                                            default:
                                                $role = "me";
                                                
                                                break;
                                        }
                                        ?>
                                        <div class="chat is-show is-<?php echo $role ?>"><div class="chat-content"><div class="chat-bubble"><div class="chat-msg" dir="auto"><?php echo $row["text"] ?></div></div></div></div>
                                        
                                        <?php
                                    }
                                    
                                    ?>
                                    <script>
                                        window.location = "#new-msg"
                                    </script>
                                    <div id="new_msg" class="chat-sap">
                                            <div class="chat-sap-meta"><span>پیام های جدید</span></div>
                                        </div>
                                        
                                      
                                    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 753px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 623px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div><!-- .nk-chat-panel -->

                                    <div class="nk-chat-editor">
                                        
                                       <!-- <div class="nk-chat-editor-upload  ms-n1">
                                            <a href="#" class="btn btn-sm btn-icon btn-trigger text-primary toggle-opt" data-target="chat-upload"><em class="icon ni ni-plus-circle-fill"></em></a>
                                            <div class="chat-upload-option" data-content="chat-upload">
                                                <ul class="">
                                                    <li><a href="#"><em class="icon ni ni-img-fill"></em></a></li>
                                                    <li><a href="#"><em class="icon ni ni-camera-fill"></em></a></li>
                                                    <li><a href="#"><em class="icon ni ni-mic"></em></a></li>
                                                    <li><a href="#"><em class="icon ni ni-grid-sq"></em></a></li>
                                                </ul>
                                            </div>
                                        </div>-->
                                        <div class="nk-chat-editor-form">
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-simple no-resize"  rows="1" id="messageinput" placeholder="پیام خود را بنویسید..."></textarea>
                                            </div>
                                        </div>
                                        <ul class="nk-chat-editor-tools g-2">
                                           <!-- <li>
                                                <a href="#" class="btn btn-sm btn-icon btn-trigger text-primary"><em class="icon ni ni-happyf-fill"></em></a>
                                            </li>-->
                                            <li>
                                                <button id="sendBtn" dir="rtl" class="btn btn-round btn-outline-primary btn-icon " data-bs-toggle="tooltip" data-bs-placement="top" title="ctrl + enter"><em class="icon ni ni-send-alt"></em></button>
                                            </li>
                                        </ul>
                                    </div><!-- .nk-chat-editor -->
                                   
                                    </div></div></div></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div><!-- .nk-chat-profile -->
                                </div><!-- .nk-chat-body -->
     </div>
     </div>
     </div>
     <style>
        code{
        
         font-family: IRAN-Yekan-Bold;
        
        }
     </style>
    
                            <script src="<?php echo url."chat/" ?>chatscript.js"></script>
        
    <?php
}else{
    ?>
    <h3 class="bg-danger card text-white alert text-center mx-auto col-10">
        برای استفاده از این بخش سطح شما باید بیشتر از 2 باشد
    </h3>
    <?php
}
require_once(footer);