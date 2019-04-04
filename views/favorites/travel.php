<?php
require_once './modules/config.php';
require_once './modules/class.words.php';
require_once './modules/class.categories.php';
$category = new Categories($con);
$word = new Words($con);
$word->resetWordIncrement();


?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v3.1.6/mapbox-gl-geocoder.css' type='text/css' />

<section class="cz-travel">
    <div class="cz-travel__content">
        <div class="row">
            <div class="col-md-12 cz-map">
                <div class="cz-map__header">
                    <div class="cz-datacontent-header">
                        <h1><strong>Podróże</strong></h1>
                    </div>
                    <div><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showPlaces">Dodaj cel podróży</button></div>
                </div>
                <div id="mapid">
                    <div class="cz-map__weather" id="weather"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showPlaces" tabindex="-1" role="dialog" aria-labelledby="showPlacesTitle" aria-hidden="true">
        <div class="modal-dialog cz-travel__modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showPlacesTitle">Moje miejsca</h5>
                    <button id="addPlace" class="btn btn-sm btn-secondary ml-2">Dodaj</button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cz-travel__myPlaces" id="myPlaces">
                        <div class="row">
                            <div class="col-md-3">
                                <span>Miejsce</span>
                            </div>
                            <div class="col-md-9">
                                <div>
                                    opis
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cz-travel__addPlace" id="addPlaceView">
                        <div class="cz-travel__addPlaceForm" id="addPlaceForm">
                        </div>
                        <button id="backtoView" class="btn btn-sm btn-secondary ml-2">Powrót</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</section>


<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v3.1.6/mapbox-gl-geocoder.min.js'></script>
<script src="assets/src/weather.js"></script>
<script src="assets/src/map.js"></script>
<script>
$(document).ready(function() {
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
})
</script>