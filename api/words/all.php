<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../modules/config.php';
include_once '../../modules/class.words.php';

$word = new Words($con);

$displayJsonWords = $word->getAllWordsToJson();

echo $displayJsonWords;
