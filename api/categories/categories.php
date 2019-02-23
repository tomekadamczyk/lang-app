<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../modules/config.php';
include_once '../../modules/class.categories.php';

$category = new Categories($con);

$displayJsonCategories = $category->getCategoriesToJson();

echo $displayJsonCategories;
