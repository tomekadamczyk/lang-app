
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

// const searchWord = () => {
//     const wordRow = document.querySelectorAll(".cz-dictionary-word");
//     const search = document.getElementById("cz-dictionary-search-word");
//     search.addEventListener('input', function(e) {
//         wordRow.forEach(word => {
//             word.style.display = 'none';
//             let wordContent = word.children[0].textContent;
//             if(wordContent.toLowerCase().includes(e.target.value)) {
//                 console.log(wordContent);
//                 word.style.display = 'block';
//             }
//         })
//     })
    
// }

// searchWord();

class Pagination{
    constructor(totalItems, currentPage) {
        this.totalItems = totalItems;
        this.currentPage = currentPage;
    }

    getTotalPages() {
        let totalPages = Math.ceil(this.totalItems/this.setPageSize(this.size));
        return totalPages;
    }

    setPageSize(size) {
        this.size = size;
        return size;
    }

    getItems() {
        const wordRow = document.querySelectorAll(".cz-dictionary-word");
        // console.log(`We have ${this.setPageSize(20)} words per page`);
        // console.log(`We have ${this.getTotalPages()} pages of words`);
        // console.log(`We have ${wordRow.length} words in dictionary`);
        // console.log(wordRow);
    }

    putItemsIntoPage() {
        let pages = [

        ];
        let searchResults = document.getElementById('searchResults');
        let searchWordButton = document.querySelector('#searchWordButton');
        const wordRow = document.querySelectorAll(".cz-dictionary-word");
        const wordsArray = Array.from(wordRow);

        let pageArray,
        limiter = 20;
        for (let i = 0; i < wordsArray.length; i = i + limiter) {
            pageArray = wordsArray.slice(i,i+limiter);
            pages.push(pageArray);
        }
        
        const search = document.getElementById("cz-dictionary-search-word");
        console.log(search)
        searchResults.innerHTML = '';
        searchWordButton.addEventListener('click', function() {
            searchResults.innerHTML = '';
            wordRow.forEach(word => {
                 let wordContent = word.children[0].textContent;
                    let wordCopy = word;
                    if(wordContent.toLowerCase().includes(search.value)) {
                        searchResults.appendChild(wordCopy)
                    }
                })
        });

    return pages;
    }
    // searchWord() {
    //     const search = document.getElementById("cz-dictionary-search-word");
    //     let pages = this.putItemsIntoPage();
    //     console.log(pages)
    //     search.addEventListener('input', function(e) {
    //         pages.forEach(words => {
    //             words.forEach(word => {
                   
    //             word.style.display = 'none';
    //             let wordContent = word.children[0].textContent;
    //             if(wordContent.toLowerCase().includes(e.target.value)) {
    //                 word.style.display = 'block';
    //             }
    //         })
    //     })
    // }

    // searchWord() {
    //     console.log(this.putItemsIntoPage());
    //     const search = document.getElementById("cz-dictionary-search-word");
    //     search.addEventListener('input', function(e) {
    //         word.forEach(word => {
    //             word.style.display = 'none';
    //             let wordContent = word.children[0].textContent;
    //             if(wordContent.toLowerCase().includes(e.target.value)) {
    //                 word.style.display = 'block';
    //             }
    //         })
    //     })
    // }
    

    displayItemsOnPage(pageIndex) {
        let wordContainer = document.getElementById('cz-dictionary-table__content');
        let pages = this.putItemsIntoPage();
        wordContainer.innerHTML = '';
        pageIndex = 0;
        pages[pageIndex].forEach(el => {
            wordContainer.appendChild(el.attributes[0].ownerElement);
        }); 

        let nextPage = document.getElementById('nextPage');
        nextPage.addEventListener('click', function() { 
            let previousPage = pageIndex;
            pages[previousPage].forEach(el => {
                wordContainer.removeChild(el.attributes[0].ownerElement);
            }); 
            pageIndex++;
            if(pageIndex >= pages.length-1) {
                pageIndex = pages.length-1;
            }
            pages[pageIndex].forEach(el => {
                wordContainer.appendChild(el.attributes[0].ownerElement);
            }); 
        }); 

        let prevPage = document.getElementById('prevPage');
        prevPage.addEventListener('click', function() {
            let forwardPage = pageIndex;
            pages[forwardPage].forEach(el => {
                wordContainer.removeChild(el.attributes[0].ownerElement);
            }); 
            pageIndex--;
            if (pageIndex <= 0) {
                pageIndex = 0;
            }
            pages[pageIndex].forEach(el => {
                wordContainer.appendChild(el.attributes[0].ownerElement);
            }); 
        })
    }
}

const wordRow = document.querySelectorAll(".cz-dictionary-word");
const wordItems = wordRow.length;
const page = new Pagination(wordItems, 1);
page.displayItemsOnPage();