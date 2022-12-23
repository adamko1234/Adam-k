<?php
include'prichody.php';
include'meno.php';
function index(){
    date_default_timezone_set("Europe/Bratislava");
    $studenti = json_decode(file_get_contents("studenti.json"), true);
    $prichody = (new Prichody)->getData();
    $time = date("H:i");
//    $meno = $_POST["name"];

    foreach ($studenti as $student) {
        if ($time <= "07:59") {
            array_push($prichody,$time);
            echo "Prichod: " . $time . " => " . $student . "\n";
        }
        if ("08:00" <= $time & $time <= "20:00") {
            array_push($prichody,$time);
            echo "Meskanie: " . $time . " => " . $student . "\n";
        }
        if ($time > "20" && $time <= "24") {
            array_push($prichody,$time);
            die($_POST['name'] . " Nemozne ");
        }
        echo $prichody->putData();
    }
}
index();
