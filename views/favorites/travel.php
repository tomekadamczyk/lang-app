<?php
require_once './modules/config.php';
require_once './modules/class.words.php';
require_once './modules/class.categories.php';
$category = new Categories($con);
$word = new Words($con);
$word->resetWordIncrement();

?>
<section class="cz-travel">
    <div class="cz-travel__content">
        <div class="row">
            <div class="col-md-12">
                <div class="cz-datacontent-header">
                    <h1><strong>Podróże</strong></h1>
                </div>
                <div id="worldMap"></div>
            </div>
        </div>
    </div>
</section>

<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script src="assets/map/js/leaflet-src.js"></script>
<script>
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(worldMap);
    </script>