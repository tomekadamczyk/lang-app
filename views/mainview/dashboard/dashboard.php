<div class="cz-dashboard">
    <?php
        require_once './modules/class.words.php';
        require_once './modules/class.phrases.php';
        $word = new Words($con);
        $phrase = new Phrase($con);

    ?>
    <div class="cz-dashboard__panels">
        <div class="row">
            <div class="col-md-4 cz-dashboard__item">
                <div class="cz-module">
                    <p>Punkty z ostatniego testu</p>
                    <svg viewBox="0 0 36 36" class="circular-chart">
                        <path id="circlePoints" class="circle"
                            d="M18 2.0845
                            a 15.9155 15.9155 0 0 1 0 31.831
                            a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none"
                            stroke="#444";
                            stroke-width="1";
                            stroke-dasharray="70,100";
                        />
                        <text id="lastWordTestPoints" x="50%" y="50%" text-anchor="middle" stroke="#51c5cf" stroke-width="2px" dy=".3em"></text>
                    </svg>    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 cz-dashboard__item">
                <div class="cz-module">
                    <p>Ostatnio dodane słowa</p>
                    <div class="cz-module__last-added-words">
                        <?php
                            $word->displayLastAddedWords();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 cz-dashboard__item">
                <div class="cz-module">
                    <p>Ostatnio dodane zwroty</p>
                    <div class="cz-module__last-added-words">
                        <?php
                            $phrase->displayLastAddedPhrases();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

const setPointOnDashboard = () => {
    const data = localStorage.getItem('lastWordTestPoints');
    const pointsContainer = document.getElementById('lastWordTestPoints');
    pointsContainer.textContent = data;
    const circlePoints = document.getElementById('circlePoints');
    const pointsPercentage = (data*100)/10;
    circlePoints.setAttribute('stroke-dasharray', pointsPercentage + ',100');
    console.log(circlePoints.getAttribute('stroke-dasharray'))
}

setPointOnDashboard();
</script>