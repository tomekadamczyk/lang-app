<div class="cz-dashboard">
    <?php
        include('menubar.php');
        require_once './modules/class.words.php';
        $word = new Words($con);

    ?>
    <div class="cz-dashboard__panels">
        <div class="row">
            <div class="col-md-4 cz-dashboard__item">
                <div class="cz-module">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit at eaque dolorum placeat nostrum obcaecati doloribus recusandae aut eligendi porro voluptates adipisci incidunt aspernatur consequatur vel consectetur fugit, tempore esse laboriosam nam veniam! Nisi voluptatum molestiae quasi hic tempore saepe voluptate odio accusamus magnam exercitationem consequuntur sunt assumenda, nam quisquam!
                </div>
            </div>
            <div class="col-md-4 cz-dashboard__item">
                <div class="cz-module">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit at eaque dolorum placeat nostrum obcaecati doloribus recusandae aut eligendi porro voluptates adipisci incidunt aspernatur consequatur vel consectetur fugit, tempore esse laboriosam nam veniam! Nisi voluptatum molestiae quasi hic tempore saepe voluptate odio accusamus magnam exercitationem consequuntur sunt assumenda, nam quisquam!
                </div>
            </div>
            <div class="col-md-4 cz-dashboard__item">
                <div class="cz-module">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit at eaque dolorum placeat nostrum obcaecati doloribus recusandae aut eligendi porro voluptates adipisci incidunt aspernatur consequatur vel consectetur fugit, tempore esse laboriosam nam veniam! Nisi voluptatum molestiae quasi hic tempore saepe voluptate odio accusamus magnam exercitationem consequuntur sunt assumenda, nam quisquam!
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 cz-dashboard__item">
                <div class="cz-module">
                    <div class="cz-module__last-added-words">
                        <?php
                            $word->displayLastAddedWords();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>