<html>
<body>
<?php
//echo $_POST["name"];
date_default_timezone_set("Europe/Bratislava");
function neskoro($data){
    $time = date("H:i");
    if($time >= "08" && $time <= "19:59"){
    echo file_put_contents("log.txt", $data." ". $time . "\n", FILE_APPEND);
    }
    if ($time >= "20" && $time <= "24") {
        die($_GET['name'] . " Nemozne ");
    }
}
function prichod($data){
    $time = date("H:i");
    if($time<="07:59"){
        echo file_put_contents("log.txt",$data." " . $time . "\n", FILE_APPEND);
    }
}
function vypislogu($data){
    echo file_get_contents("log.txt.",$data);
}
//$meno = "";
//function meno(){
//    if(empty($_GET["meno"])){
//        $meno = "";
//    }
//    else{
//        $meno = input($_GET["name"]);
//    }
//}


$data = "Prichod: ".$_GET["name"];
$data = "Meskanie: ".$_GET["name"];
echo neskoro($data);
echo prichod($data);
echo vypislogu($data);
?>
</body>
</html>