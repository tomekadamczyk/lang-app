<?php
class Account{

    private $con;
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }


    public function login($username, $password) {
        $password = md5($password);

        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        if(mysqli_num_rows($query) == 1) {
            return true;
        }
        else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }

    public function logout(){
        unset($_SESSION['userLoggedIn']);
        session_destroy();
        header("Location: register.php");
    }

    public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
            return false;
        }
        return '<div class="alert alert-danger text-center"><span>'.$error.'</span></div>';
        
    }

    // public function register($username, $firstname, $email, $email2, $password, $password2) {
    //     $this->validateUsername($username);
    //     $this->validateFirstname($firstname);
    //     $this->validateEmail($email, $email2);
    //     $this->validatePasswords($password, $password2);

    //     if(empty($this->errorArray)) {
    //         return $this->insertUserDetails($username, $firstname, $email, $password);
    //     }
    //     else {
    //         return false;
    //     }
    // }

    public function register($username, $password, $password2) {
            $this->validateUsername($username);
            $this->validatePasswords($password, $password2);
    
            if(empty($this->errorArray)) {
                return $this->insertUserDetails($username, $password);
            }
            else {
                return false;
            }
        }

    // public function insertUserDetails($username, $firstname, $email, $password) {
    //     $encryptedPassword = md5($password);
    //     $result = mysqli_query($this->con, "INSERT INTO users VALUES('', '$username', '$firstname', '$email', '$encryptedPassword')");
    //     return $result;
    // }

    public function insertUserDetails($username, $password) {
        $encryptedPassword = md5($password);
        $result = mysqli_query($this->con, "INSERT INTO users VALUES('', '$username', '', '', '$encryptedPassword')");
        return $result;
    }

    private function validateUsername($username) {
        if(strlen($username) < 4) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $checkUsername = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
        if(mysqli_num_rows($checkUsername) != 0 ) {
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }
    }

    private function validateFirstname($firstname) {
        if(strlen($firstname) < 4) {
            array_push($this->errorArray, Constants::$firstnameCharacter);
            return;
        }
    }

    private function validateEmail($email, $email2) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailIsInvalid);
            return;
        }

        if($email != $email2) {
            array_push($this->errorArray, Constants::$emailsDoNotMatch);
            return;
        }

        $checkEmail = mysqli_query($this->con, "SELECT email FROM users WHERE email='$email'");
        if(mysqli_num_rows($checkEmail) != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
            return;
        }
    }

    private function validatePasswords($password, $password2) {
        if($password != $password2) {
            array_push($this->errorArray, Constants::$passwordsDoNotMatch);
            return;
        }

        if(strlen($password) < 6 || strlen($password) > 15) {
            array_push($this->errorArray, Constants::$passrowdCharacters);
            return;
        }

        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, Constants::$passwordNotAlphaNumeric);
            return;
        }
    }

    public function checkUsername($username) {
        $query = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
        if(mysqli_num_rows($query) == 1) {
            return true;
        }
        else {
            array_push($this->errorArray, Constants::$usernameNotFound);
            return false;
        }
    }

    public function updatePassword($username, $password) {
        $password = md5($password);
        $query = mysqli_query($this->con, "UPDATE `users` SET `password`='$password' WHERE username='$username'");
        return $query;
    }

    public function changePassword($username, $password, $password2) {
        $this->validatePasswords($password, $password2);
        if(empty($this->errorArray)) {
            return $this->updatePassword($username, $password);
        }
        else {
            return false;
        }
    }

    public function getUserID($username) {
        
        $query = mysqli_query($this->con, "SELECT id_users FROM users WHERE username='$username'");
        if(mysqli_num_rows($query) == 1) {
            while ($data = $query->fetch_object()) {   
                return $data->id_users;
            }
        }
        else {
            return 'nie dziala';
        }
    }
}
?>