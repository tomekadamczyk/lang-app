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
    const word = document.querySelectorAll(".cz-datacontent-word");
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
    const wordRow = document.querySelectorAll(".cz-datacontent-word");
    const search = document.getElementById("cz-datacontent-search-word");
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

let getMobileMenu = document.getElementById('getMobileMenu');
let mobileMenu = document.getElementById('mobileMenu');

const showMobileMenu = (element, clicker) => {
    let click = 0;
    clicker.addEventListener('click', function() {
        element.style.display = 'block';
        clicker.classList.add('active');
        click++;
        
        if(click === 2) {
            element.style.display = 'none';
            clicker.classList.remove('active');
            click = 0;
        }
    });
}


showMobileMenu(mobileMenu, getMobileMenu);

let menuDropdown = document.querySelectorAll('.cz-menubar-mainmenu-link-dropdown');
let categoryDropdown = document.querySelectorAll('.toggleDropdown');
let click = 0;
const showDropdown = (list) => {
    list.forEach(item => {
        item.addEventListener('click', function() {
            item.classList.add('active');
            click++;
            if (click === 2) {
                item.classList.remove('active');
                click = 0;
            }
        })
    })
}

showDropdown(menuDropdown);
showDropdown(categoryDropdown);

searchWord();


const categoryList = document.getElementById('categoryList');

const setScrolling = (el, elements) => {
    if(el.childElementCount > elements) {
        return el.classList.add('cz-categories__container-list--scroll');
    }
}

setScrolling(categoryList, 8);

// const wordRow = document.querySelectorAll(".cz-datacontent-word");
// const wordItems = wordRow.length;
// const page = new Pagination(wordItems, 1);
// page.displayItemsOnPage();
