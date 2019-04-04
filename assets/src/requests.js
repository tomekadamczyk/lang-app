'use strict'

const showWord = async() => {
    const response = await fetch('./api/words/random.php');
    if (response.status === 200) {
        const data = await response.json();
        return data[0];
    }   
    else {
        throw new Error('Błąd w pobieraniu danych');
    }
}

const showAllWords = async() => {
    const response = await fetch('./api/words/all.php');
    if (response.status === 200) {
        const data = await response.json();
        return data;
    }   
    else {
        throw new Error('Błąd w pobieraniu danych');
    }
}

const getCategories = async() => {
    const response = await fetch('./api/categories/categories.php');
    if (response.status === 200) {
        const data = await response.json();
        return data;
    }   
    else {
        throw new Error('Błąd w pobieraniu danych');
    }
}

const showAllPlaces = async() => {
    const response = await fetch('./api/travel/travelplaces.php');
    if (response.status === 200) {
        const data = await response.json();
        return data;
    }   
    else {
        throw new Error('Błąd w pobieraniu danych');
    }
}
