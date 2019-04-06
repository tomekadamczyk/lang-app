'use strict'

import showWord from '../../../api/requests/randomWord/randomword.js';

let guessesLeft = document.querySelector('#cz-hangman-left-guesses');
let wordToGuess = document.querySelector('#cz-hangman-word');
let hangmanWin = document.querySelector('#cz-hangman-win');
let hangmanFail = document.querySelector('#cz-hangman-fail');
let resetGame = document.querySelector('#cz-hangman-reset');
let definition = document.querySelector('#cz-hangman-definition');
let setGuesses = document.querySelector('#cz-hangman-set-guesses');
let newGame = document.querySelector('#cz-hangman-new');
let resetCount = document.querySelector('#cz-reset-count');
let fail1 = document.querySelector('#hangman-fail-1');
let fail2 = document.querySelector('#hangman-fail-2');
let fail3 = document.querySelector('#hangman-fail-3');
let fail4 = document.querySelector('#hangman-fail-4');
let fail5 = document.querySelector('#hangman-fail-5');
let fail6 = document.querySelector('#hangman-fail-6');
let fail7 = document.querySelector('#hangman-fail-7');
let fail8 = document.querySelector('#hangman-fail-8');
let fail9 = document.querySelector('#hangman-fail-9');
let fail10 = document.querySelector('#hangman-fail-10');
let displayAnswer = document.querySelector('#cz-hangman-display-answer');
let typeHangmanWord = document.querySelector('#typeHangmanWord');
const alphabet = ['á', 'č', 'ď', 'é', 'ě', 'í', 'ň', 'ó', 'ř', 'š', 'ť', 'ú', 'ů', 'ý', 'ž', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',];

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
            if(setGuesses.value == 10) {
                if(this.guesses === 9) {
                    fail1.style.display = 'block';
                }
                if(this.guesses === 8) {
                    fail2.style.display = 'block';
                }
                if(this.guesses === 7) {
                    fail3.style.display = 'block';
                }
                if(this.guesses === 6) {
                    fail4.style.display = 'block';
                }
                if(this.guesses === 5) {
                    fail5.style.display = 'block';
                }
                if(this.guesses === 4) {
                    fail6.style.display = 'block';
                }
                if(this.guesses === 3) {
                    fail7.style.display = 'block';
                }
                if(this.guesses === 2) {
                    fail8.style.display = 'block';
                }
                if(this.guesses === 1) {
                    fail9.style.display = 'block';
                }
                if(this.guesses === 0) {
                    fail10.style.display = 'block';
                }
            }
            else if(setGuesses.value == 7) {
                if(this.guesses === 6) {
                    fail1.style.display = 'block';
                    fail2.style.display = 'block';
                }
                if(this.guesses === 5) {
                    fail3.style.display = 'block';
                    fail4.style.display = 'block';
                }
                if(this.guesses === 4) {
                    fail5.style.display = 'block';
                    fail6.style.display = 'block';
                }
                if(this.guesses === 3) {
                    fail7.style.display = 'block';
                }
                if(this.guesses === 2) {
                    fail8.style.display = 'block';
                }
                if(this.guesses === 1) {
                    fail9.style.display = 'block';
                }
                if(this.guesses === 0) {
                    fail10.style.display = 'block';
                }
            }
            else if(setGuesses.value == 5) {
                if(this.guesses === 4) {
                    fail1.style.display = 'block';
                    fail2.style.display = 'block';
                    fail3.style.display = 'block';
                }
                if(this.guesses === 3) {
                    fail4.style.display = 'block';
                    fail5.style.display = 'block';
                }
                if(this.guesses === 2) {
                    fail6.style.display = 'block';
                    fail7.style.display = 'block';
                }
                if(this.guesses === 1) {
                    fail8.style.display = 'block';
                    fail9.style.display = 'block';
                }
                if(this.guesses === 0) {
                    fail10.style.display = 'block';
                }
            }
            else if(setGuesses.value == 3) {
                if(this.guesses === 2) {
                    fail1.style.display = 'block';
                    fail2.style.display = 'block';
                    fail3.style.display = 'block';
                    fail4.style.display = 'block';
                }
                if(this.guesses === 1) {
                    fail5.style.display = 'block';
                    fail6.style.display = 'block';
                    fail7.style.display = 'block';
                }
                if(this.guesses === 0) {
                    fail8.style.display = 'block';
                    fail9.style.display = 'block';
                    fail10.style.display = 'block';
                }
            }
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
            displayAnswer.style.display = 'block';
            this.status = 'Failed';
        }
    }
    
}

let game;
let gameAttempts = 3;
console.log(alphabet)
const alphabetButtons = () => {
    let letterButtons = document.querySelector('#letterButtons');
    let letters = document.createElement('ul');
    
    alphabet.forEach(item => {
        letters.id = 'alphabet';
        let list = document.createElement('li');
        let btn = document.createElement('button');
        list.classList.add('letter');
        btn.innerHTML = item;
        list.appendChild(btn);
        letterButtons.appendChild(letters);
        letters.appendChild(list)
    })
    let lettersClickers = document.querySelectorAll('.letter');
    lettersClickers.forEach(button => {
        button.addEventListener('click', function(e) {
            let guess = e.target.textContent;
            wordToGuess.textContent = game.makeGuess(guess);
            renderGame();
            
            if(game.status === 'Finished') {
                setTimeout(function() {
                    startGame();
                    gameAttempts = 3;
                    setGameAttempts();
                },3000);
                    
            }
        })
    })
} 

window.addEventListener('keypress', function(e) {
    let guess = String.fromCharCode(e.charCode);
    wordToGuess.textContent = game.makeGuess(guess);
    renderGame();
    
    if(game.status === 'Finished') {
        setTimeout(function() {
            startGame();
            gameAttempts = 3;
            setGameAttempts();
        },3000);
            
    }
})

const renderGame = () => {
    wordToGuess.textContent = game.getWord();
    
}

const setGuessesValue = () => {
    return setGuesses.value;
}

const setGameAttempts = () => {
    resetCount.textContent = 'Możesz resetować słowo jeszcze ' + gameAttempts + ' razy';
    return gameAttempts;
}

const hideHangingMan = () => {
    fail1.style.display = 'none';
    fail2.style.display = 'none';
    fail3.style.display = 'none';
    fail4.style.display = 'none';
    fail5.style.display = 'none';
    fail6.style.display = 'none';
    fail7.style.display = 'none';
    fail8.style.display = 'none';
    fail9.style.display = 'none';
    fail10.style.display = 'none';
}

const startGame = async() => {
    let puzzle = await showWord();
    game = new Hangman(puzzle.word, setGuessesValue());
    definition.textContent = puzzle.definition;
    renderGame();
    hideHangingMan();
    
    displayAnswer.addEventListener('click', function() {
        if(game.guesses === 0) {
            wordToGuess.textContent = puzzle.word;
        }
    })
    displayAnswer.style.display = 'none';
    hangmanWin.style.display = 'none';
    hangmanFail.style.display = 'none';
    
}

const refreshWord = () => {
    gameAttempts--;
    if(gameAttempts == -1) {
        game.status = 'Finished';
        hangmanFail.textContent = 'Nie możesz już resetować słowa';
        hangmanFail.style.display = 'block';
        gameAttempts = 0;
    }
    displayAnswer.style.display = 'block';
    hideHangingMan();
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

alphabetButtons();