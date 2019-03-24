let getWord = document.querySelector('#flash-word');
let getTranslation = document.querySelector('#flash-translation');
let typeWord = document.querySelector('#typeWord');
let nextWord = document.querySelector('#all-words');
let achievedPoints = document.querySelector('#achieved-points');
let timeLeft = document.querySelector('#time-left');
let scoreTable = document.querySelector('#score-table');
let testScoresTable = document.querySelector('#cz-flashcards-test-scores');


class Test {
    constructor(word) {
        this.seconds = 10;
        this.word = word;
        this.interval = 0;
        this.finished = false;
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
let words = 10;
let allWords = 10;
let valid = [];
let hit;
let scores = [];
let word;
let col1;
let lp;


const getCategoryIndex = (arr, number) => {
    return arr.findIndex((item, index) => {
        if(number === index) {
            return number;
        }
    })
}

const getRandomIndex = arr => {
    return Math.floor(Math.random() * arr.length);
}

let categorizedWordsArray = [];

const categorizedWords = (word, category) => {
    word.forEach((item, index) => {
        if (item.topic == category) {
            categorizedWordsArray.push(item);
        }
    })
}


const startTest = async() => {
    let test = await showAllWords();
    let categories = await getCategories();
    
    const category = getCategoryIndex(categories, 6);
    
    categorizedWords(test, category);
    const index = getRandomIndex(categorizedWordsArray);

    counting = new Test(categorizedWordsArray[index]);
    nextWord.textContent = words + "/" + allWords;
    achievedPoints.textContent = points;
    renderNewWord();
    counting.countDownWord();
    addBackgroundColor(getWord, '#1b64b0');
    if(words === 0) {
        endGame();
    }     
    word = Object.create(null);
    word.word = counting.word.word;
    word.hit = false;
    word.class = 'missed';
    scores.push(word);
    generateWordScore();
    generateTranslation(); 
}

const generateWordScore = () => {
    col1 = document.createElement('tr');
    col1.classList.add('cz-flashcard-score');
    let cell1 = document.createElement('td');
    cell1.textContent = counting.word.word;
    col1.appendChild(cell1);
    scoreTable.appendChild(col1);
}

const generateTranslation = () => {
    let cell2 = document.createElement('td');
    cell2.textContent = counting.word.translation;
    cell2.style.color = '#000';
    col1.appendChild(cell2);
    scoreTable.appendChild(col1);
}

timeLeft.addEventListener('click', function() {
    getWord.classList.add('active');
    startTest();
});

const endGame = () => {
    counting.finished = true;
    
    if(counting.finished === true) {
        counting.word.word = null;
        counting.word.translation = null;
    }
    
    getWord.textContent = '';
    clearInterval(counting.interval)
    counting.clear();
    alert('Koniec testu, sprawdź swoje odpowiedzi :)')
    typeWord.disabled = true;
    timeLeft.style.visibility = 'hidden';
    flashcardContent(getWord, flashcard.finish);
    addBackgroundColor(getWord, '#fd7e14');
    testScoresTable.classList.remove('inactive');   
}

const flashcard = {
    start: ' s',
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
        word.hit = true;
        word.class = 'active'; 
        col1.classList.add(word.class)

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