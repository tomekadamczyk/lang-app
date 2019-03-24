<?php
require_once './modules/config.php';
require_once './modules/class.words.php';
require_once './modules/class.categories.php';
$category = new Categories($con);
$word = new Words($con);
$word->resetWordIncrement();

?>
<section class="cz-datacontent">
    <div class="cz-datacontent-table">
        <div class="col">
            <div class="my-3">
                <div class="cz-datacontent-header">
                    <h1 class="text-primary"><strong>Słownik</strong></h1>
                    <small>Kliknij na wybrane słowo i zobacz jego definicję</small>
                </div>
                <div class="input-group mb-3 cz-datacontent-search-word">
                    <input type="text" class="form-control" id="cz-datacontent-search-word" class="float-right cz-datacontent-search-word" placeholder="Szukaj">
                </div>
                <hr>
            </div>
            <div>
                <div class="row">
                    <div class="col-md-4 col-xl-2 mb-4">
                        <h4>Kategorie</h4>
                        <div id="selectCategories2" class="cz-categories__container-list">
                            <?php 
                                $category->displayCategoriesInDictionary();
                            ?>
                        </div>
                    </div>
                    <div id="dictionary" class="col-md-8 col-xl-10">
                        <h4>Lista słów</h4>
                        <div class="cz-datacontent-table__content">
                            <?php $word->displayDictionary() ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="cz-pagination">
                <ul>
                    <li id="prevPage" class="cz-pagination__item cz-pagination__control">Poprzednia strona</li>
                    <li class="cz-pagination__item">1</li>
                    <li class="cz-pagination__item">2</li>
                    <li id="nextPage" class="cz-pagination__item cz-pagination__control">Następna strona</li>
                </ul>
            </div>-->
        </div>
    </div>
</section>

<?php
include('footer.php');
?>