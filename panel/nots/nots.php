<?php
require_once(dirname(__DIR__).'/config/config.php');
function get_hight(){
    echo '650px';
}
function get_title(){
    echo 'افزودن یادداشت';
}
require_once(header);
?>


<form action="addnots.php" method="post" enctype="multipart/form-data">
<label for="note_name"  >نام یادداشت:</label>
        <input type="text" onkeyup="w_editor()" id="note_name"  class="form-control" name="note_name" required><br><br>

        <label for="note_text">متن یادداشت:</label><br>

        <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        <div class="nk-content-body">
                            <div class="card">
                                <div class="nk-editor">
                                    <div class="nk-editor-header">
                                        <div class="nk-editor-title">
                                            <h4 class="me-3 mb-0 line-clamp-1" id = "name_boxer">   لطفا نام یادداشت را از قسمت بالا وارد نمایید</h4>
                                            <ul class="d-inline-flex align-item-center">
                                                <li>
                                                    <button class="btn btn-sm btn-icon btn-trigger">
                                                        <em class="icon ni ni-pen"></em>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="btn btn-sm btn-icon btn-trigger">
                                                        <em class="icon ni ni-star"></em>
                                                    </button>
                                                </li>
                                                <li class="d-xl-none">
                                                    
                                                </li>
                                                <li class="d-xl-none ms-1">
                                                    
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nk-editor-tools d-none d-xl-flex">
                                            <ul class="d-inline-flex gx-3 gx-lg-4 pe-4 pe-lg-5">
                                                
                                                
                                            </ul>
                                            <ul class="d-inline-flex gx-3">
                                                <li>
                                                    <div class="dropdown">
                                                        
                                                        
                                                    </div>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nk-editor-main">
                                        
                                        <textarea name="" id="note_text" class="form-control" cols="100" rows="10"></textarea>
                                    </div><!-- .nk-editor-main -->
                                </div><!-- .nk-editor -->
                            </div>
                        </div>
                    </div>
                </div>
        

        <input type="button"  class="btn btn-primary" id="btn" value="ثبت یادداشت" onclick="ajax_sender()">
</form>
<?php
require_once(footer);
?>
    
    

    <script>
   
    function w_editor(){
        var value = document.getElementById("note_name").value;
        
        document.getElementById("name_boxer").innerHTML = value;
    }
   
   
         function ajax_sender(message) {
            let innerHtml = document.getElementById("note_text").value;
            let value = document.getElementById("note_name").value;

            if(value != ''){
    new Promise((resolve, reject) => {
        // استفاده از jQuery برای ارسال درخواست GET
        $.post('<?php echo url."WEB_C/".$_SESSION["WEB_C"]."/ADD_NOTE"; ?>', { 
    name: value,
    text: innerHtml,
    });
    });
    
    NioApp.Toast('متن یادداشت با موفقیت ذخیره شد', 'success', {
                position :  'bottom-left'
                    });
}else{
    NioApp.Toast('برای افزودن یادداشت لطفا نامی را برای آن برگزینید', 'info', {
                position :  'bottom-left'
                    });
}
     
    
}
         
     
</script>