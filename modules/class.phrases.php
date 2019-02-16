<?php
class Phrase {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insertPhrase() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);
    
        $query = mysqli_query($this->con, "INSERT INTO user_phrases VALUES ('','".$_POST['phrase']."','".$_POST['translation']."','".$_POST['topic']."', '".$_POST['level']."', '$user')");
            
        if(!$query) {
            echo 'Wystąpił błąd podczas dodawania';
        }
    }

    public function getWordsToJson() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        $query = mysqli_query($this->con, "SELECT * FROM user_words WHERE user='$user'");
        while($row = mysqli_fetch_assoc($query)) {
            $rows[] = $row;
        }
        return json_encode($rows);
        // if(mysqli_num_rows($query) > 1) {
        //     while ($data = $query->fetch_object()) {  
        //         echo '<p><strong>'.$data->word.'</strong> - '.$data->translation.' - '.$data->definition.'</p>';
        //     }
        // }
    }

    public function displayPhrases() {
        require_once 'class.account.php';
        require_once 'class.words.php';
        $word = new Words($this->con);

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
        }

        $user = $account->getUserID($userLoggedIn);

        $lp = 1;
        $query = mysqli_query($this->con, "SELECT * FROM user_phrases WHERE user='$user'");
        if(mysqli_num_rows($query) > 0) {
            while ($data = $query->fetch_object()) { 
                $level = $word->getLevelId($data->level); 
                echo '<div class="cz-dictionary-word">';
                echo '<p class="cz-dictionary-word__item"><span>'.$lp.'</span> <strong><span>'.$data->phrase.'</span> - </strong><span>'.$data->translation.'</span><span class="cz-dictionary-word__level"><small>'.$level.'</small></span></p>';
                echo '</div>';
                $lp++;
            }
        }
        else {
            echo 'Brak połączenia';
        }
    }
    

}
?>