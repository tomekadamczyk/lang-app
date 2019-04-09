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
            $query = mysqli_query($this->con, "INSERT INTO topics VALUES ('','".$_POST['categoryname']."', '$user', 1)");
                
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
                echo '<p class="cz-categories__item"><span><strong>'.$lp.'</strong> - '.$data->name.'</span> <span><a class="edit-icon" href="index.php?id=5&edit='.$data->id_topics.'"><i class="far fa-edit"></i></a></p>';               
                $lp++;
            }
        }
    }

    public function displayCategoriesInDictionary() {
        require_once 'class.account.php';


        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
        }

        $user = $account->getUserID($userLoggedIn);

        $query = mysqli_query($this->con, "SELECT * FROM topics WHERE user='$user'");
        if(mysqli_num_rows($query) > 0) {
            while ($data = $query->fetch_object()) { 

                $id = $this->getTopicId($data->id_topics);
                $checking = $data->checked;
                if($data->checked == 1) { 
                    $check ='checked';
                } 
                if($data->checked == 0) {
                    $check = 'unchecked';
                }
                //$namePost = "dictCategory$id";
                echo '<div class="cz-categories__item">
                            <label for="dictCategory[]">'.$data->name.'</label>
                            <input class="cz-categories-check check-word-'.$id.'" type="checkbox" name="dictCategory[]" value="'.$id.'" '.$check.'></div>';
                            // $check = $_POST["dictCategory".$data->id_topics.""];
        echo $this->checkCategory($id);

                }
                
        }
    }    

    public function checkCategory($id) {
        require_once 'class.account.php';


        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
        }

        $user = $account->getUserID($userLoggedIn);
        //$namePost = 'dictCategory'.$id.'';
        if(isset($_POST['selectCategories'])) {
                if(!empty($_POST['dictCategory'])) {
                    foreach ($_POST['dictCategory'] as $category) {
                            echo $category;
                            echo "UPDATE topics SET checked=$category WHERE id_topics='$id' AND user='$user'"; echo '<br>';
                            $query = mysqli_query($this->con, "UPDATE topics SET checked=0 WHERE id_topics='$id' AND user='$user'");
                        
                    }
                }
                else {
                    foreach ($_POST['dictCategory'] as $category) {
                            echo $category;
                            echo "UPDATE topics SET checked=$category WHERE id_topics='$id' AND user='$user'"; echo '<br>';
                            $query = mysqli_query($this->con, "UPDATE topics SET checked=1 WHERE id_topics='$id' AND user='$user'");
                        
                    }
                }
                    // $query = mysqli_query($this->con, "UPDATE topics SET checked=$_POST[$namePost] WHERE user='$user' AND id_topics='$id'");
                
                }
            }
        
    
        
        
        
    


    public function editCategory() {
        require_once 'class.account.php';
        $account = new Account($this->con);
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
        }
        $user = $account->getUserID($userLoggedIn);


        if(!empty($_GET['edit'])) {
            $topic_id = $_GET['edit'];
            echo '<div id="categoryUpdate" class="cz-categories__update">
                <form method="POST">
                <input class="form-control my-2" type="text" name="newNameCategory" placeholder="Podaj nową nazwę kategorii">';
                if($user != 13) { 
                    echo '<input type="submit" value="Zaktualizuj" name="updateCategory" class="btn btn-sm btn-success">';
                }
                else if ($user == 13) {
                    echo '<div class="alert alert-danger mt-3">W wersji demonstracyjnej nie można edytować istniejących treści</div>';
                }
                echo '</form>
                </div>';
        }
        if(isset($_POST['updateCategory'])){
            $this->updateCategory();
        }
    }
    

    public function updateCategory() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);


        if(!empty($_GET['edit'])) {
            $topic_id = $_GET['edit'];
                $update = mysqli_query($this->con, "UPDATE topics SET name='".$_POST['newNameCategory']."' WHERE id_topics='$topic_id' AND user='$user'");
        }
    }




    public function getCategoriesToJson() {
        require_once 'class.account.php';

        $account = new Account($this->con);
        
        if(isset($_SESSION['userLoggedIn'])) {
            $userLoggedIn = $_SESSION['userLoggedIn'];
            
        }
        $user = $account->getUserID($userLoggedIn);

        $query = mysqli_query($this->con, "SELECT * FROM topics WHERE user='$user'");
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