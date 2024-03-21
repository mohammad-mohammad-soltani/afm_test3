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
<h6>آیا میخواهید متنی خاص داشته باشید ؟ </h6>
<p> آموزش مارک داون نویسی را در  این مقاله مشاهده کنید . <a href="https://7learn.com/blog/everything-about-markdown">مشاهده مقاله</a></p>

<form action="addnots.php" method="post" enctype="multipart/form-data">
<label for="note_name"  >نام سوال :</label>
        <input type="text" onkeyup="w_editor()" id="note_name" maxlength="40"  class="form-control" name="note_name" required><br><br>

        <label for="note_text">متن سوال : </label><br>

        <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        <div class="nk-content-body">
                            <div class="card">
                                <div class="nk-editor">
                                    <div class="nk-editor-header">
                                        <div class="nk-editor-title">
                                            <h4 class="me-3 mb-0 line-clamp-1" id = "name_boxer">   لطفا نام سوال را از قسمت بالا بنویسید</h4>
                                            
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
        

        <input type="button"  class="btn btn-primary" id="btn" value="ثبت سوال" onclick="ajax_sender()">
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
    var value = document.getElementById("note_name").value;
    let innerHtml = document.getElementById("note_text").value;

    if (value != '') {
        new Promise((resolve, reject) => {
            // استفاده از jQuery برای ارسال درخواست POST
            $.post('<?php echo url."WEB_C/".$_SESSION["WEB_C"]."/ADD_QUESTION"; ?>', {
                name: value,
                text: innerHtml,
            }, function (data) {
                console.log(data);
                resolve(data);
            });
        }).then(function (data) {
            NioApp.Toast('پرسش شما با موفقیت به بانک پرسش ها افزوده و در صدر آنها قرار گرفت', 'success', {
                position :  'bottom-left'
                    });
        }).catch(function (error) {
            NioApp.Toast('برای افزودن پرسش باید اسمی را برای آن بر بگزینید', 'info', {
                position :  'bottom-left'
                    });
        });
    } else {
        NioApp.Toast('برای افزودن پرسش باید اسمی را برای آن بر بگزینید', 'info', {
                position :  'bottom-left'
                    });
    }
}
         
     
</script>
