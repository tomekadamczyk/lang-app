<?php 
require_once './modules/class.categories.php';
$category = new Categories($con);
?>

<section class="cz-flashcards">
    <div class="container">
        <h1><strong>Test słówek</strong></h1>
        <div class="row my-5">
            <div class="col-md-4">
                <div class="cz-flashcards__box cz-flashcards__box--categories">
                    <select name="" id="select-cat"></select>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="cz-flashcards__box cz-flashcards__box--points">
                    Punkty&nbsp; <span id="achieved-points"></span>/10
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="cz-flashcards__box cz-flashcards__box--all-words">
                    Liczba słów:&nbsp; <span id="all-words">10/10</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto cz-flashcards__card">
                <div class="text-center mx-autotranslateBox">
                    <div id="flash-word" class="cz-flashcards-to-translate cz-flashcards-to-translate--word empty"></div>
                    <span class="cz-time-left" id="time-left">Rozpocznij test</span>
                    <div class="cz-flashcards__translate mt-3">
                        <label for="typeWord">Przetłumacz</label>
                        <input type="text" class="form-control text-center" name="typeWord" id="typeWord">
                    </div>
                </div>
            </div>
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