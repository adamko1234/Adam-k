<html>
<body>
<?php
//echo $_POST["name"];
date_default_timezone_set("Europe/Bratislava");
function neskoro($data){
    $time = date("H:i");
    if($time >= "15" && $time <= "19:59"){
    echo file_put_contents("log.txt", $data ." ". $time . "\n", FILE_APPEND);
    }
    if ($time >= "20" && $time <= "24") {
        die("Nemozne");
    }
}
function prichod($data){
    $time = date("H:i");
    if($time<="14:59"){
        echo file_put_contents("log.txt", $data . " " . $time . "\n", FILE_APPEND);
    }
}
function vypislogu($data){
    echo file_get_contents("log.txt.",$data);
}
$data = "Meskanie:"." ". $_POST["name"];
$data = "Prichod:". " ". $_POST["name"];
echo neskoro($data);
echo prichod($data);
echo vypislogu($data);
?>
</body>
</html>

