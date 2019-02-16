'use strict'

const showWord = async() => {
    const response = await fetch('http://localhost:3000/www/appcz/lang-app/api/words/read.php');
    if (response.status === 200) {
        const data = await response.json();
        return data[0];
    }   
    else {
        throw new Error('Błąd w pobieraniu danych');
    }
}

const randomWord = document.getElementById('cz-flashcards-button');
const wordSubject = document.getElementById('cz-flashcards-subject');
const wordToTranslate = document.getElementById('flash-word');
const wordTranslation = document.getElementById('flash-translation');
const checkTranslation = document.getElementById('cz-flashcards-check-translation');

const renderWord = async() => {
    const word = await showWord();
    console.log(word)
    
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
