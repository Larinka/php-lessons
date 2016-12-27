<?php
require_once 'autoload.php';

$buyer1 = new Buyer('Aлиса Селезнева', 89003217080, true, 55000);
$buyer2 = new Buyer('Ольга Кормухина', 87004358767, true, 420000);
$dress1 = new Dress('D&G', 'вечернее', 'M', 'синее', 'длинное', 75000);
$dress2 = new Dress('Carolina Herrera', 'коктейльное', 'S', 'красное', 'короткое', 45000);
$boutique = new Boutique();
$boutique->addDress($dress1);
$boutique->addDress($dress2);

echo 'Цена на платье '. $dress1->getDesigner() . ' составляет ' . $dress1->getPrice() . '. <br>';
echo $buyer1->getName() . ' владеет суммой ' . $buyer1->getMoney() . '. <br>' ;
echo $buyer1->getName() . ' пробует купить платье ' . $dress1->getDesigner() . '. ';
echo $buyer1->buyDress($dress1) . '. <br>';
echo $buyer2->getName() . ' владеет суммой ' . $buyer2->getMoney() . '. <br>';
echo $buyer2->getName() . ' пробует купить это же платье. ';
echo $buyer2->buyDress($dress1) . '. <br>';
