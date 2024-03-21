var link;
var lasthtml;
var data;
var link_text;
function tools_script_init(imgid,linkid,codeid){
    document.getElementById(imgid).addEventListener("click",function () {
         link = prompt("لینک تصویر را وارد نمایید");
         data = '<img src="'+link+'"> \r\n'
         document.getElementById(codeid).append(data);
    });
    document.getElementById(linkid).addEventListener("click",function () {
         link_text = prompt("متن");
         if(link_text != null){
            if(link_text != ""){
                link = prompt("لینک را وارد نمایید");
                if(link != null){
                    if(link != ""){
                        data = '<a class="dark-text" href="'+link+'" >'+link_text+'<a>'
                        document.getElementById(codeid).append(data);
                    }else{
                        alert("وارد کردن لینک الزامی است !");
                    }
                }else{
                    alert("عملیات افزودن لینک لغو شد");
                    
                 }
             }else{
                alert("وارد کردن متن لینک الزامی است !");
             }
         }else{
            
            alert("عملیات افزودن لینک لغو شد");
         }
         
    });
    
}