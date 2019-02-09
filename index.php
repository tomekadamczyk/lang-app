<?php
include('top.php');
include('modules/class.constants.php');
include('modules/class.account.php');
$account = new Account($con);
include('handlers/login-handler.php');
include('handlers/register-handler.php');
//session_destroy();
error_reporting(E_ALL);
if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
    header("Location: views/register/register.php");
}

include('views/mainview/sidebar/sidebar.php');
include('views/mainview/dashboard/dashboard.php');
?>


<?php
include('footer.php');
?>