<?php
require_once './modules/config.php';
require_once './modules/class.travel.php';
$travel = new Travel($con);
$travel->resetTravelIncrement();


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
                    <div class="align-self-center">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#showPlaces">Moje miejsca</button>
                    </div>
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
                            <div class="cz-travel__place-name" id="displayPlace">

                            </div>
                            <div class="cz-travel__place-point" id="displayPlacePoint">

                            </div>
                            <?php $travel->deletePlace(); ?>
                        </div>
                    </div>
                    <div class="cz-travel__addPlace" id="addPlaceView">
                        <div class="cz-travel__addPlaceForm" id="addPlaceForm">
                            <form method="POST" action="" id="placeForm">
                                <div class="row">
                                    <div class="col-sm-7" id="travelInputs">
                                        <input class="form-control" type="text" id="placeName" name="placeName" placeholder="Nazwa miejsca">
                                        <textarea id="pointsContainer" class="cz-travel__newPlacesContainer" name="pointsContainer"></textarea>
                                    </div>
                                    <div class="col-sm-5">
                                        <span id="addNextPlace" class="btn btn-primary cz-travel__btn">Dodaj punkt zwiedzania</span>
                                        <span id="savePoints" class="btn btn-success cz-travel__btn">Zatwierdź</span>
                                        <input name="saveNewPlace" id="saveNewPlace" type="submit" value="Zapisz" class="btn btn-success cz-travel__btn">
                                        <?php $travel->insertPlace(); ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <small>Przed zapisem punktów podróży należy wcisnąć przycisk 'Zatwierdź'</small><br>
                        <hr>
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