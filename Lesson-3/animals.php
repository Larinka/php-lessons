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

//names consisting of two words
function twoWordsAnimals($fauna) {
    $result = [];
        foreach ( $fauna as $continent => $animals ) {
            foreach ( $animals as $animal ) {
                if (strpos($animal, ' ')) {
                    $result[$continent][] = $animal;
                }
            }
        }
    return $result;
}

//random names
function randomNames($animals) {
    $first = [];
    $second = [];
    $newName = [];
    $result = [];
    foreach ( $animals as $continent => $animal ) {
        foreach ( $animal as $name ) {
            if (strpos($name, ' ')) {
                $parts  = explode(' ', $name);
                $first[] = "$continent+{$parts[0]} ";
            }
            $second[] = $parts[1];
        }
    }
    shuffle($first);
    shuffle($second);
    for ($i = 0; $i < count($first); $i++) {
        $newName[] = $first[$i] . $second[$i];
    }
    foreach ($newName as $name) {
        $parts = explode('+', $name);
        $result[$parts[0]][] = $parts[1];
    }
    return $result;
}

//output of arrays by continents (names consisting of two words only)
function outputAnimals($animals, $randomanimals) {
    $html  = '<h1 class="text-center">Animals living in the world</h1>';
    $html .= '<table class="table table-bordered table-condensed">';
    $html .= '<tr><th colspan="2" class="text-center">Names consisting of two words</th></tr>';
    foreach ( $animals as $continent => $animal ) {
        sort($animal);
        sort($randomanimals[$continent]);
        $html .= '<tr class="header_name"><th class="text-center" style="width: 50%;">'.$continent.' - real names</th>';
        $html .= '<th class="text-center">'.$continent.' - unreal names</th></tr>';
        for ($i = 0; $i < count($animal); $i++) {
            $html .= '<tr><td>'.$animal[$i].'</td>';
            $html .= '<td>'.$randomanimals[$continent][$i].'</td></tr>';
        }
    }
    $html .= '</table>';
    return $html;
}

//output of arrays by continents (all names)
function output($fauna) {
    $html = '<h2 class="text-center">All the animals</h2>';
    foreach ( $fauna as $continent => $animals ) {
      $html .= '<h3>'.$continent.'</h3>';
      $html .= '<p>';
      foreach ($animals as $key => $animal) {
        if ($key !== 0) $html .= ', ';
        $html .= $animal;
      }
      $html .= '</p>';
    }
    return $html;
}
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
  <div class="container">

    <?php
        $animals = twoWordsAnimals($fauna);
        echo outputAnimals($animals, randomNames($animals));
        echo output($fauna);
    ?>

  </div>
</body>
</html>
