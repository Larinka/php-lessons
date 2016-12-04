<?php
error_reporting(E_ALL);

$fauna = [
    'Eurasia' => ['Bison bonasus', 'Ursus arctos', 'Varanus varius', 'Vulpes vulpes', 'Canis lupus',
     'Martes zibellina', 'Uncia uncia', 'Rangifer tarandus', 'Enhydra lutris', 'Presbytis',
     'Ovis orientalis'],

    'Africa' => ['Loxodonta', 'Hippopotamus amphibius', 'Acinonyx jubatus', 'Gorilla',
     'Giraffa camelopardalis', 'Hippotigris', 'Crocodilia', 'Panthera leo', 'Panthera pardus',
     'Crocuta crocuta'],

    'North America' => ['Potos flavus', 'Lontra canadensis', 'Castor fibe', 'Nasua', 'Canis latrans',
     'Gulo gulo', 'Bassariscus', 'Cyclopes didactylus', 'Rangifer tarandus', 'Mephitis mephitis'],

    'South America' => ['Hydrochoerus hydrochaeris', 'Lagostomus maximus', 'Trichechus',
     'Phyllostomidae', 'Rhea', 'Tremarctos ornatus', 'Chinchilla lanigera', 'Bradypus tridactylus',
     'Leopardus pardalis', 'Callimico goeldii'],

    'Australia' => ['Peramelemorphia', 'Vombatidae', 'Sphenodon punctatus', 'Tachyglossidae',
     'Oryctolagus cuniculus', 'Macropus giganteus', 'Casuarius', 'Phalanger', 'Trichosurus vulpecula',
     'Petaurus australis'],

    'Arctic' => ['Lepus timidus', 'Ursus maritimus', 'Odobenus rosmarus', 'Ovibos moschatus',
     'Vulpes lagopus', 'Pinnipedia'],

    'Antarctica' => ['Hydrurga leptonyx', 'Spheniscus mendiculus', 'Eudyptes chrysolophus',
     'Aptenodytes forsteri', 'Aptenodytes patagonicus', 'Pygoscelis adeliae', 'Mirounga leonina']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Animals on the planet</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>

<?php
//names consisting of two words
echo '<h1 class="text-center">Animals on the planet</h1>';
echo '<h2 class="text-center">Names consisting of two words</h2>';
foreach ($fauna as $continent => $animals) {
    echo '<h3>'.$continent.'</h3>';
    echo '<ul class="list-inline">';
    foreach ($animals as $key => $animal) {
        if (strpos($animal, ' ')) {
          echo '<li class="list-group-item">'.$animal.'</li>';
        }
    }
    echo '</ul>';
}

//random names
echo '<h2 class="text-center">Random names</h2>';
echo '<p class="random">';
foreach ($fauna as $continent => $animals) {
    foreach ($animals as $animal) {
        if (strpos($animal, ' ')) {
          list($first[], $second[]) = explode(' ', $animal);
        }
    }
}
shuffle($first);
shuffle($second);
foreach ($first as $key=>$name) {
  if ($key !== 0) echo ', ';
  echo "{$name} {$second[$key]}";
}
echo '</p>';

//output of arrays by continents (all names)
echo '<h2 class="text-center">All the animals</h2>';
foreach ($fauna as $continent => $animals) {
  echo '<h3>'.$continent.'</h3>';
  echo '<p>';
  foreach ($animals as $key => $animal) {
    if ($key !== 0) echo ', ';
    echo $animal;
  }
  echo '</p>';
}
?>

</body>
</html>
