<?php
function prichody(){
    date_default_timezone_set("Europe/Bratislava");
    $log = fopen("log.txt", "a") or die("Unable to open file!");
    $time = date("H:i");

    if($time>="08"){
        $time=$time." Meskanie\n";
        echo $time;
    }
//    if($time){
//
//    }
    fwrite($log, $time);
    fclose($log);
}
echo prichody();
?>
