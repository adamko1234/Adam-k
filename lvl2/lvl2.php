<?php
class Prichody {

    public static function prichod()
    {
        date_default_timezone_set("Europe/Bratislava");
        $time = date("H:i");
        $studenti = json_decode(file_get_contents("studenti.json"), true);
        $prichody = json_decode(file_get_contents("prichody.json"), true);
//        $i = count([$studenti]);
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
        if ($time <= "07:59") {
            file_put_contents("prichody.json", json_encode($prichody));
            foreach ($prichody as $prichod) {
                echo "Prichod: " . "$meno" . " " . "$prichod<br>";
            }
        } else {
            Prichody::neskoro($prichody);
        }
        file_put_contents("studenti.json", json_encode($studenti));
    }

    public static function neskoro($prichody)
    {
        $time = date("H:i");
        $meno = $_POST['name'];
        if ($time <= "19:59") {
            file_put_contents("prichody.json", json_encode($prichody));
            foreach ($prichody as $prichod) {
                echo "Meskanie: " . "$meno" . " " . "$prichod<br>";
            }
        }
        if ($time >= "20" && $time <= "24") {
            die($_POST['name'] . " Nemozne ");
        }
    }
}
Prichody::prichod();