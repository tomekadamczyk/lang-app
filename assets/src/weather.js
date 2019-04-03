const getWeather = async(lat, lon) => {
    const response = await fetch(`http://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&lang=pl&APPID=a22810cb3d31368b80b58499e952408b`);
    if (response.status === 200) {
        const data = await response.json();
        return data;
    }   
    else {
        throw new Error('Błąd w pobieraniu danych');
    }
}

const weather = async(lat, lon) => {
    const point = await getWeather(lat, lon);
    const name = point.name;
    const temp = point.main.temp - 273.15;
    const roundedTemp = Math.round(temp * 100) / 100;
    const humidity = `Wilgotność: ${point.main.humidity}%`;
    const pressure = `Ciśnienie: ${point.main.pressure}hPa`;
    const result = `${name}, ${roundedTemp} °C`;
    const sky = point.weather[0].description;
    const weatherContainer = document.querySelector('#weather');

    const weatherData = [result, sky, humidity, pressure];
    const container = document.createElement('div');
    weatherContainer.innerHTML = '';
    container.classList.add('cz-map__weather-info');

    weatherData.forEach(element => {
        let div = document.createElement('div');
        div.classList.add('cz-map__weather-element')
        div.textContent = element;
        container.appendChild(div)
        weatherContainer.appendChild(container)
    });
    return weatherContainer;
}


