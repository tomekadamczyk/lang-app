let getWord = document.querySelector('#flash-word');
let getTranslation = document.querySelector('#flash-translation');
let typeWord = document.querySelector('#typeWord');
let nextWord = document.querySelector('#all-words');
let achievedPoints = document.querySelector('#achieved-points');
let timeLeft = document.querySelector('#time-left');


class Test {
    constructor(word) {
        this.seconds = 10;
        this.word = word;
        this.interval = 0;
    }

    setTime() {
        timeLeft.textContent = `0:${this.seconds}`;
        this.countDownWord();
    }
    
    reset() {
      this.seconds = 10;
      this.interval = 0;
    }
    
    clear() {      
      clearInterval(this.interval);
      this.reset();
    }

    getWord() {
        return this.word.word;
    }

    getTranslation() {
        return this.word.translation;
    }

    countDownWord() {
        this.interval = setInterval(() => {
            this.seconds--;
            timeLeft.textContent = `0:${this.seconds}`;
            if(this.seconds < 10) {
                timeLeft.textContent = `0:0${this.seconds}`;
            }

            if(this.seconds < 4) {
                timeLeft.style.color = "red";
            }
            if(this.seconds >= 4) {
                timeLeft.style.color = "inherit";
            }
            if(this.seconds === 0) {
                words--;
                nextWord.textContent = words + "/" + allWords;
                clearInterval(this.interval)
                typeWord.value = '';
                this.clear();     
                startTest(); 
            }
            return this.seconds;
        }, 1000)
    }
}

let counting;

let points = 0;
let hit = false;
let words = 10;
let allWords = 10;
let all = [];
let valid = [];

const startTest = async() => {
    let test = await showWord();
    counting = new Test(test);
    nextWord.textContent = words + "/" + allWords;
    achievedPoints.textContent = points;
    renderNewWord();
    counting.countDownWord();
    addBackgroundColor(getWord, '#1b64b0');

    if(words === 0) {
        endGame();
    }     

    all.push(counting.word);
    console.log(all);
    console.log(valid)
}

timeLeft.addEventListener('click', startTest);

const endGame = () => {
    clearInterval(counting.interval)
    counting.clear();
    alert('Koniec testu, sprawdź swoje odpowiedzi :)')
    typeWord.disabled = true;
    timeLeft.style.visibility = 'hidden';
    flashcardContent(getWord, flashcard.finish);
    addBackgroundColor(getWord, '#fd7e14');
}

const flashcard = {
    start: 'Rozpocznij test',
    finish: 'Koniec testu'
}

const flashcardContent = (element, content) => {
    element.textContent = content;
}

const addBackgroundColor = (element, color) => {
    element.style.background = color;
}

typeWord.addEventListener('input', function(e) {
    if(e.target.value === counting.word.translation) {
        points++;
        words--;
        nextWord.textContent = words + "/" + allWords;
        achievedPoints.textContent = points;
        clearImmediate(counting.interval);
        typeWord.value = '';
        counting.clear();
        startTest();
        valid.push(counting.word);
    }
})

const renderNewWord = () => {
    getWord.textContent = counting.getWord();
}

flashcardContent(getWord, flashcard.start);
addBackgroundColor(getWord, '#28a745');