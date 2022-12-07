<?php
class Prichody {
    public function getData(){
    include 'prichody.json';
        $prichody = json_decode(file_get_contents("prichody.json"),true);
        if("prichody.json"==null){
            return [];
        }
        Prichody::putData($prichody);
    }

    public function putData($prichody){
        $meno = $_POST['name'];
        file_put_contents("prichody.json",$meno. json_encode($prichody));
    }
}
