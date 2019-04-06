
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

export {showWord as default}