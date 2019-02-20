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

    public function generatePhraseForm() {
        require_once 'class.account.php';


        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
        }

        $user = $account->getUserID($userLoggedIn);
        

        $query = mysqli_query($this->con, "SELECT * FROM topics WHERE user='$user'");
        echo '<form action="" method="POST">
        <div id="newPhraseForm">
        <input type="text" class="form-control my-2" id="phrase" name="phrase" placeholder="Dodaj nowy zwrot">
        <input type="text" class="form-control my-2" id="phraseTranslate" name="phraseTranslate" placeholder="Wpisz tłumaczenie">
        
        <div class="input-group mb-3 ta-subject-select">
        <div class="input-group-prepend">
            <label class="input-group-text ta-subject-select__label" for="inputGroupSelect01">Temat</label>
        </div>';
            if(mysqli_num_rows($query) > 0) {
                echo '<select class="custom-select" name="temat" id="temat">';
                (isset($_POST['temat'])) ? $temat = $_POST['temat'] : $temat='default';
                echo '<option'?> <?php if ($temat == 'default' ) echo "selected='selected'"; ?> <?php echo 'value="default">Wybierz temat</option>';
                while ($data = $query->fetch_object()) {  
                    echo '<option'?> <?php if ($temat == $data->id_topics) echo "selected='selected'"; ?> <?php echo 'value="'.$data->id_topics.'">'.$data->name.'</option>';
                }
                echo '</select>';
            }
            
            echo '</div>
                <div class="input-group mb-3 ta-subject-select">
                    <div class="input-group-prepend">
                        <label class="input-group-text ta-subject-select__label" for="inputGroupSelect02">Poziom</label>
                    </div>
                    <select class="custom-select" name="level" id="inputGroupSelect02">';
                    
                    (isset($_POST['level'])) ? $level = $_POST['level'] : $level='default';
                    ?>
                        <option <?php if ($level == 'default' ) echo 'selected' ; ?> value="default">Wybierz poziom</option>
                        <option <?php if ($level == 1 ) echo 'selected' ; ?> value="1">A</option>
                        <option <?php if ($level == 2 ) echo 'selected' ; ?> value="2">B</option>
                        <option <?php if ($level == 3 ) echo 'selected' ; ?> value="3">C</option>
                        <?php
                    echo '</select>
                </div>
                <input type="submit" class="btn bg-primary text-white addNewWord" id="addPhrase" name="addPhrase" value="Dodaj nowy zwrot">
            </div>
        </form> ';
    }

    public function resetPhraseIncrement() {
        $sql = mysqli_query($this->con, "SET @count = 0");
        $sql = mysqli_query($this->con, "UPDATE `user_words` SET `user_words`.`id_words` = @count:= @count + 1");

        $query = mysqli_query($this->con, "SELECT MAX(`id_words`) AS max FROM `user_words`");
        $row = mysqli_fetch_array( $query );
        $largestNumber = $row['max'];

        $query2 = mysqli_query($this->con, "ALTER TABLE `user_words` AUTO_INCREMENT = $largestNumber");
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