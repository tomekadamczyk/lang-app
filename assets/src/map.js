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


