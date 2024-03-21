let answer_text = document.querySelector("#answer");
function ajax_answer_sender(){
    
        
        let value = answer_text.value;
        let web_c_url = url+"WEB_C/"+web_c+"/ANSWER"
                if(value != ''){
        new Promise((resolve, reject) => {
            // استفاده از jQuery برای ارسال درخواست GET
            $.post(web_c_url, { 
        id: id,
        text: value,
        },function (data){
            console.log(web_c_url)
            console.log(data)
        });
        });

        Swal.fire("هورا", "پاسخ سوالت با موفقیت ذخیره شد", "success");
        }else{
        Swal.fire("یه مشکلی هست", "لطفا متنی را برای پاسخ بنویسید", "errore");
        }
 

        }
    
document.querySelector("#submit_answer").addEventListener("click",
function (){
    ajax_answer_sender()
}
);