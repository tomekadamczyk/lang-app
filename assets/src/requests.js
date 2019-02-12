const showWord = async() => {
    const response = fetch('http://localhost:3000/www/appcz/lang-app/modules/ajax/words.php');
    if (response.status === 200) {
        const data = await response.json();
        console.log(data);
    }   
    else {
        throw new Error('Błąd w pobieraniu danych');
    }
}

console.log(showWord());