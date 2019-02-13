<?php
require_once './modules/config.php';
require_once './modules/class.words.php';
$word = new Words($con);

?>
<section class="cz-dictionary">
    <div class="cz-dictionary-table">
        <div class="col">
            <div class="my-3">
                <div class="cz-dictionary-header">
                    <h1 class="text-primary"><strong>Słownik</strong></h1>
                    <small>Kliknij na wybrane słowo i zobacz jego definicję</small>
                </div>
                <div class="input-group mb-3 cz-dictionary-search-word">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Szukaj</span>
                    </div>
                    <input type="text" class="form-control" id="cz-dictionary-search-word" class="float-right cz-dictionary-search-word">
                </div>
                <hr>
            </div>
            <div id="cz-dictionary-table__content">
                <?php $word->displayDictionary() ?>
            </div>
        </div>
    </div>
</section>

<?php
include('footer.php');
?>