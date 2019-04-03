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

    displayItemsOnPage(pageIndex) {
        let wordContainer = document.getElementById('dictionary');
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
const setPagination = () => {
    page.displayItemsOnPage();
}
