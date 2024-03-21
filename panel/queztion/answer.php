<?php
$conn = new mysqli(server,username,password,db);
if(!function_exists("answerinfo_init")){


$id =  question_answer_init();

$sql = "SELECT * FROM `queztions` WHERE id = '$id' AND q_type = 'queztion'";
$result = $conn->query($sql);
if($result-> num_rows > 0){
    $row = $result -> fetch_assoc();
    $main_question = $row["title"]; 


    ?>
    <div class="row">
    <div class="col-11 mx-auto ">
        <div class="col-11  mx-auto">
            <div class="header">
                <br>
                <h5 class="col-12 text-center">پاسخ دهی به سوال :  <?php echo $main_question ?></h5>
                <p>نکته1 : پس از پاسخ دادن به سوال باید منتظر بمانید تا پاسخ شما توسط ایجاد کننده سوال تایید شود تا سپس برای همه نمایش داده شود در این صورت یک امتیاز در حساب کاربری شما شارژ میشود</p>
                <p>نکته 2 : اگر کاربری پاسخ خود را روی سوال خود تایید کند به او هیچ امتیازی تعلق نمیگیرد</p>
                <p>نکته 3 : اگر پاسخ شما رد شود به میزان 1 امتیاز از شما کاسته میشود</p>
                <hr class="col-12">
                <h6>آیا میخواهید متنی خاص داشته باشید ؟ </h6>
                <p> آموزش مارک داون نویسی را در  این مقاله مشاهده کنید . <a href="https://7learn.com/blog/everything-about-markdown">مشاهده مقاله</a></p>

            </div>
            <div class="answer">
                <textarea name="" id="answer"  placeholder="فقط کافی است متن پاسخ خود را اینجا بنویسید" class="form-control" id="" cols="100" rows="10"></textarea>
            </div>
            <div class="footer">
                <br>
                <button class="btn btn-primary col-12" id="submit_answer" ><span class="text-center" >ثبت پاسخ</span></button>
                <br>
                <br>
                <a class="btn btn-primary col-12" href="<?php echo url."question_viwe/".$row["id"] ?>" ><span class="text-center" >مشاهده سوال و پاسخ ها</span></a>
                <br>    
                <br>
            </div>
        </div>
    </div>
</div>
<script>
    let id = <?php echo $id ?>    
    let web_c = '<?php echo $_SESSION["WEB_C"] ?>'
    let url = '<?php echo url ?>'
</script>
<script src="<?php echo url."queztion/" ?>send_answer.js"></script>
    <?php
}else{
    ?>
    <div class="alert alert-info alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em><span>سوالی که به دنبال آن میگردید ساخته نشده است ...</span>
                                                        </div>
    <?php
}
}
if(function_exists("answerinfo_init")){
require_once(header);
$id =  answerinfo_init();

$sql = "SELECT * FROM `queztions` WHERE id = '$id' AND q_type = 'answer'";
$result = $conn->query($sql);
if($result-> num_rows > 0){
    $row = $result -> fetch_assoc();
    $id = $row["for_id"];
    $sql = "SELECT * FROM `queztions` WHERE id = '$id' ";
    $result = $conn->query($sql);
    $row2 = $result->fetch_assoc();
    if($row2["username"] == $_SESSION["username"]){
        ?>
    <div class="row">
    <div class="col-11 mx-auto bg-dark card">
        <div class="col-11  mx-auto">
            
        <div class="header">
                <br>
                <h5 class="col-12 text-center">متن سوال: </h5>
                <hr class="col-12">
            </div>
            <div class="question">
                <?php
                echo $row2["text"];
                ?>
            </div>
        </div>
    </div>

    </div>
    <br>
    <div class="row">
    <div class="col-11 mx-auto bg-dark card">
        <div class="col-11  mx-auto">
            
            <div class="header">
                <br>
                <div class="row">
                <div class="col-6">
                <h5 class=" text-center">متن پاسخ : </h5>
                </div>
            
            <div class="col-6">
                <div class="row">
                <a href="<?php echo url."WEB_C/".$_SESSION["WEB_C"]."/answer_manage?id=".$row["id"]."&active=true" ?>" class="btn btn-success col-5 mx-auto"><span class="text-center">پذریرش</span></a>
                <a href="<?php echo url."WEB_C/".$_SESSION["WEB_C"]."/answer_manage?id=".$row["id"]."&active=false" ?>" class="btn btn-danger col-5 mx-auto"><span class="text-center">رد کردن</span></a>
                </div>
            </div>
                </div>

                <hr class="col-12">
            </div>
            <div class="answer">
                
                <div class="answer "><?php echo $row["text"] ?></div>
            </div>
            <div class="footer">
                <br>
            </div>
        </div>
    </div>
    </div>

    <?php
    }else{
        ?>
        <div class="alert alert-info alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em><span>دسترسی به پاسخ تنها برای سازنده این سوال امکان پذیر است!!</span>
                                                        </div>
        <?php
    }

    
   
}else{
    ?>
    <div class="alert alert-info alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em><span>پاسخی که به دنبال آن میگردید وجود ندارد!</span>
                                                        </div>
    <?php
}
require_once(footer);
}
?>
