let getWord = document.querySelector('#flash-word');
let getTranslation = document.querySelector('#flash-translation');
let typeWord = document.querySelector('#typeWord');
let nextWord = document.querySelector('#next-word');
let achievedPoints = document.querySelector('#achieved-points');
let timeLeft = document.querySelector('#time-left');

// class Flashtest {
//     constructor(word) {
//         this.word = word;
//         this.points = 0;
//     }

//     countPoints() {
//         this.points++;
//     }

//     typeWordToTranslate() {

//     }
// }

const countPoints = (points) => {
    points = points + 1;
}
achievedPoints.textContent = countPoints();

const getAnotherWord = (e, nextWord, nextTranslation) => {
        getTranslation.textContent = nextTranslation;
        getWord.textContent = nextWord;
}

const shuffleWords = (a) => {
    for (let i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}


const getNewWordIndex = (arr) => Math.floor(Math.random() * arr.length);

const startTest = async() => {
    let points = 0;
    let test = await showAllWords();
    let word = getNewWordIndex(test);
    getWord.textContent = test[word].word;

    achievedPoints.textContent = points;
    nextWord.classList.remove('active');

    typeWord.addEventListener('input', function(e) {
        if(e.target.value === test[word].translation) {
            getTranslation.textContent = test[word].translation;
            getWord.style.background = '#17a2b8';
            nextWord.classList.add('active');
            points++;
            achievedPoints.textContent = points;
            
            nextWord.addEventListener('click', function(e) {
                e.target.value = '';
                nextWord.classList.remove('active');
                word = getNewWordIndex(test);
                getAnotherWord(test[word].word, test[word].translation);
            });
        }
    })

    timeLeft.addEventListener('click', function() {

        let seconds = 15;
        timeLeft.textContent = `0:${seconds}`;
        const countDownWord = () => {
            seconds = seconds - 1; 
            timeLeft.textContent = `0:${seconds}`;
            if(seconds < 10) {
                timeLeft.textContent = `0:0${seconds}`;
            }
            if(seconds === 0) {
                clearInterval(timeDown);
                alert('czas minął');
                word = getNewWordIndex(test);
                getAnotherWord(test[word].word, test[word].translation);
                timeLeft.textContent = 'START';
            }
        }
        let timeDown = setInterval(countDownWord, 1000);
    })
}
startTest();