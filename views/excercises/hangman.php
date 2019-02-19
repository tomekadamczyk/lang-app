<section class="cz-hangman">
    <div class="container">
        <div class="cz-hangman__game">
            <div class="mx-auto translateBox">
                <h1 class="text-center">Wisielec</h1>
                <div class="row">
                    <div class="col-md-3">
                        <div class="cz-hangman__box cz-hangman__box--guesses">
                            <small>Wybierz ilość prób: </small>
                            <select name="" id="cz-hangman-set-guesses">
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="cz-hangman__box cz-hangman__box--reset">
                            <div class="btn btn-info btn-sm my-2 " id="cz-hangman-reset">Spróbuj jeszcze raz</div><br>
                            <small id="cz-reset-count"></small>
                        </div>
                        <div class="cz-hangman__box">
                            <div class="btn bg-success text-white btn-sm my-2 " id="cz-hangman-new">Losuj nowe słowo</div>
                        </div>
                            <div class="btn bg-dark text-white btn-sm my-2 cz-hangman-display-answer" id="cz-hangman-display-answer">Pokaż prawidłową odpowiedź</div>
                    </div>
                    <div class="col-md-9">
                        <div class="text-center">
                            <p id="cz-hangman-definition" class="cz-hangman__box cz-hangman__box--definition"></p>
                        </div>
                        <div id="cz-hangman-word" class="cz-hangman__box cz-hangman__box--word"></div>
                        <div id="cz-hangman-win" class="cz-hangman__box cz-hangman__box--win">Udało się!</div>
                        <div id="cz-hangman-fail" class="cz-hangman__box cz-hangman__box--fail">Nie udało się!</div>
                        <div id="cz-hangman-left-guesses" class="cz-hangman__box cz-hangman__box--left-guesses"></div>

                        <div class="cz-hangman-drawing">
                            <div id="hangman-fail-1" class="cz-hangman-drawing-line cz-hangman-drawing-line--base"></div>
                            <div id="hangman-fail-2" class="cz-hangman-drawing-line cz-hangman-drawing-line--column"></div>
                            <div id="hangman-fail-3" class="cz-hangman-drawing-line cz-hangman-drawing-line--top"></div>
                            <div id="hangman-fail-4" class="cz-hangman-drawing-line cz-hangman-drawing-line--rope"></div>
                            <div id="hangman-fail-5" class="cz-hangman-drawing-line cz-hangman-drawing-line--head"></div>
                            <div id="hangman-fail-6" class="cz-hangman-drawing-line cz-hangman-drawing-line--body"></div>
                            <div id="hangman-fail-7" class="cz-hangman-drawing-line cz-hangman-drawing-line--hand1"></div>
                            <div id="hangman-fail-8" class="cz-hangman-drawing-line cz-hangman-drawing-line--hand2"></div>
                            <div id="hangman-fail-9" class="cz-hangman-drawing-line cz-hangman-drawing-line--leg1"></div>
                            <div id="hangman-fail-10" class="cz-hangman-drawing-line cz-hangman-drawing-line--leg2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>