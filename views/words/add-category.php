<?php 
require_once './modules/class.categories.php';
$category = new Categories($con);
?>

<section class="cz-addCategory">
            <h1>Kategorie</h1>
            <p>Tutaj możesz dodać nową kategorię, do której będziesz mógł przypisać słowo lub zwrot, np. Lekcja 1, Dom etc.</p>
        
        <div class="row">
            <div class="col-md-6 cz-addCategory__form">
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
            <div class="col-md-6">
                <h2>Lista aktualnych kategorii</h2>
            </div>
        </div>
</section>