let mymap = L.map('mapid').setView([51.505, -0.09], 13);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoidG9tYXN6YWRhbWN6eWsiLCJhIjoiY2p0enpob2E2MG04bTQ0bWdvY2xqdm56biJ9.QZfbhG1D29xt11aN7twvUw'
}).addTo(mymap);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);

let routingControl = L.Routing.control({
    waypoints: [
      L.latLng(50.0567, 19.9422),
      L.latLng(50.0853, 14.4223)
    ],
    routeWhileDragging: true,
    geocoder: L.Control.Geocoder.nominatim()
}).addTo(mymap);

const createButton = (label, container) => {
    const btn = L.DomUtil.create('button', '', container);
    btn.setAttribute('type', 'button');
    btn.innerHTML = label;
    return btn;
}

mymap.on('click', function(e) {
    const container = L.DomUtil.create('div'),
        startBtn = createButton('Start', container),
        destBtn = createButton('Kierunek', container);
        startBtn.classList.add('cz-map__start');
        destBtn.classList.add('cz-map__destination');


    L.popup()
        .setContent(container)
        .setLatLng(e.latlng)
        .openOn(mymap);

        L.DomEvent.on(startBtn, 'click', function() {
            routingControl.spliceWaypoints(0, 1, e.latlng);
            mymap.closePopup();
        });
        
        L.DomEvent.on(destBtn, 'click', function() {
            routingControl.spliceWaypoints(routingControl.getWaypoints().length - 1, 1, e.latlng);
            mymap.closePopup();
        });
});

