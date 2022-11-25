<?php
function prichod(){
    $meno = "Adam";
    $prichody = json_decode(file_get_contents("studenti.json"),true);
    array_push($prichody, $meno);
    file_put_contents("studenti.json", json_encode($prichody));
}
prichod();
