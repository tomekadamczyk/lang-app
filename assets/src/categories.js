'use strict'


const getCategory = async() => {
    let category = await getCategories();
    return category;
}

const showAll = async() => {
    let all = await showAllWords();
        return all;
}

Promise.all([getCategory(), showAll()]).then((valArray) => {
    const category = valArray[0];
    const word = valArray[1];
    //console.log(category);
    const checkbox = document.querySelectorAll('.cz-categories-check');
    const wordDiv = document.querySelectorAll(".cz-dictionary-word");
    
    const addClassToCheckbox = (topic) => {
        checkbox.forEach(input => {
            if (input.classList.contains('check-word-' + topic)) {
                wordDiv.forEach(item => {
                    if (item.classList.contains('cz-dictionary-item-' + topic)) {
                        item.classList.add('hideWord');
                    }
                })
            };
        })
    }

    const removeClassToCheckbox = (topic) => {
        checkbox.forEach(input => {
            if (input.classList.contains('check-word-' + topic)) {
                wordDiv.forEach(item => {
                    if (item.classList.contains('cz-dictionary-item-' + topic) && item.classList.contains('hideWord')) {
                        item.classList.remove('hideWord');
                    }
                })
            };
        })
    }
    
    const getCategoryValue = () => {
        for (const item of checkbox) {
            item.onchange = function(e) {
                if(e.target.checked == false) {
                    addClassToCheckbox(e.target.value);
                }
                if(e.target.checked == true) {
                    removeClassToCheckbox(e.target.value);
                }
            }
        }
    }
    getCategoryValue()
})

// getCategory().then((result) => {
//     result.forEach(topic => {
//         console.log(topic);
//         return Promise.all([prom, otherValue]);
//     })
// }).then(
// showAll().then((result) => {
//     result.forEach(word => {
//         console.log(word)
//     })
// }))

//getWordFromCategory();

// const checkbox = document.querySelectorAll('.cz-categories-check');
// console.log(checkbox);

