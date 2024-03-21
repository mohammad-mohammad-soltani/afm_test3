let sendBtn = document.getElementById("sendBtn");
let input = document.getElementById("messageinput");
let msg_box = document.getElementById("msg");
let value;
let html;
let id = 0;
function clear_chat(){
  msg_box.innerHTML = " ";
  window.location = "#";
}
function add_msg(){
    value = input.value;
    html = document.createElement("div");
    html.classList.add("chat", "is-show", "is-you");

    let chat_content = document.createElement("div");
    chat_content.classList.add("chat-content");

    let chat_bubble = document.createElement("div");
    chat_bubble.classList.add("chat-bubble");

    let chat_msg = document.createElement("div");
    chat_msg.classList.add("chat-msg");
    chat_msg.innerHTML = value;

    chat_bubble.appendChild(chat_msg);
    chat_content.appendChild(chat_bubble);
    html.appendChild(chat_content);

    msg_box.appendChild(html);
    input.value = "";
}
function typeWriterEffect(text, elementId) {
    let i = 0;
    const speed = 15; // سرعت تایپ کردن (به میلی‌ثانیه)
    
    function type() {
      if (i < text.length) {
        document.getElementById(elementId).innerHTML += text.charAt(i);
        i++;
        setTimeout(type, speed);
      }
    }
  
    type();
  }
  
  function handleResponse(data, status) {
    
    const id = status; // شناسه المانی که پاسخ در آن نمایش داده می‌شود
    document.getElementById(id).innerHTML = ""; // پاک کردن محتوای قبلی
    typeWriterEffect(data, id); // تایپ کردن پاسخ
  }
function add_answer(){
    id ++;

    
    html2 = document.createElement("div");
    html2.classList.add("chat", "is-show", "is-me");

    let chat_content2 = document.createElement("div");
    chat_content2.classList.add("chat-content");

    let chat_bubble2 = document.createElement("div");
    chat_bubble2.classList.add("chat-bubble");

    let chat_msg2 = document.createElement("div");
    chat_msg2.classList.add("chat-msg");
    chat_msg2.innerText = "در حال ارسال پاسخ ...";
    chat_msg2.id = id;
    chat_bubble2.appendChild(chat_msg2);
    chat_content2.appendChild(chat_bubble2);
    html2.appendChild(chat_content2);

    msg_box.appendChild(html2);
    sendBtn.classList.add("disabled");
    window.location = "#"+id
    $.post(url+"WEB_C/"+client+"/AI_CHAT",
  {
    value: value,
    
  },

  function(data, status){
    document.getElementById(id).dir = "auto";
   // handleResponse(data, id);
    document.getElementById(id).innerHTML = data;
    sendBtn.classList.remove("disabled");
    
    
  });
  
  
}
function send(){
  add_msg();
  add_answer();
  input.focus = true
}
document.getElementById("clear-chat").addEventListener("click",function (){
  clear_chat()
});

sendBtn.addEventListener("click", function () {
    send()
    
});
document.addEventListener("keydown",function (e){
  if(e.key == "Enter" && e.ctrlKey == true){
    send()
  }
});
