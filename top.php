<?php
include('config.php');
require_once 'modules/class.categories.php';
require_once 'modules/class.words.php';
require_once 'modules/class.phrases.php';

$category = new Categories($con);
$word = new Words($con);
$phrase = new Phrase($con);

$category->resetCategoryIncrement();
$word->resetWordIncrement();
$phrase->resetPhraseIncrement();
?>

<!DOCTYPE html>

<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Language app</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,500i,600,700,800&amp;subset=latin-ext" rel="stylesheet"> 
	<meta name="keywords" content="Language app" />
	<meta name="description" content="Language app" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body>