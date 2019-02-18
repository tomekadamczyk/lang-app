'use strict'

let guessesLeft = document.querySelector('#cz-hangman-left-guesses');
let wordToGuess = document.querySelector('#cz-hangman-word');
let hangmanWin = document.querySelector('#cz-hangman-win');
let hangmanFail = document.querySelector('#cz-hangman-fail');
let resetGame = document.querySelector('#cz-hangman-reset');
let definition = document.querySelector('#cz-hangman-definition');
let setGuesses = document.querySelector('#cz-hangman-set-guesses');
let newGame = document.querySelector('#cz-hangman-new');
let resetCount = document.querySelector('#cz-reset-count');

class Hangman {
    constructor(word, guesses) {
        this.word = word.toLowerCase().split('');
        this.guesses = guesses;
        this.guessLetter = [];
        this.status = 'Playing';
    }

    getWord() {
        let word = '';
        guessesLeft.textContent = 'Pozostało prób: ' + this.guesses;
        this.word.forEach(letter => {
            if(this.guessLetter.includes(letter) || letter === ' ') {
                word += letter;
            }
            else {
                word += '*';
            }
        });
        return word;
    }

    refreshWord() {
        this.guessLetter = [];
        hangmanWin.style.display = 'none';
        hangmanFail.style.display = 'none';
        this.guesses = setGuesses.value;
        this.status = 'Playing';
        guessesLeft.textContent = 'Pozostało prób: ' + this.guesses;
    }

    makeGuess(letter) {
        letter = letter.toLowerCase();
        let isUnique = !this.guessLetter.includes(letter);
        let isBadGuess = !this.word.includes(letter);
        

        if(isUnique && this.status == 'Playing') {
            this.guessLetter.push(letter);
        }

        if(isBadGuess && isUnique && this.status == 'Playing') {
            this.guesses--;
        }


        this.isFinished();
        this.isFailed();
        return this.getWord();
    }

    isFinished() {
        let finished = this.word.join('');
        if(this.getWord() === finished) {
            hangmanWin.style.display = 'block';
            this.status = 'Finished';
        }
    }

    isFailed() {
        if(this.guesses === 0) {
            hangmanFail.style.display = 'block';
            this.status = 'Failed';
        }
    }
}

let game;
let gameAttempts = 3;

window.addEventListener('keypress', function(e) {
    let guess = String.fromCharCode(e.charCode);
    wordToGuess.textContent = game.makeGuess(guess);
    renderGame();
})

const renderGame = () => {
    wordToGuess.textContent = game.getWord();
}

const setGuessesValue = () => {
    return setGuesses.value;
}

const setGameAttempts = () => {
    resetCount.textContent = 'Możesz resetować słowo jeszcze ' + gameAttempts + ' razy';
}

const startGame = async() => {
    let puzzle = await showWord();
    game = new Hangman(puzzle.word, setGuessesValue());
    definition.textContent = puzzle.definition;
    renderGame();
}

const refreshWord = () => {
    gameAttempts--;
    if(gameAttempts == -1) {
        game.status = 'Finished'
        hangmanFail.textContent = 'Nie możesz już resetować słowa';
        hangmanFail.style.display = 'block';
        gameAttempts = 0;
    }
    setGameAttempts();
    renderGame();
}

resetGame.addEventListener('click', function() {
    game.refreshWord();
    refreshWord();
});

newGame.addEventListener('click', function() {
    hangmanWin.style.display = 'none';
    hangmanFail.style.display = 'none';
    startGame();
    gameAttempts = 3;
    setGameAttempts();
});

setGameAttempts();
startGame();
