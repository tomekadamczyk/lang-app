<?php 
require_once './modules/class.categories.php';
$category = new Categories($con);
?>

<section class="cz-flashcards">
    <div class="container">
        <h1><strong>Test słówek</strong></h1>
        <div class="row">
            <div class="col-md-8 mx-auto cz-flashcards__card">
                <div class="text-center mx-autotranslateBox">
                    <div class="cz-points">
                        Punkty <span id="achieved-points"></span>/10
                    </div>
                    <div class="cz-all-words">
                        Liczba słów: <span id="all-words">10/10</span>
                    </div>
                    <div id="flash-word" class="cz-flashcards-to-translate cz-flashcards-to-translate--word empty"></div>
                    <div class="cz-translate-the-word mt-3">
                        <span class="cz-time-left" id="time-left">Rozpocznij test</span>
                        <label for="typeWord">Przetłumacz</label>
                        <input type="text" class="form-control text-center" name="typeWord" id="typeWord">
                    </div>
                </div>
            </div>
        </div>
        <div class="cz-flashcards-categories">
            <select name="" id="select-cat"></select>
        </div>
        <table class="table inactive" id="cz-flashcards-test-scores">
            <thead>
                <tr>
                <th scope="col">Słowo</th>
                <th scope="col">Tłumaczenie</th>
                </tr>
            </thead>
            <tbody id="score-table">
            </tbody>
        </table>
    </div>
</section>