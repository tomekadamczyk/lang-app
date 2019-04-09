<?php 
require_once './modules/class.categories.php';
require_once './modules/class.account.php';

$category = new Categories($con);
$account = new Account($con);

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
    
}
$user = $account->getUserID($userLoggedIn);
?>

<section class="cz-categories">
        <div class="my-3">
            <h1><strong>Kategorie</strong></h1>
            <p>Tutaj możesz dodać nową kategorię, do której będziesz mógł przypisać słowo lub zwrot, np. Lekcja 1, Dom etc.<br>
            <small>Uwaga - kategorii nie można usuwać, ale można edytować ich nazwy.</small></p>
            
        </div>
        
        <div class="row bg-light pt-3">
            <div class="col-sm-12 col-md-3 cz-categories__form">
                <h2>Dodaj</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="categoryname">Nazwa</label>
                        <input type="text" class="form-control" name="categoryname" id="categoryname">
                    </div>
                    <?php if($user != 13) { 
                        ?> <input type="submit" name="addcategory" id="addcategory" class="btn btn-sm btn-primary" value="Stwórz"> <?php
                    }
                    else if ($user == 13) {
                        echo '<div class="alert alert-danger mt-3">W wersji demonstracyjnej nie można dodawać nowych treści</div>';
                    } ?>
                    
                </form>
            </div>
            <?php 
                $category->insertCategory();
            ?>
            <div class="col-sm-12 col-md-8">
                <h2>Lista aktualnych kategorii</h2>
                <div id="selectCategories" class="cz-categories__container-list cz-categories__phrasespage">
                    <?php 
                        $category->editCategory();
                        $category->displayCategories();
                    ?>
                </div>
            </div>
        </div>
</section>

</section>
<footer>