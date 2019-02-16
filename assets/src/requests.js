const showWord = async() => {
    const response = await fetch('http://localhost:3002/words');
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
const wordToTranslate = document.querySelector('#flash-word>h2');
const wordTranslation = document.querySelector('#flash-translation>h2');
const checkTranslation = document.getElementById('cz-flashcards-check-translation');

const renderWord = async() => {
    const word = await showWord();
    
    wordTranslation.style.display = 'none';
    wordToTranslate.style.display = 'block';

    wordSubject.innerHTML = '';
    wordToTranslate.innerHTML = '';
    wordTranslation.innerHTML = '';

    wordSubject.append(word.topic);
    wordToTranslate.append(word.word);
    wordTranslation.append(word.translation);

}
randomWord.addEventListener('click', renderWord);
checkTranslation.addEventListener('click', function() {
    wordTranslation.style.display = 'block';
    wordToTranslate.style.display = 'none';
})
