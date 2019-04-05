<?php
class Travel {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insertPlace() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);          
        
        if(isset($_POST['saveNewPlace'])){ 
            $placeName = $_POST['placeName'];
            $pointsContainer = $_POST['pointsContainer'];
            
            $query = mysqli_query($this->con, "INSERT INTO travel VALUES ('','$placeName','$pointsContainer', '$user')");
            
            if(!$query) {
               echo 'Wystąpił błąd podczas dodawania';
            }
        }
    }

    public function getAllPlacesToJson() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        $query = mysqli_query($this->con, "SELECT * FROM travel WHERE user='$user'");
        while($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        return json_encode($rows);
    }

}