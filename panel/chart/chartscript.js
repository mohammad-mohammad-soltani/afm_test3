let title = document.getElementById("chart_title");
let cols_name = document.getElementById("cols_name");
let cols_value = document.getElementById("cols_value");
let create_button = document.getElementById("create_chart");
function create_chart(){
  $.post(url+"chart/creator.php",
  {
    title : title,
    cols_name : cols_name,
    cols_value : cols_value 
  }
  );
}
create_button.addEventListener("click",
create_chart
);
