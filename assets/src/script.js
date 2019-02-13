
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