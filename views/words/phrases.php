<?php
require_once './modules/config.php';
require_once './modules/class.words.php';
require_once './modules/class.phrases.php';
$phrase = new Phrase($con);
$word = new Words($con);

?>
<section class="cz-datacontent">
    <div class="cz-datacontent-table">
        <div class="row">
            <div class="col-md-12">
                <div class="cz-datacontent-header">
                    <h1><strong>Zwroty i wyrażenia</strong></h1>
                </div>
                <div class="input-group mb-3 cz-datacontent-search-word">
                    <input type="text" class="form-control" id="cz-datacontent-search-word" class="float-right cz-datacontent-search-word" placeholder="Szukaj">
                </div>
                <div id="searchResults"></div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cz-datacontent-table__content">
                    <?php $phrase->displayPhrases() ?>
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
<script src="assets/src/script.js"></script>
<script src="assets/src/categories.js"></script>