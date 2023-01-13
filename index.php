<?php
include'meno.php';
index();
arrivals();
students();
note();

function arrivals($jsonTime)
{
    $arrivals = include 'prichody.php';
    $jsonTime = json_decode($arrivals);
}
function students($jsonStudent)
{
    $students = include 'studenti.php';
    $jsonStudent = json_decode($students);
}
function index($jsonTime,$jsonStudent)
{
    date_default_timezone_set("Europe/Bratislava");
    $time = date("H:i");
    $name = $_POST["name"];
    if (empty($jsonStudent)) {
        $jsonStudent = [$name];
    } else {
        array_push($jsonStudent, $name->putStudent());
    }
    if (empty($jsonTime)) {
        $jsonTime = [$time];
    } else {
        array_push($jsonTime, $time->putTime());
    }
}
function note($jsonStudent)
{
    foreach ($jsonStudent as $student) {
        $time = date("H:i");
        if ($time <= "07:59") {
            echo "Prichod: " . $time . " => " . $student . "\n";
        }
        if ("08:00" <= $time & $time <= "20:00") {
            echo "Meskanie: " . $time . " => " . $student . "\n";
        }
        if ($time > "20" && $time <= "24") {
            die($_POST['name'] . " Nemozne ");
        }
    }
}