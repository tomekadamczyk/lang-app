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

    public function register($username, $firstname, $email, $email2, $password, $password2) {
        $this->validateUsername($username);

        if(empty($errorArray)) {
            return $this->insertUserDetails($username, $firstname, $email, $password);
        }
    }

    public function insertUserDetails($username, $firstname, $email, $password) {
        $encryptedPassword = md5($password);
        $result = mysqli_query($this->con, "INSERT INTO users VALUES('', '$username', '$firstname', '$email', '$encryptedPassword')");
        return result;
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
}
?>