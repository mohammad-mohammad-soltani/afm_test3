<?php
$url = "https://api3.haji-api.ir/sub/tools/wikipedia?s=".urlencode($_GET["q"])."&key=JQQZER6vXAGY4fVBLWkWJpNbAZdZ2030YE";
$data = json_decode(file_get_contents($url),true);
echo "<pre>";
print_r($data);
/*
echo "موضوع : <br>".$data["result"]["title"]."<br>";
echo "محتویات : <br>".$data["result"]["extract"];
*/