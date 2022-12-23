<?php
class Prichody
{
    public function getData()
    {
        return json_decode(file_get_contents("prichody.json"), true);
    }
    public function putData()
    {
        json_encode(file_put_contents("prichody.json"));
    }
}


