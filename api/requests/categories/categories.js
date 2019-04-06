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

export {getCategories as default}