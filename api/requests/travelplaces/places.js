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

export {showAllPlaces as default}