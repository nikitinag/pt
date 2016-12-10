<? $this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'); ?>

<div id="main-content" class="main-content contact">
    <h3>Контактная информация</h3>
    <? foreach($text as $p=>$li): ?>
        <p>
        <?php 
            switch($p){
                case 'телефон-факс':
                    echo '<span class="glyphicon glyphicon-phone-alt gly"></span>';
                    break;
                case 'мобильный телефон':
                    echo '<span class="glyphicon glyphicon-phone gly"></span>';
                    break;
                case 'эл.почта':
                    echo '<span class="glyphicon glyphicon-envelope gly"></span>';
                    break;
                case 'адрес':
                    echo '<span class="glyphicon glyphicon-map-marker gly"></span>';
                    break;
            }
            echo '<span class="type">' . $p . ':</span>';
         ?>
         </p>
        <ul><?= $li ?></ul>
    <? endforeach ?>
    <!--Карта-->
    <section class="map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=l9tSKNQ6dXMc7ajZggsX93NXn8xcdAej&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
    </section>
</div>
