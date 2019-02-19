<?php
class Categories {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insertCategory() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);
        
        if(isset($_POST['addcategory'])){
            $query = mysqli_query($this->con, "INSERT INTO topics VALUES ('','".$_POST['categoryname']."', '$user')");
                
            if(!$query) {
                echo 'Wystąpił błąd podczas dodawania';
            }
        }
        
           
    }

    public function resetCategoryIncrement() {
        $sql = mysqli_query($this->con, "SET @count = 0");
        $sql = mysqli_query($this->con, "UPDATE `topics` SET `topics`.`id_topics` = @count:= @count + 1");

        $query = mysqli_query($this->con, "SELECT MAX(`id_topics`) AS max FROM `topics`");
        $row = mysqli_fetch_array( $query );
        $largestNumber = $row['max'];

        $query2 = mysqli_query($this->con, "ALTER TABLE `topics` AUTO_INCREMENT = $largestNumber");
    }


    public function displayCategories() {
        require_once 'class.account.php';


        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
        }

        $user = $account->getUserID($userLoggedIn);
        
        if(!empty($_GET['delete'])) {
            $topic_id = $_GET['delete'];
            $delete = mysqli_query($this->con, "DELETE FROM topics WHERE id_topics='$topic_id' AND user='$user'");
        }

        $query = mysqli_query($this->con, "SELECT * FROM topics WHERE user='$user'");
        $lp = 1;
        if(mysqli_num_rows($query) > 0) {
            while ($data = $query->fetch_object()) {  
                echo '<p class="cz-categories__item"><span><strong>'.$lp.'</strong> - '.$data->name.'</span> <a class="btn btn-sm btn-danger" href="index.php?id=5&delete='.$data->id_topics.'">Usuń</a></p>';
                $lp++;
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

    public function getTopicId($id) {
        
        $query = mysqli_query($this->con, "SELECT * FROM topics WHERE id_topics='$id'");
        if(mysqli_num_rows($query) == 1) {
            while ($data = $query->fetch_object()) {   
                return $data->id_topics;
            }
        }
        else {
            return 'Brak powiązanego id';
        }
    }

}
?>