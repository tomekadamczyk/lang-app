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
                    </div>
                    <div class="col-md-9">
                        <div class="text-center">
                            <p id="cz-hangman-definition" class="cz-hangman__box cz-hangman__box--definition"></p>
                        </div>
                        <div id="cz-hangman-word" class="cz-hangman__box cz-hangman__box--word"></div>
                        <div id="cz-hangman-win" class="cz-hangman__box cz-hangman__box--win">Udało się!</div>
                        <div id="cz-hangman-fail" class="cz-hangman__box cz-hangman__box--fail">Nie udało się!</div>
                        <div id="cz-hangman-left-guesses" class="cz-hangman__box cz-hangman__box--left-guesses"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>