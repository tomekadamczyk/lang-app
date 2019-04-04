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
            $pointName =  $_POST['placeName'];
            $pointsContainer =  $_POST['pointsContainer'];  
            $query = mysqli_query($this->con, "INSERT INTO travel VALUES ('','$pointName','$pointsContainer', '$user')");
             
            if(!$query) {
               echo 'Wystąpił błąd podczas dodawania';
            }
        }
    }

    public function displayPlaces() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        $query = mysqli_query($this->con, "SELECT * FROM travel WHERE user='$user'");
        if(mysqli_num_rows($query) > 0) {
            while ($data = $query->fetch_object()) {  
                echo '<div class="cz-travel__place"><div class="cz-travel__place-name"><strong>'.$data->name.'</strong></div>
                <div class="cz-travel__place-point">'.$data->points.'</div></div>';
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