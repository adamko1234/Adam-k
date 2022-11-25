<?php
date_default_timezone_set("Europe/Bratislava");
function prichod(){
    $time = date("H:i");
    $meno = $_POST['name'];
    $studenti = json_decode(file_get_contents("studenti.json"),true);
    $prichody = json_decode(file_get_contents("prichody.json"),true);
    $data = "Prichod: ";
    $i = count([$studenti]);
    if($studenti == null) {
        $studenti = [$meno];
    } else {
        array_push($studenti, $meno);
    }
    if($prichody == null) {
        $prichody = [$time];
    } else {
        array_push($prichody,$time);
    }
    if ($time <= "10:59") {
        file_put_contents("prichody.json", json_encode($prichody));
        foreach ($prichody as $i){
            echo "Prichod: "."$meno"." "."$i<br>";
        }
    } else {
        neskoro($prichody);
    }
    file_put_contents("studenti.json",json_encode($studenti));
}

function neskoro($prichody){
    $time = date("H:i");
    $data = "Meskanie: ";
    if ($time <= "19:59"){
        file_put_contents("prichody.json",json_encode($prichody));
    }
    if ($time >= "20" && $time <= "24") {
        die($_POST['name'] . " Nemozne ");
    }
}
prichod();