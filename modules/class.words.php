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
    
        
        if(isset($_POST['addWord'])){
            $query = mysqli_query($this->con, "INSERT INTO user_words VALUES ('','".$_POST['slowo']."','".$_POST['tlumaczenie']."','".$_POST['temat']."','".$_POST['definicja']."', '".$_POST['level']."', '$user')");
             
            if(!$query) {
                echo 'Wystąpił błąd podczas dodawania';
            }
        }
        else if (isset($_POST['addPhrase'])) {
            $query = mysqli_query($this->con, "INSERT INTO user_phrases VALUES ('','".$_POST['phrase']."','".$_POST['phraseTranslate']."','".$_POST['temat']."','".$_POST['level']."', '$user')");
             
            if(!$query) {
                echo 'Wystąpił błąd podczas dodawania';
            }
        }
           
    }

    public function resetWordIncrement() {
        $sql = mysqli_query($this->con, "SET @count = 0");
        $sql = mysqli_query($this->con, "UPDATE `user_words` SET `user_words`.`id_words` = @count:= @count + 1");

        $query = mysqli_query($this->con, "SELECT MAX(`id_words`) AS max FROM `user_words`");
        $row = mysqli_fetch_array( $query );
        $largestNumber = $row['max'];

        $query2 = mysqli_query($this->con, "ALTER TABLE `user_words` AUTO_INCREMENT = $largestNumber");
    }

    

    public function resetPhraseIncrement() {
        $sql = mysqli_query($this->con, "SET @count = 0");
        $sql = mysqli_query($this->con, "UPDATE `user_words` SET `user_words`.`id_words` = @count:= @count + 1");

        $query = mysqli_query($this->con, "SELECT MAX(`id_words`) AS max FROM `user_words`");
        $row = mysqli_fetch_array( $query );
        $largestNumber = $row['max'];

        $query2 = mysqli_query($this->con, "ALTER TABLE `user_words` AUTO_INCREMENT = $largestNumber");
    }


    public function displayLastAddedWords() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        $query = mysqli_query($this->con, "SELECT * FROM user_words WHERE user='$user' LIMIT 20");
        if(mysqli_num_rows($query) > 1) {
            while ($data = $query->fetch_object()) {  
                echo '<p><strong>'.$data->word.'</strong> - '.$data->translation.'</p>';
            }
        }
    }

    public function getWordsToJson() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        $query = mysqli_query($this->con, "SELECT * FROM user_words WHERE user='$user' ORDER BY RAND()");
        while($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        return json_encode($rows);
        // if(mysqli_num_rows($query) > 1) {
        //     while ($data = $query->fetch_object()) {  
        //         echo '<p><strong>'.$data->word.'</strong> - '.$data->translation.' - '.$data->definition.'</p>';
        //     }
        // }
    }

    public function displayDictionary() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        $lp = 1;
        $query = mysqli_query($this->con, "SELECT * FROM user_words WHERE user='$user'");
        if(mysqli_num_rows($query) > 1) {
            while ($data = $query->fetch_object()) { 
                $level = $this->getLevelId($data->level); 
                echo '<div class="cz-dictionary-word">';
                echo '<p class="cz-dictionary-word__item"><span>'.$lp.'</span> <strong><span>'.$data->word.'</span> - </strong><span>'.$data->translation.'</span><span class="cz-dictionary-word__level"><small>'.$level.'</small></span></p>
                <p class="cz-dictionary-definition">'.$data->definition.'</p>';
                echo '</div>';
                $lp++;
            }
        }
    }
    
    public function getLevelId($id) {
        
        $query = mysqli_query($this->con, "SELECT * FROM levels WHERE id_levels='$id'");
        if(mysqli_num_rows($query) == 1) {
            while ($data = $query->fetch_object()) {   
                return $data->name;
            }
        }
        else {
            return 'Brak powiązanego id';
        }
    }

}
?>