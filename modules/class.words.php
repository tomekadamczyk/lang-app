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

    public function generateWordForm() {
        require_once 'class.account.php';


        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
        }

        $user = $account->getUserID($userLoggedIn);
        

        $query = mysqli_query($this->con, "SELECT * FROM topics WHERE user='$user'");
        echo '<form action="" method="POST">
        <div id="newWordForm">
        <input type="text" class="form-control my-2" id="slowo" name="slowo" placeholder="Dodaj nowe słowo">
        <input type="text" class="form-control my-2" id="tlumaczenie" name="tlumaczenie" placeholder="Wpisz tłumaczenie">
        
        <textarea class="form-control my-2" name="definicja" placeholder="Wpisz definicję"></textarea>

        <div class="input-group mb-3 ta-subject-select">
        <div class="input-group-prepend">
            <label class="input-group-text ta-subject-select__label" for="temat">Temat</label>
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
        <input type="submit" class="btn bg-primary text-white addNewWord" id="addWord" name="addWord" value="Dodaj nowe słowo">
        </div>
        </form>';
    }


    public function resetWordIncrement() {
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

    public function getRandomWordToJson() {
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

    public function getAllWordsToJson() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        $query = mysqli_query($this->con, "SELECT * FROM user_words WHERE user='$user'");
        while($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        return json_encode($rows);
    }

    public function displayDictionary() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        $lp = 1;
        $query = mysqli_query($this->con, "SELECT * FROM user_words WHERE user='$user' AND topic in (SELECT id_topics FROM topics WHERE checked=1)");

        $this->editWord();
        if(mysqli_num_rows($query) > 0) {
            while ($data = $query->fetch_object()) { 
                $level = $this->getLevelId($data->level); 
                echo '<div class="cz-datacontent-word cz-datacontent-item-'.$data->topic.'">';
                echo '<p class="cz-datacontent-word__item"><span>'.$lp.'</span> <strong><span>'.$data->word.'</span> - </strong><span>'.$data->translation.'</span><span class="float-right ml-2"><a class="cz-datacontent-word__edit" href="?id=3&edit='.$data->id_words.'"><i class="far fa-edit"></i></a></span><span class="cz-datacontent-word__level"><small>'.$level.'</small></span></p>
                <p class="cz-datacontent-definition">'.$data->definition.'</p>';
                echo '</div>';
                $lp++;
            }
        }
    }

    public function editWord() {
        if(isset($_GET['edit'])) {
            $word_id = $_GET['edit'];
            $givenId = $this->getWordId($word_id);
            $this->displayEditingWord($givenId);
        }
    }

    public function displayEditingWord($id) {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);


        $query = mysqli_query($this->con, "SELECT * FROM user_words WHERE user='$user' AND id_words='$id'");
        /* CHECKING DETAILED ERROR
            var_dump(mysqli_error($this->con));
        */
        if(mysqli_num_rows($query) == 1){
            $row = $query->fetch_assoc();
        }
            ?>
                <form method="POST" class="cz-edit-form">
                    <label for="editword">"<?php echo $row['word']; ?>"</label>
                    <input type="text" class="form-control" name="editword" id="editword" placeholder="Edytuj słowo">
                    <label for="editranslation">"<?php echo $row['translation']; ?>"</label>
                    <input type="text" class="form-control" name="editranslation" id="edittranslation" placeholder="Edytuj tłumaczenie">
                    <label for="editdefinition">"<?php echo $row['definition']; ?>"</label>
                    <input type="text" class="form-control" name="editdefinition" id="editdefinition" placeholder="Edytuj definicję">
                    <input type="submit" class="btn btn-sm btn-success" name="updateword" value="Zapisz">
                </form>
            <?php

        if(isset($_POST['updateword'])){
            $this->updateWord();
        }
    }

    public function updateWord() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        if(!empty($_GET['edit'])) {
            $word = $_GET['edit'];
                $update = mysqli_query($this->con, "UPDATE user_words SET word='".$_POST['editword']."', translation='".$_POST['editranslation']."', definition='".$_POST['editdefinition']."' WHERE id_words='$word' AND user='$user'");
        }
        header("Location: index.php?id=3");
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

    public function getWordId($id) {
        
        $query = mysqli_query($this->con, "SELECT * FROM user_words WHERE id_words='$id'");
        if(mysqli_num_rows($query) == 1) {
            while ($data = $query->fetch_object()) {   
                return $data->id_words;
            }
        }
        else {
            return 'Brak powiązanego id';
        }
    }

}
?>