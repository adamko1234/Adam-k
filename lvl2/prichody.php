<?php
class Prichody
{
    public function getData()
    {
        $time = date("H:i");
        include 'prichody.json';
        $prichody = json_decode(file_get_contents("prichody.json"), true);
        if ("prichody.json" == null) {
            return [];
        } else {

            return json_encode($prichody);
        }
    }
}


