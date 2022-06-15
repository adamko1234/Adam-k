<?php
function prichody(){
    date_default_timezone_set("Europe/Bratislava");
    $log = fopen("log.txt", "a") or die("Unable to open file!");
    $time = date("H:i");

    if($time>="08"&&$time<="19:59"){
        $time=$time." Meskanie\n";
        echo $time;
    }
    if($time>="20"&&$time<="24"){
        die("Nemozne");
    }
    fwrite($log, $time);
    fclose($log);
}
echo prichody();
?>
