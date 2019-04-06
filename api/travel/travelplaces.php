<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config.php';
include_once '../../modules/class.travel.php';

$travel = new Travel($con);

$displayJsonPlaces = $travel->getAllPlacesToJson();

echo $displayJsonPlaces;
