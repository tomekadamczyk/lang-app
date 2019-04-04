let travelMap = {
    map: null,
    routingControl: null,
    layers: [],
    api: {
        token: 'pk.eyJ1IjoidG9tYXN6YWRhbWN6eWsiLCJhIjoiY2p0enpob2E2MG04bTQ0bWdvY2xqdm56biJ9.QZfbhG1D29xt11aN7twvUw'
    },
    osm: L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }),
    basemap: L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidG9tYXN6YWRhbWN6eWsiLCJhIjoiY2p0enpob2E2MG04bTQ0bWdvY2xqdm56biJ9.QZfbhG1D29xt11aN7twvUw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets'}),

    mapinit: function() {
        travelMap.map = L.map('mapid');
        travelMap.basemap.addTo(travelMap.map);
        travelMap.osm.addTo(travelMap.map);
    },

    control: function() {
        travelMap.routingControl = L.Routing.control({
            waypoints: [
              L.latLng(50.0567, 19.9422),
              L.latLng(50.0853, 14.4223)
            ],
            routeWhileDragging: true,
            geocoder: L.Control.Geocoder.mapbox(travelMap.api.token),
            router: L.routing.mapbox(travelMap.api.token),
            autocomplete: true
        }).addTo(travelMap.map);
        console.log(L.latLng(50.0567, 19.9422))
        //let service = 'https://api.mapbox.com/geocoding/v5/mapbox.places/11.746772804774764%2C55.10598087771291.json?access_token=pk.eyJ1IjoibWF0dGZpY2tlIiwiYSI6ImNqNnM2YmFoNzAwcTMzM214NTB1NHdwbnoifQ.Or19S7KmYPHW8YjRz82v6g&cachebuster=1554275594752&autocomplete=true&country=cz&types=country&bbox=11.746772804774793%2C48.1928942560119%2C25.049925760724335%2C55.10598087771291';
    }
}

travelMap.mapinit();
travelMap.control();



 travelMap.map.on('load', function() {
    travelMap.map.addSource('single-point', {
    "type": "geojson",
    "data": {
    "type": "FeatureCollection",
    "features": []
    }
    });
     
    travelMap.map.addLayer({
    "id": "point",
    "source": "single-point",
    "type": "circle",
    "paint": {
    "circle-radius": 10,
    "circle-color": "#007cbf"
    }
    });
     
    travelMap.routingControl.geocoder.on('result', function(ev) {
        travelMap.map.getSource('single-point').setData(ev.result.geometry);
    });
});

const createButton = (label, container) => {
    const btn = L.DomUtil.create('button', '', container);
    btn.setAttribute('type', 'button');
    btn.innerHTML = label;
    return btn;
}

travelMap.map.on('click', function(e) {
    const container = L.DomUtil.create('div'),
        startBtn = createButton('Start', container),
        destBtn = createButton('Kierunek', container);
        startBtn.classList.add('cz-map__start');
        destBtn.classList.add('cz-map__destination');


    L.popup()
        .setContent(container)
        .setLatLng(e.latlng)
        .openOn(travelMap.map);

        L.DomEvent.on(startBtn, 'click', function() {
            travelMap.routingControl.spliceWaypoints(0, 1, e.latlng);
            travelMap.map.closePopup();
        });
        
        L.DomEvent.on(destBtn, 'click', function() {
            travelMap.routingControl.spliceWaypoints(travelMap.routingControl.getWaypoints().length - 1, 1, e.latlng);
            travelMap.map.closePopup();
        });

        const currentWeather = async() => {
            const newWeather = await weather(e.latlng.lat, e.latlng.lng);
            return newWeather;
        }
        
        currentWeather();
});



const changePlacesModalView = () => {
    let newPlaceView = document.querySelector('#addPlaceView');
    let addNewPlace = document.querySelector('#addPlace');
    let myPlaces = document.querySelector('#myPlaces');
    let backtoView = document.querySelector('#backtoView');

    addNewPlace.addEventListener('click', function() {
        newPlaceView.style.display = 'block';
        myPlaces.style.display = 'none';
    })

    backtoView.addEventListener('click', function() {
        newPlaceView.style.display = 'none';
        myPlaces.style.display = 'block';
    })
}

const generateInput = () => {
    const placePoint = document.createElement('input');
    placePoint.classList.add('form-control');
    placePoint.classList.add('cz-travel__newPlaceInput');
    placePoint.setAttribute('type', 'text');
    placePoint.id = 'placePoint';
    placePoint.setAttribute('name', 'placePoint');
    placePoint.setAttribute('placeholder', 'Punkt zwiedzania');
    return placePoint;
}

const generatePlacesForm = () => {
    let travelInputs = document.querySelector('#travelInputs');
    const form = document.querySelector('#placeForm');
    const addNextPlace = document.querySelector('#addNextPlace');
    const savePoints = document.querySelector('#savePoints'); 

    addNextPlace.addEventListener('click', () => {
        travelInputs.appendChild(generateInput());
    })

    savePoints.addEventListener('click', () => {
        getPlacesInputData();
    })

    
}

let pointsArray = [];
const getPlacesInputData = () => {
    let placeInputs = document.querySelectorAll('.cz-travel__newPlaceInput');
    let pointsContainer = document.querySelector('#pointsContainer');
    pointsArray.length = 0;
    return placeInputs.forEach(item => {
        pointsArray.push(`<li>${item.value}</li>`);
        pointsContainer.value = pointsArray;
    })
}

const displayPlaces = async() => {
    let place = await showAllPlaces();
    const showPlaces = document.querySelector('#displayPlace');
    const displayPlacePoint = document.querySelector('#displayPlacePoint');
    place.forEach(item => {
        const name = document.createElement('span');
        const point = document.createElement('div');
        name.classList.add('travelname');
        name.classList.add('travelname' + item.id_travel);
        point.classList.add('travelnamepoint');
        point.classList.add('travelnamepoint' + item.id_travel);
        name.innerHTML = item.name;
        point.innerHTML = item.points;
        showPlaces.appendChild(name);
        displayPlacePoint.appendChild(point);
    })

    const placeNames = document.querySelectorAll('.travelname');
    const pointNames = document.querySelectorAll('.travelnamepoint');

    const displayPlacePoints = (id) => {
        placeNames.forEach(element => {
            if (element.classList.contains('travelname' + id)) {
                pointNames.forEach(item => {
                    item.classList.remove('active')
                    if (item.classList.contains('travelnamepoint' + id)) {
                        item.classList.add('active')
                    }
                })
            };
        })
    }
    const getPlaceId = () => {
        for (const item of placeNames) {
            item.onclick = function(e) {
                let className = e.target.classList[1];
                let id = className.replace(/^travelname/i, '');
                displayPlacePoints(id);
            }
        }
    }
    getPlaceId();
}




generatePlacesForm();
changePlacesModalView();
displayPlaces();