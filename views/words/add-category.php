<?php 
require_once './modules/class.categories.php';
$category = new Categories($con);
//$category->resetCategoryIncrement();
?>

<section class="cz-categories">
            <h1>Kategorie</h1>
            <p>Tutaj możesz dodać nową kategorię, do której będziesz mógł przypisać słowo lub zwrot, np. Lekcja 1, Dom etc.</p>
        
        <div class="row">
            <div class="col-sm-6 col-md-6 cz-categories__form">
                <h2>Dodaj</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="categoryname">Nazwa</label>
                        <input type="text" class="form-control" name="categoryname" id="categoryname">
                    </div>
                    <input type="submit" name="addcategory" id="addcategory" class="btn btn-sm btn-primary" value="Stwórz">
                </form>
            </div>
            <?php 
                $category->insertCategory();
            ?>
            <div class="col-sm-6 col-md-4">
                <h2>Lista aktualnych kategorii</h2>
                <div id="categoryList" class="cz-categories__container-list">
                    <?php 
                        $category->displayCategories();
                    ?>
                </div>
            </div>
        </div>
</section>
