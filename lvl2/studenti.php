<?php
class Studenti
{
    public function getStudent()
    {
        return json_decode(file_get_contents("studenti.json"), true);
    }
    public function putStudent()
    {
        json_encode(file_put_contents("studenti.json"));
    }
}