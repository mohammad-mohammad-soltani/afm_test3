<?php
require_once(dirname(__DIR__)."/config/config.php");
require_once(header);
?>

<script src="<?php echo url ?>assets/js/example-sweetalert.js?ver=3.2.3"></script>
<div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        <div class="nk-content-body">
                            <div class="card">
                                <div class="nk-editor">
                                    <div class="nk-editor-header">
                                        <div class="nk-editor-title">
                                            <h4 class="me-3 mb-0 line-clamp-1">تولید تصویر با هوش مصنوعی</h4>
                                            <ul class="d-inline-flex align-item-center">
                                                
                                                <!--<li>
                                                    <button class="btn btn-sm btn-icon btn-trigger">
                                                        <em class="icon ni ni-star"></em>
                                                    </button>-->
                                                </li>
                                                <li class="d-xl-none">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-icon btn-trigger" type="button" data-bs-toggle="dropdown">
                                                            <em class="icon ni ni-download-cloud"></em>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                            <div class="dropdown-content">
                                                                <ul class="link-list-opt">
                                                                    <li>
                                                                        <a ><em class="icon ni ni-note-add"></em><span>یادداشت</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a  ><em class="icon ni ni-send"></em><span>پیام</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-xl-none ms-1">
                                                    <button class="btn btn-sm btn-icon btn-primary" onclick="add_ai()">
                                                        <em class="icon ni ni-save"></em>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nk-editor-tools d-none d-xl-flex">
                                            
                                            <ul class="d-inline-flex gx-3">
                                                <li>
                                                    <!--<div class="dropdown">
                                                        <button class="btn btn-md btn-light rounded-pill" type="button" data-bs-toggle="dropdown">
                                                            <span>خروجی</span>
                                                            <em class="icon ni ni-chevron-down"></em>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                            <div class="dropdown-content">
                                                                <ul class="link-list-opt">
                                                                    <li>
                                                                        <a onclick="set_state_send('notes')" ><em class="icon ni ni-note-add"></em><span>یادداشت</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="set_state_send('send')" ><em class="icon ni ni-send"></em><span>پیام</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>-->
                                                <li>
                                                    <a href="<?php echo url."image_ai/image_list" ?>" class="btn btn-md btn-primary rounded-pill save-success">مشاهده سوابق تولید تصویر</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nk-editor-main">
                                        <div class="nk-editor-base">
                                            <ul class="nav nav-tabs nav-sm nav-tabs-s1 px-3">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#AIWriter">تنظیمات تولید</a>
                                                </li>
                                               
                                                
                                            </ul>
                                            <div class="tab-content mt-0">
                                                <div class="tab-pane fade show active" id="AIWriter">
                                                    <form  class="px-3 py-3">
                                                        <div class="row gy-4 gx-4">
                                                            
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">درخواست خود را برای تولید تصویر بنویسید</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea maxlength="300" cols="30" rows="4" id="added_text" class="form-control"></textarea>
                                                                    </div>
                                                                    <div class="form-note d-flex justify-content-end mb-n1"><span>حد اکثر 300 کاراکتر</span></div>
                                                                </div>
                                                            
                                                            
                                                            <form  class="px-3 py-3">
                                                        <div class="row gy-4 gx-4">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                <h6>انتخاب مدل هوش مصنوعی</h6>
                                                               <p>در اینجا شما میتوانید مدل هوش مصنوعی خود را بر اساس نیاز خود تغییر دهید تا بهترین بازخورد را داشته باشید</p>
                                                                    
                                                                    <div class="form-control-wrap">
                                                                        <select id="sel_ai" class="form-select js-select2" >
                                                                           
                                                                            <option value="defult">پیش فرض</option>
                                                                            <option value="pixart">pix art</option>
                                                                            <option value="dalle">dall-e</option>
                                                                            <option value="stablediffusion">stablediffusion</option>
                                                                            <option value="prodia">prodia</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div><!-- .col -->
                                                            </div><!-- .col -->
                                                           
                                                            
                                                            
                                                            
                                                        </div><!-- .row -->
                                                        
                                                    </form>
                                                            
                                                            <div class="col-12">
                                                                <button type="button" onclick="ajax_sender()" class="btn btn-primary btn-block">تولید پاسخ</button>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </form>
                                                </div><!-- .tab-pane -->

                                                
                                                
                                            </div><!-- .tab-content -->
                                        </div><!-- .nk-editor-base -->
                                        <div class="nk-editor-body">
                                            <div class="text-white p-4" id="answer"></div> <!-- .js-editor -->
                                        </div><!-- .nk-editor-body -->
                                    </div><!-- .nk-editor-main -->
                                </div><!-- .nk-editor -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                
<?php
require_once(footer);
?>

    
    <script>
        var state = 0
        function ajax_sender(message) {
    
        
        
            document.getElementById("answer").innerHTML = "درحال یافتن پاسخی مناسب برای شما...";
                new Promise((resolve, reject) => {
                    
                    $.get('<?php echo url."WEB_C/".$_SESSION["WEB_C"]."/IMAGE_AI"; ?>', { 
                        
                
                    //solve_way : document.getElementById("num_2").value,
                    request : document.getElementById("added_text").value,
                    ai_model : document.getElementById("sel_ai").value,
                    action : 1
                    }, function (data) {
                        
                        document.getElementById("answer").innerHTML = data;
                        state = 1;
                    });
                });
    }
         

         function add_ai() {
            
            if(state == 1){
             var innerHtml = document.getElementById("answer").innerHTML;
 
 new Promise((resolve, reject) => {
   
    $.post('<?php echo url."WEB_C/".$_SESSION["WEB_C"]."/ADD_NOTE" ?>', { 
 name: "تصاویر تولید شده با هوش مصنوعی",
 text: innerHtml,
 });
 });
    toastr.clear();
    NioApp.Toast('ذخیره پاسخ با موفقیت صورت گرفت', 'success', {
      position: 'bottom-left'
    });
            }else{
             
             
                NioApp.Toast('برای ذخیره پاسخ لازم است شما حداقل یک پاسخ موفق داشته'+' باشید', 'info', {
                position :  'bottom-left'
                    });
             
            }


 
    
    
}
    </script>
    <style>
        #answer{
            font-family: IRAN-Yekan-Bold;
        }
    </style>