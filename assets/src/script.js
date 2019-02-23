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




const showDefinition = () => {
    const word = document.querySelectorAll(".cz-dictionary-word");
    word.forEach(element => {
        let click = false;
        element.addEventListener('click', function() {
            element.lastElementChild.style.opacity = '1';
            element.lastElementChild.style.transform = 'translateX(0%)';
            element.lastElementChild.style.zIndex = '99999';
            click = !click;
            if(!click) {
                element.lastElementChild.style.opacity = '0';
                element.lastElementChild.style.transform = 'translateX(10%)';
                element.lastElementChild.style.zIndex = '-1';
            }
        })
    });
}

showDefinition();

const searchWord = () => {
    const wordRow = document.querySelectorAll(".cz-dictionary-word");
    const search = document.getElementById("cz-dictionary-search-word");
    search.addEventListener('input', function(e) {
        wordRow.forEach(word => {
            word.style.display = 'none';
            let wordContent = word.children[0].textContent;
            if(wordContent.toLowerCase().includes(e.target.value)) {
                console.log(wordContent);
                word.style.display = 'block';
            }
        })
    })

}

searchWord();

const categoryList = document.getElementById('categoryList');

const setScrolling = (el, elements) => {
    if(el.childElementCount > elements) {
        return el.classList.add('cz-categories__container-list--scroll');
    }
}

setScrolling(categoryList, 8);


// const wordRow = document.querySelectorAll(".cz-dictionary-word");
// const wordItems = wordRow.length;
// const page = new Pagination(wordItems, 1);
// page.displayItemsOnPage();
