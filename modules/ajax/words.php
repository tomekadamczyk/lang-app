<?php

require_once '../config.php';
require_once '../class.words.php';
$word = new Words($con);
$wordsArray = [];

$words = $word->getWordsToJson();
?>
<script>console.log(<?php echo $words; ?>)</script>