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

    public function deletePlace() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);  

        if(!empty($_GET['deletePlace'])) {
            $travel_id = $_GET['deletePlace'];
            $delete = mysqli_query($this->con, "DELETE FROM travel WHERE id_travel='$travel_id' AND user='$user'");
        }
    }

    public function resetTravelIncrement() {
        $sql = mysqli_query($this->con, "SET @count = 0");
        $sql = mysqli_query($this->con, "UPDATE `travel` SET `travel`.`id_travel` = @count:= @count + 1");

        $query = mysqli_query($this->con, "SELECT MAX(`id_travel`) AS max FROM `travel`");
        $row = mysqli_fetch_array( $query );
        $largestNumber = $row['max'];

        $query2 = mysqli_query($this->con, "ALTER TABLE `travel` AUTO_INCREMENT = $largestNumber");
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