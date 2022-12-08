<?php
Class neviem{
    function nieco(){
        $time = date("H:i");
        if ($time <= "10:59"){
            Prichody::getData();
            echo "Prichod: ".$prichody = include'prichody.php';
        }
    }
}
