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