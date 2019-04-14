
const showWordDefinition = () => {
    const words = document.querySelectorAll(".cz-datacontent-word");
    const definition = () => {
        words.forEach(element => {
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


searchWord();
showWordDefinition();
categoryDropdownFunction();
setScrolling(categoryList, 8);

// const wordRow = document.querySelectorAll(".cz-datacontent-word");
// const wordItems = wordRow.length;
// const page = new Pagination(wordItems, 1);
// page.displayItemsOnPage();
