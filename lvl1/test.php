<?php
date_default_timezone_set("Europe/Bratislava");
function neskoro($data){
    $time = date("H:i");
    if($time >= "08" && $time <= "19:59"){
    echo file_put_contents("log.txt", $data ." ". $time . "\n", FILE_APPEND);
    }
    if ($time >= "20" && $time <= "24") {
        die("Nemozne");
    }
}
function prichod($data){
    $time = date("H:i");
    if($time<="07:59"){
        echo file_put_contents("log.txt", $data . " " . $time . "\n", FILE_APPEND);
    }
}
function vypislogu($data){
    echo file_get_contents("log.txt.",$data);
}

echo neskoro("Meskanie");
echo prichod("Prichod");
echo vypislogu("Vypis logu");

