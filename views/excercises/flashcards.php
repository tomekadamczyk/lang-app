<?php


?>

<section class="cz-flashcards">
    <div class="container">
        <h1><strong>Fiszki</strong></h1>
        <div class="row">
            <div class="cz-flashcards__card">
                <div class="text-center mx-autotranslateBox">
                    <div class="btn btn-lg btn-custom my-2 " id="cz-flashcards-button">Wylosuj słowo</div>
                    <div class="text-center my-3 d-none">
                        <p id="cz-flashcards-subject" class="cz-flashcards-subject"></p>
                    </div>
                    <div id="flash-word" class="cz-flashcards-to-translate cz-flashcards-to-translate--word"></div>
                    <div id="flash-translation" class="cz-flashcards-to-translate cz-flashcards-to-translate--translation"></div>
                    <div class="btn btn-sm btn-outline"><span id="cz-flashcards-check-translation"><strong>Zobacz tłumaczenie</strong></span></div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>

<footer>

<script>

const displayFlashcardWord = () => {

const randomWord = document.getElementById('cz-flashcards-button');
const wordSubject = document.getElementById('cz-flashcards-subject');
const wordToTranslate = document.getElementById('flash-word');
const wordTranslation = document.getElementById('flash-translation');
const checkTranslation = document.getElementById('cz-flashcards-check-translation');
const renderWord = async() => {
    const word = await showWord();
    
    wordTranslation.style.display = 'none';
    wordToTranslate.style.display = 'block';

    wordSubject.innerHTML = '';
    wordToTranslate.innerHTML = '';
    wordTranslation.innerHTML = '';

    wordSubject.append('Temat: ' + word.topic);
    wordToTranslate.append(word.word);
    wordTranslation.append(word.translation);

}
randomWord.addEventListener('click', renderWord);
checkTranslation.addEventListener('click', function() {
    wordTranslation.style.display = 'block';
    wordToTranslate.style.display = 'none';
})

}

displayFlashcardWord();
</script>