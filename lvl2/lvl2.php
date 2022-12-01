<?php
class Prichody {

    static function prichod()
    {
        date_default_timezone_set("Europe/Bratislava");
        $time = date("H:i");
        $meno = $_POST['name'];
        $studenti = json_decode(file_get_contents("studenti.json"), true);
        $prichody = json_decode(file_get_contents("prichody.json"), true);
        $i = count([$studenti]);
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
            foreach ($prichody as $i) {
                echo "Prichod: " . "$meno" . " " . "$i<br>";
            }
        } else {
            Prichody::neskoro($prichody);
        }
        file_put_contents("studenti.json", json_encode($studenti));
    }

    static function neskoro($prichody)
    {
        $time = date("H:i");
        $meno = $_POST['name'];
        if ($time <= "19:59") {
            file_put_contents("prichody.json", json_encode($prichody));
            foreach ($prichody as $i) {
                echo "Meskanie: " . "$meno" . " " . "$i<br>";
            }
        }
        if ($time >= "20" && $time <= "24") {
            die($_POST['name'] . " Nemozne ");
        }
    }
}
Prichody::prichod();
