
<?php 
require_once './modules/class.words.php';
$word = new Words($con);
?>

<!-- Modal -->
<div class="modal fade cz-modal" id="addNewWord" tabindex="-1" role="dialog" aria-labelledby="addNewWordTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="addNewWordTitle">Dodaj nowe słówko</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="addWord">
            <form action="" method="POST">
              <div class="cz-modal-pick-option">
                <label for="newWord">Nowe słowo</label>
                <input type="radio" name="newWord" id="showWordForm" unchecked></div>
              <div class="cz-modal-pick-option">
                <label for="newWord">Nowy zwrot</label>
                <input type="radio" name="newWord" id="showPhraseForm" unchecked>
              </div>
                <div id="newWordForm">
                  <input type="text" class="form-control my-2" id="slowo" name="slowo" placeholder="Dodaj nowe słowo">
                  <input type="text" class="form-control my-2" id="tlumaczenie" name="tlumaczenie" placeholder="Wpisz tłumaczenie">
                  
                  <textarea class="form-control my-2" name="definicja" placeholder="Wpisz definicję"></textarea>
                  <div class="input-group mb-3 ta-subject-select">
                      <div class="input-group-prepend">
                          <label class="input-group-text ta-subject-select__label" for="inputGroupSelect01">Temat</label>
                      </div>
                      <select class="custom-select" name="temat" id="inputGroupSelect01">
                            
                      <?php
                      (isset($_POST['temat'])) ? $temat = $_POST['temat'] : $temat='default';
                      ?>
                          <option <?php if ($temat == 'default' ) echo 'selected' ; ?> value="default">Wybierz temat</option>
                          <option <?php if ($temat == 1 ) echo 'selected' ; ?> value="1">Podstawy</option>
                          <option <?php if ($temat == 2 ) echo 'selected' ; ?> value="2">Człowiek i rodzina</option>
                          <option <?php if ($temat == 3 ) echo 'selected' ; ?> value="3">Części ciała</option>
                          <option <?php if ($temat == 4 ) echo 'selected' ; ?> value="4">Cechy charakteru</option>
                          <option <?php if ($temat == 5 ) echo 'selected' ; ?> value="5">Opis osoby</option>
                          <option <?php if ($temat == 6 ) echo 'selected' ; ?> value="6">Kolory</option>
                          <option <?php if ($temat == 7 ) echo 'selected' ; ?> value="7">Części garderoby, biżuteria</option>
                          <option <?php if ($temat == 8 ) echo 'selected' ; ?> value="8">Sklep i zakupy</option>
                          <option <?php if ($temat == 9 ) echo 'selected' ; ?> value="9">Żywność, restauracja</option>
                          <option <?php if ($temat == 10 ) echo 'selected' ; ?> value="10">Komunikacja i podróże</option>
                          <option <?php if ($temat == 11 ) echo 'selected' ; ?> value="11">Wakacje, czas wolny</option>
                          <option <?php if ($temat == 12 ) echo 'selected' ; ?> value="12">Hobby, zainteresowania</option>
                          <option <?php if ($temat == 13 ) echo 'selected' ; ?> value="13">W mieście, pytania o drogę</option>
                          <option <?php if ($temat == 14 ) echo 'selected' ; ?> value="14">Dom</option>
                          <option <?php if ($temat == 15 ) echo 'selected' ; ?> value="15">Szkoła, nauka</option>
                          <option <?php if ($temat == 16 ) echo 'selected' ; ?> value="16">Wypadki, nagłe zdarzenia, pomoc</option>
                          <option <?php if ($temat == 17 ) echo 'selected' ; ?> value="17">Praca, zawody</option>
                          <option <?php if ($temat == 18 ) echo 'selected' ; ?> value="18">Przyroda, pogoda</option>
                          <option <?php if ($temat == 19 ) echo 'selected' ; ?> value="19">Losowe przymiotniki</option>
                          <option <?php if ($temat == 20 ) echo 'selected' ; ?> value="20">Inne</option>
                      </select>
                      </div>
                          <div class="input-group mb-3 ta-subject-select">
                              <div class="input-group-prepend">
                                  <label class="input-group-text ta-subject-select__label" for="inputGroupSelect02">Poziom</label>
                              </div>
                              <select class="custom-select" name="level" id="inputGroupSelect02">
                              <?php
                              (isset($_POST['level'])) ? $level = $_POST['level'] : $level='default';
                              ?>
                                  <option <?php if ($level == 'default' ) echo 'selected' ; ?> value="default">Wybierz poziom</option>
                                  <option <?php if ($level == 1 ) echo 'selected' ; ?> value="1">A</option>
                                  <option <?php if ($level == 2 ) echo 'selected' ; ?> value="2">B</option>
                                  <option <?php if ($level == 3 ) echo 'selected' ; ?> value="3">C</option>
                              </select>
                          </div>
                          <input type="submit" class="btn bg-primary text-white addNewWord" id="addWord" name="addWord" value="Dodaj nowe słowo">
                        </div>

                        <div id="newPhraseForm">
                          <input type="text" class="form-control my-2" id="phrase" name="phrase" placeholder="Dodaj nowy zwrot">
                          <input type="text" class="form-control my-2" id="phraseTranslate" name="phraseTranslate" placeholder="Wpisz tłumaczenie">
                          
                          <div class="input-group mb-3 ta-subject-select">
                              <div class="input-group-prepend">
                                  <label class="input-group-text ta-subject-select__label" for="inputGroupSelect01">Temat</label>
                              </div>
                              <select class="custom-select" name="temat" id="inputGroupSelect01">
                                    
                              <?php
                              (isset($_POST['temat'])) ? $temat = $_POST['temat'] : $temat='default';
                              ?>
                                  <option <?php if ($temat == 'default' ) echo 'selected' ; ?> value="default">Wybierz temat</option>
                                  <option <?php if ($temat == 1 ) echo 'selected' ; ?> value="1">Podstawy</option>
                                  <option <?php if ($temat == 2 ) echo 'selected' ; ?> value="2">Człowiek i rodzina</option>
                                  <option <?php if ($temat == 3 ) echo 'selected' ; ?> value="3">Części ciała</option>
                                  <option <?php if ($temat == 4 ) echo 'selected' ; ?> value="4">Cechy charakteru</option>
                                  <option <?php if ($temat == 5 ) echo 'selected' ; ?> value="5">Opis osoby</option>
                                  <option <?php if ($temat == 6 ) echo 'selected' ; ?> value="6">Kolory</option>
                                  <option <?php if ($temat == 7 ) echo 'selected' ; ?> value="7">Części garderoby, biżuteria</option>
                                  <option <?php if ($temat == 8 ) echo 'selected' ; ?> value="8">Sklep i zakupy</option>
                                  <option <?php if ($temat == 9 ) echo 'selected' ; ?> value="9">Żywność, restauracja</option>
                                  <option <?php if ($temat == 10 ) echo 'selected' ; ?> value="10">Komunikacja i podróże</option>
                                  <option <?php if ($temat == 11 ) echo 'selected' ; ?> value="11">Wakacje, czas wolny</option>
                                  <option <?php if ($temat == 12 ) echo 'selected' ; ?> value="12">Hobby, zainteresowania</option>
                                  <option <?php if ($temat == 13 ) echo 'selected' ; ?> value="13">W mieście, pytania o drogę</option>
                                  <option <?php if ($temat == 14 ) echo 'selected' ; ?> value="14">Dom</option>
                                  <option <?php if ($temat == 15 ) echo 'selected' ; ?> value="15">Szkoła, nauka</option>
                                  <option <?php if ($temat == 16 ) echo 'selected' ; ?> value="16">Wypadki, nagłe zdarzenia, pomoc</option>
                                  <option <?php if ($temat == 17 ) echo 'selected' ; ?> value="17">Praca, zawody</option>
                                  <option <?php if ($temat == 18 ) echo 'selected' ; ?> value="18">Przyroda, pogoda</option>
                                  <option <?php if ($temat == 19 ) echo 'selected' ; ?> value="19">Losowe przymiotniki</option>
                                  <option <?php if ($temat == 20 ) echo 'selected' ; ?> value="20">Inne</option>
                              </select>
                              </div>
                                  <div class="input-group mb-3 ta-subject-select">
                                      <div class="input-group-prepend">
                                          <label class="input-group-text ta-subject-select__label" for="inputGroupSelect02">Poziom</label>
                                      </div>
                                      <select class="custom-select" name="level" id="inputGroupSelect02">
                                      <?php
                                      (isset($_POST['level'])) ? $level = $_POST['level'] : $level='default';
                                      ?>
                                          <option <?php if ($level == 'default' ) echo 'selected' ; ?> value="default">Wybierz poziom</option>
                                          <option <?php if ($level == 1 ) echo 'selected' ; ?> value="1">A</option>
                                          <option <?php if ($level == 2 ) echo 'selected' ; ?> value="2">B</option>
                                          <option <?php if ($level == 3 ) echo 'selected' ; ?> value="3">C</option>
                                      </select>
                                  </div>
                                  <input type="submit" class="btn bg-primary text-white addNewWord" id="addPhrase" name="addPhrase" value="Dodaj nowy zwrot">
                              </div>
                    
                </form> 
                    
            <?php
                $word->insertWord();
            ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
?>