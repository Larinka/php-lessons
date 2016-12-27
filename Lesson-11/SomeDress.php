<?php
require_once 'autoload.php';

$dress1 = new Dress('Diesel', 'Sport', 'M', 'черное', 'короткое', 7000);
$dress1->changeColor('красное');
echo $dress1->getDressInfo();
