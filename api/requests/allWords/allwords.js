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

export {showAllWords as default};