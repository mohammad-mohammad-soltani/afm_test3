let username = document.querySelector("#usernamevalid");
let password = document.querySelector("#passwordvalid");
let password_span = document.querySelector(".password_span_valid");
let username_span = document.querySelector(".username_span_valid");
let state;
function newusername(data,span){
    
    
        return new Promise((resolve, reject) => {
            // استفاده از jQuery برای ارسال درخواست GET
            $.get(url+'/check/is_new_username.php', { username: data }, function (data) {
                // در اینجا نتیجه دریافت شده به عنوان پارامتر resolve تابع Promise منتقل می‌شود.
                resolve(data);
            });
        });
    }

 
async function singupvaledate(mode , data){
    let value = data.value;
    let state;
    switch (mode) {
        case "username":
            
            if(value.length < 6) {
                username_span.innerHTML = "مقدار نام کاربری باید از 5 کاراکتر به بالا باشد";
                username_span.className = "text-danger";
                
                data.classList += " is-invalid" ;
            }else if(value.length > 5){
                username_span.innerHTML = "";
                username_span.className = "text-drak";
                data.classList = "form-control" ;
                
                
                
                    username_span.innerHTML = value+"در حال برسی است ...";
                    username_span.className ="text-info"

                
                const state = await newusername(value,username_span);
                
                if(state == "true" ){
                    
                    data.classList += " is-valid" ;
                    username_span.innerHTML = value+" امکان پذیر است";
                    username_span.className ="text-success"
                }else if(state == "false"){
                    data.classList = "form-control";
                    data.classList += " is-invalid" ;
                    username_span.innerHTML = " متاسفیم "+value+"تکراری است و امکان پذیر نیست !!";
                    username_span.className ="text-danger"
                }
            }
            break;
        case "password":
            
            if(value.length < 9) {
                password_span.innerHTML = "مقدار کلمه عبور باید از 8 کاراکتر به بالا باشد";
                password_span.className = "text-danger";
                
                data.classList += " is-invalid" ;
            }else if(value.length > 8){
                password_span.innerHTML = "";
                password_span.className = "text-drak";
                data.classList = "form-control" ;
                data.classList += " is-valid" ;

                
            }
            break;
   
    }
    
}
username.addEventListener("keyup",function () {
    
    singupvaledate("username",username)});
password.addEventListener("keyup",function () {singupvaledate("password",password)});

