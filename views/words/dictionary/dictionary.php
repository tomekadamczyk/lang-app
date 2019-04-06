<?php
require_once './config.php';
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
                    <h1><strong>Słownik</strong></h1>
                    <small>Kliknij na wybrane słowo i zobacz jego definicję</small>
                </div>
                <div class="input-group mb-3 cz-datacontent-search-word">
                    <input type="text" class="form-control" id="cz-datacontent-search-word" class="float-right cz-datacontent-search-word" placeholder="Szukaj">
                </div>
                <hr>
            </div>
            <div>
                <div class="row">
                    <div id="dictionary" class="col-md-8 col-xl-10">
                        <h4>Lista słów</h4>
                        <div class="cz-datacontent-table__content">
                            <?php $word->displayDictionary() ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-2 mb-4">
                        <h4 id="selectCategories2" >Kategorie <i class="fas fa-chevron-down"></i></h4>
                        <div id="categoriesListContent" class="cz-categories__list">
                            <?php 
                                $category->displayCategoriesInDictionary();
                            ?>
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

</section>
<footer>
<script src="public/dist/js/wordsAndPhrases.bundle.js"></script>
<script src="public/dist/js/categories.bundle.js"></script>