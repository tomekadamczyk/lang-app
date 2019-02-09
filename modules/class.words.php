<?php
class Words {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insertWord() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);
    
        $query = mysqli_query($this->con, "INSERT INTO user_words VALUES ('','".$_POST['slowo']."','".$_POST['tlumaczenie']."','".$_POST['temat']."','".$_POST['definicja']."', '".$_POST['level']."', '$user')");
            
        if(!$query) {
            echo 'Wystąpił błąd podczas dodawania';
        }
    }

    public function displayLastAddedWords() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        $query = mysqli_query($this->con, "SELECT * FROM user_words WHERE user='$user'");
        if(mysqli_num_rows($query) > 1) {
            while ($data = $query->fetch_object()) {  
                echo '<p><strong>'.$data->word.'</strong> - '.$data->translation.'</p>';
            }
        }
    }
    

}
?>