<?php
class Api{
    public function api(){
    include "prichody.php";
        Prichody::getData();
    }
}
