<?php
date_default_timezone_set("Europe/Bratislava");
function neskoro()
{
    $time = date("H:i");
    if ($time >= "08" && $time <= "19:59") {
        echo file_put_contents("log.txt", "Meskanie " . $time . "\n", FILE_APPEND);
    }
    if ($time >= "20" && $time <= "24") {
        die("Nemozne");
    }
}
function prichod(){
    $time = date("H:i");
    if($time<="07:59"){
        echo file_put_contents("log.txt", "Prichod ".$time."\n", FILE_APPEND);
    } else {
        Neskoro();
    }
}
function vypislogu(){
        echo file_get_contents("log.txt.");
}
echo prichod();
echo vypislogu();
?>
