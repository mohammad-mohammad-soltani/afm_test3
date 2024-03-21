function change_element(one,two,element_id){
    var now_value = document.getElementById(element_id).innerHTML
    if (now_value == one) {
        document.getElementById(element_id).innerHTML = two
    }else{
        document.getElementById(element_id).innerHTML = one
    }
}
function disable(text){
    alert(text);
} 
function keys(e){
    var key = e.keyCode;
    alert(key);
}