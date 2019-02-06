<?php

    function sanitizeUsername($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }

    function sanitizePasswords($inputText) {
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }

    function sanitizeString($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        $inputText = strtolower($inputText);
        return $inputText;
    }


    if(isset($_POST['register'])) {
        $username = sanitizeUsername($_POST['username']);
        $firstname = sanitizeString($_POST['firstname']);
        $email = sanitizeString($_POST['email']);
        $email2 = sanitizeString($_POST['email2']);
        $password = sanitizePasswords($_POST['password']);
        $password2 = sanitizePasswords($_POST['password2']);

        $wasSuccessful = $account->register($username, $firstname, $email, $email2, $password, $password2);

        if($wasSuccessful == true) {
            $_SESSION['userLoggedIn'] = $username;
            header("Location: views/register/register-succeeded.php");
        }
    }

?>