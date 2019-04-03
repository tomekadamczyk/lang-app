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
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/src/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/src/requests.js"></script>

<?php
include('views/mainview/sidebar/sidebar.php');

?>
<section class="cz-mainview">
<?php

include('views/mainview/dashboard/menubar.php');
    if (empty($_GET['id'])) {
        include('views/mainview/dashboard/dashboard.php');
    }
    else {
        switch($_GET['id']) {
            case 1:
            include('views/excercises/flashcards.php');
            break;

            case 2:
            include('views/excercises/hangman.php');
            break;

            case 3:
            include('views/words/dictionary.php');
            break;

            case 4:
            include('views/words/phrases.php');
            break;
            
            case 5:
            include('views/words/add-category.php');
            break;

            case 6:
            include('views/test/flashcards-test.php');
            break;

            case 7:
            include('views/favorites/travel.php');
            break;
        }
    }
?>

</footer>
<script src="assets/src/mobilemenu.js"></script>
<script src="assets/src/insertWord.js"></script>


<?php
include('footer.php');
?>