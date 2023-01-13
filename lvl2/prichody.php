<?php

class Prichody
{
    public function getTime()
    {
        return json_decode(file_get_contents("prichody.json"), true);
    }
    public function putTime()
    {
        json_encode(file_put_contents("prichody.json"));
    }
}