<?php

//интерфейс собаки
interface IntDog
{
  public function sleep();
  public function eat();
  public function play();
}

//абстрактный класс собаки
abstract class AbstractDog
{
  public $breed;
  public $gender;
  public $age;
  public $name;

  public function checkName($name) {
    return 'Собаку зовут ' . $name;
  }
  public function makeSound($name) {
    return $name . ' лает';
  }
}

//класс конкретной собаки
class SomeDog extends AbstractDog implements IntDog
{
  public function __construct($breed, $gender, $age, $name) {
    $this->breed = $breed ;
    $this->gender = $gender;
    $this->age = $age;
    $this->name = $name;
  }

  public function sleep() {
    return $this->breed . ' спит в среднем по 15 часов в день.';
  }
  public function eat() {
    return $this->name . ' молодой, ему всего' . $this->age . ', поэтому ест много.';
  }
  public function play() {
    return $this->name . ' породы ' . $this->breed . ' молодой, ему всего ' . $this->age . ', поэтому играет он еще больше, чем ест.';
  }
}
 $dog = new SomeDog('Бультерьер', 'Кобель', '2 года', 'Пес');
 $dog->makeSound('Пес');
 $dog->play();

?>
