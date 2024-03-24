<?php
require_once(header);
if(!isset($_GET["file"])){
?>
<form class="form"  action="">
    <div class="row g-gs">
        <div class="col-lg-6 col-sm-6">
            
            
        <div class="form-group">
        <label class="form-label" for="customFileLabel">فایل را انتخاب کنید</label>
        <div class="form-control-wrap">
            <div class="form-file">
                <input type="file" class="form-file-input" id="file">
                <label class="form-file-label" for="customFile">فایل را برای بارگزاری انتخاب کنید</label>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-primary col-12" id="send"><span class="text-center">افزایش کیفیت تصویر</span></button>
        </div>
        </div>
        <div class="col-lg-6 col-sm-6" >
            
            <div id="answer"></div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    let answer_box = document.getElementById("answer");
   $('#send').click(function() {
    var formData = new FormData();
    formData.append('file', $('#file')[0].files[0]);
    answer_box.innerHTML = "در حال ارسال درخواست ...";
    $.ajax({
        url : '<?php echo url."WEB_C/".$_SESSION["WEB_C"]."/QUALITY_UP" ?>',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        
        success : function(data) {
            answer_box.innerHTML = data;
            
        }
    });
    });



</script>

<?php
}
require_once(footer);
?>
