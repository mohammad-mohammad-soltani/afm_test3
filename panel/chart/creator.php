<?php
header('Content-Type: image/jpeg');
if(isset($_REQUEST["option"]) && isset($_POST["data"])){
    $option = $_REQUEST["option"];
    $data = $_POST["data"];
    $values = $data["values"];
    $label = $data["label"];

    if($option == "circle"){

    }elseif($option == "columnChart"){
        
        $chartData = array( 'type' => 'bar', 
         'data' => array( 'labels' => $datas,
          'datasets' => array( array( 'label' => $label, 'data' => $values ) ) 
          ) );
        $out =  json_encode($chartData);
        $img = "https://quickchart.io/chart?c=".$out;
        echo file_get_contents($img);
    }else{
        ?>
        <div class="alert">
            <div class="alert alert-danger alert-icon">
                <em class="icon ni ni-cross-circle"></em> نمودار مورد نظر شما تعریف نشده میباشد
            </div>
        </div>
        <?php
    }
} 
