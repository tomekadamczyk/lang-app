<?php
require_once 'register-handler.php';

    if(isset($_POST['changePassword'])) {
        $username = $_POST['username'];
        $newPassword = sanitizePasswords($_POST['password']);
        $newPassword2 = sanitizePasswords($_POST['password2']);
        $account->checkUsername($username);
        
        $wasSuccessful = $account->changePassword($username, $newPassword, $newPassword2);

        if($wasSuccessful) {
            header("Location: change-password-succeeded.php");
        }
    }
?>