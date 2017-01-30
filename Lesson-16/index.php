<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'autoloader.php';
$geo = new YandexGeo();
error_reporting(E_CORE_ERROR);
?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <title>Yandex Geo</title>
    </head>
    <body>
        <div class="container">
            <h1>Поиск на карте</h1>
            <form method="get" class="form-inline">
                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input name="address" class="form-control" id="address" placeholder="Введите адрес для поиска">
                    <button type="submit" class="btn btn-info">Найти</button>
                </div>
            </form>
            <div class="row">
                <div class="col-md-6">
                    <?php if (isset($_GET['address'])) :
                        $address = htmlspecialchars($_GET['address']);
                        $collection = $geo->searchLocation($address); ?>

                        <?php if (!empty($collection)) : ?>
                            <script src="//api-maps.yandex.ru/2.0/?load=package.standard,package.geoObjects&lang=ru-RU" type="text/javascript"></script>
                                <script>
                                    <?php $geo->userSelection(); ?>
                                    ymaps.ready(init);
                                    var latitude = <?php echo $latitude = $collection[$geo->getSelector()]->getLatitude(); ?>;
                                    var longitude = <?php echo $longitude = $collection[$geo->getSelector()]->getLongitude(); ?>;
                                    function init () {
                                        var myMap = new ymaps.Map("map", {
                                                center: [latitude, longitude],
                                                zoom: 10
                                            }),

                                            myGeoObject = new ymaps.GeoObject({
                                                geometry: {
                                                    type: "Point",
                                                    coordinates: [latitude, longitude]
                                                },
                                                properties: {
                                                    iconContent: `${latitude}, ${longitude}`
                                                }
                                            }, {
                                                preset: 'twirl#redStretchyIcon',
                                                draggable: false
                                            });

                                        myMap.geoObjects
                                            .add(myGeoObject);
                                    }
                                </script>

                            <div id="map" class="map"></div>
                        </div>
                        <div class="col-md-6">

                            <h4><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Найденные адреса:</h4>
                            <ul>
                                <?php $i = 0; foreach ($collection as $item) :?>
                                    <li>
                                        <?php echo $item->getAddress(); ?> -
                                        <?php echo $item->getLatitude() . ', ' . $item->getLongitude();
                                        if ($item->getLatitude() == $latitude && $item->getLongitude() == $longitude) : ?>
                                            <span class="current_location">(Показан на карте)</span>
                                        <?php else : ?>
                                            <a href="index.php?address=<?php echo str_replace(" ", "+", $address) ?>&result=<?php echo $i ?>" class="other_location">Показать на карте</a>
                                        <?php endif; ?>
                                    </li>
                                <?php $i++; endforeach; ?>
                            </ul>
                            <p>Если адрес не найден, попробуйте другой поисковый запрос.</p>
                        <?php else : ?>
                            <h4>К сожалению, по вашему запросу ничего не найдено :(</h4>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>
