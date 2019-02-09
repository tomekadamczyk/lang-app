<?php


?>

<section class="cz-flashcards">
    <div class="container">
        <div class="row">
        <?php
            // require_once 'modules/functions.php';
            // $translations = new Translations;
        ?>
        <div class="col-md-8 mx-auto cz-flashcards__card">
            <div class="text-center mx-auto translateBox">
                <h1>Kliknij i przetłumacz</h1>
                <form action="" method="POST">
                <input name="randomWord" type="submit" id="randomWord" style="display: none">
                <div class="btn btn-lg btn-primary" onclick="document.getElementById('randomWord').click();">Wylosuj słowo</div>
                </form>
                
                <?php
                /*$translations->translateWord();*/
                ?>
                <div class="row subject">
                <p class="wordSubject"></p>
                </div>
                <div class="row wordToTranslate"><h2 class="wordToTranslate_item"></h2>
                <h2 class="wordTranslation"></h2>
                </div>
                <div class="btn btn-sm btn-outline checkTranslation">Nie pamiętasz tego słowa?<br><strong>Zobacz tłumaczenie</strong></div>
                
                <!-- <button id="chooseWord">Klik</button> -->
                </div>
            </div>
        </div>
    </div>
</section>