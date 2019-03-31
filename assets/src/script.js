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







const showMobileMenu = () => {
let getMobileMenu = document.getElementById('getMobileMenu');
let mobileMenu = document.getElementById('mobileMenu');
    const showMenu = (element, clicker) => {
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
    return showMenu(mobileMenu, getMobileMenu);
}



const showWordDefinition = () => {
    const word = document.querySelectorAll(".cz-datacontent-word");

    const definition = () => {
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

    return definition();
}
const categoryDropdownFunction = () => {
    
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

    return showDropdown(categoryDropdown);

}



const searchWord = () => {
    const wordRow = document.querySelectorAll(".cz-datacontent-word");
    const search = document.getElementById("cz-datacontent-search-word");
    const inputEvent = () => {
        search.addEventListener('input', function(e) {
            wordRow.forEach(word => {
                word.style.display = 'none';
                let wordContent = word.children[0].textContent;
                if(wordContent.toLowerCase().includes(e.target.value)) {
                    word.style.display = 'block';
                }
            })
        })
    }
    return inputEvent();

}




const categoryList = document.getElementById('categoryList');

const setScrolling = (el, elements) => {
    if(el.childElementCount > elements) {
        return el.classList.add('cz-categories__container-list--scroll');
    }
}


showMobileMenu();
searchWord();
toggleAddingForms();
showWordDefinition();
categoryDropdownFunction();
setScrolling(categoryList, 8);

// const wordRow = document.querySelectorAll(".cz-datacontent-word");
// const wordItems = wordRow.length;
// const page = new Pagination(wordItems, 1);
// page.displayItemsOnPage();

// var worldMap = L.map('worldMap').setView([51.505, -0.09], 13);

// L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
//         attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
//     }).addTo(worldMap);
    