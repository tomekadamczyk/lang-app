<?php
require_once './modules/config.php';
require_once './modules/class.words.php';
$word = new Words($con);

?>
<section class="cz-dictionary">
    <div class="cz-dictionary-table">
        <div class="col">
            <div class="my-3">
                <h1 class="text-primary"><strong>Słownik</strong></h1>
                <small>Kliknij na wybrane słowo i zobacz jego definicję</small>
                <hr>
            </div>
            <div class="table-responsive">
                <?php $word->displayDictionary() ?>
            </div>
        </div>
    </div>
</section>

<?php
include('footer.php');
?>