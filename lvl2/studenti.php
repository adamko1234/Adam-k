<?php
class Studenti {
    public static function getData(){
        include 'studenti.json';
        $meno = $_POST['name'];
        $studenti = json_decode(file_get_contents("studenti.json"));
        if("studenti.json"==null){
            return [];
        }
        else{
            array_push($studenti, $meno);
        }
    }
}
