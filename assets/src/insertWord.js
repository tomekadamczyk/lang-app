const toggleAddingForms = () => {
    let newPhraseForm = document.getElementById('newPhraseForm');
    let newWordForm = document.getElementById('newWordForm');
    let showPhraseForm = document.getElementById('showPhraseForm');
    let showWordForm = document.getElementById('showWordForm');

    showPhraseForm.addEventListener('click', function() {
        newPhraseForm.style.display = 'block';
        newWordForm.style.display = 'none';
    })

    showWordForm.addEventListener('click', function() {
        newPhraseForm.style.display = 'none';
        newWordForm.style.display = 'block';
    })
}

toggleAddingForms();