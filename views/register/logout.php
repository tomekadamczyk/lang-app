<?php
session_start();

require_once '../../config.php';
require_once '../../modules/class.account.php';
$logowanie = New Account($con);
$logowanie->logout();


 ?>
