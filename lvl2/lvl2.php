<?php
class Prichody {

    public static function prichod()
    {
        date_default_timezone_set("Europe/Bratislava");
        $time = date("H:i");
        $studenti = json_decode(file_get_contents("studenti.json"), true);
        $prichody = json_decode(file_get_contents("prichody.json"), true);
        $meno = $_POST['name'];
        if ($studenti == null) {
            $studenti = [$meno];
        } else {
            array_push($studenti, $meno);
        }
        if ($prichody == null) {
            $prichody = [$time];
        } else {
            array_push($prichody, $time);
        }
        foreach ($studenti as $student) {
            if ($time <="11:59") {
                file_put_contents("prichody.json", json_encode($prichody));
                echo "Prichod: " .$time." => ". $student . "\n";
            }
                if ("12:00"<= $time & $time<= "20:00") {
                    file_put_contents("prichody.json", json_encode($prichody));
                    echo "Meskanie: " .$time." => ". $student . "\n";
                } else {
                    Prichody::neskoro($prichody);
                }
            file_put_contents("studenti.json", json_encode($studenti));
        }
    }
    public static function neskoro($prichody)
    {
        $time = date("H:i");
        if ($time > "20" && $time <= "24") {
            file_put_contents("prichody.json",json_encode($prichody));
            die($_POST['name'] . " Nemozne ");
        }
    }
}
Prichody::Prichod();