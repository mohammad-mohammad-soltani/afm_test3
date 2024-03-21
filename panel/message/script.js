var send = document.getElementById("send")
var read_s = document.getElementById("read_s")
var read_r = document.getElementById("read_r")
var send_btn = document.getElementById("send_btn")
var read_s_btn = document.getElementById("read_s_btn")
var read_r_btn = document.getElementById("read_r_btn")
var sender_box =document.getElementById("sender")
var show_message = document.getElementById("mtext")
send.style.display= "block";
send_btn.style.backgroundColor = "#3891ff";
send_btn.style.color = "white";
read_r.style.display = "none";
read_s.style.display = "none";
sender_box.style.display = "none";
show_message.style.display = "none";
var br = document.createElement("br");
function changer(element){
    sender_box.style.display = "none";
    show_message.style.display = "none";
switch (element) {
    case "send":

        send.style.display= "block";
        send_btn.style.backgroundColor = "#3891ff";
        send_btn.style.color = "white";
        read_r.style.display = "none";
        read_s.style.display = "none";
        read_r_btn.style.backgroundColor = "#6464641c"
        read_s_btn.style.backgroundColor = "#6464641c"
        read_r_btn.style.color = "black"
        read_s_btn.style.color = "black"

        break;
    case "read_r" :
        read_r.style.display= "block";
        read_r_btn.style.backgroundColor = "#3891ff";
        read_r_btn.style.color = "white";
        send.style.display = "none";
        read_s.style.display = "none";
        send_btn.style.backgroundColor = "#6464641c"
        read_s_btn.style.backgroundColor = "#6464641c"
        send_btn.style.color = "black"
        read_s_btn.style.color = "black"
        
        break;
    case "read_s" :
        read_s.style.display= "block";
        read_s_btn.style.backgroundColor = "#3891ff";
        read_s_btn.style.color = "white";
        send.style.display = "none";
        read_r.style.display = "none";
        send_btn.style.backgroundColor = "#6464641c"
        read_r_btn.style.backgroundColor = "#6464641c"
        send_btn.style.color = "black"
        read_r_btn.style.color = "black"
        break;

    
}
}
function user_send(user_name, value = null){
    sender_box.style.display = "block";
    send.style.display ="none";
    var form = document.createElement("form");
    form.method = "get";
    form.action = "sender.php";
    form.innerHTML = '<br><span style = "text-align: center;color : white;margin-right:7.5%;">ارسال پیام به'+user_name+'</span><br><input class="form-control" type = "text" name="subject" style = "margin-right :7.5%;" placeholder="موضوع"><br><textarea name="text" style = "margin-right :7.5%;" id="" cols="100%" rows="5" class="form-control" placeholder = "متن پیام را وارد نمایید" ></textarea><input type = "text" name = "user_name" style = "display : none;" value = "'+user_name+'"><br><input type = "submit" class = "btn btn-primary" style = "width : 100%;margin-right:7.5%;" value = "ارسال">'
    sender_box.innerHTML = "";
    sender_box.append(form);
    

}

function readMessage(message_id) {
    $.ajax({
        url: "read_message.php", // آدرس فایل PHP
        type: "GET",
        data: { message_id: message_id }, // اطلاعات ارسالی به فایل PHP
        success: function(response) {
            // دریافت محتوای پیام از پاسخ و نمایش در صفحه
            show_message.style.display = "block";
            send.style.display = "none";
            read_r.style.display = "none";
            read_s.style.display = "none";
            show_message.style.color = "white";
            var label = document.createElement('h4');
            label.style.textAlign = "center";
            label.innerHTML = "متن پیام";
            show_message.innerHTML = " ";
            show_message.append(br);
            show_message.append(label);
            show_message.append(br);
            show_message.append(br);
            
            show_message.append(response);
            
            
        },
        error: function() {
            alert("خطا در درخواست.");
        }
    });
}
