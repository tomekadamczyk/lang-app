
<?php 
require_once './modules/config.php';
require_once './modules/class.words.php';
$word = new Words($con);
require_once './modules/class.phrases.php';
$phrase = new Phrase($con);
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
            
        <div class="cz-modal-pick-option">
                    <label for="newWord">Nowe słowo</label>
                    <input type="radio" name="newWord" id="showWordForm" unchecked></div>

                <div class="cz-modal-pick-option">
                    <label for="newWord">Nowy zwrot</label>
                    <input type="radio" name="newWord" id="showPhraseForm" unchecked>
                </div>
                            
                      <?php
                          $word->generateWordForm();
                          $phrase->generatePhraseForm();
                          ?>
                      
                    
            <?php
                $word->insertWord();
            ?>
        </div>
      </div>
    </div>
  </div>
</div>
