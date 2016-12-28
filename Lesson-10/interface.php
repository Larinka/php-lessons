<?php

  //Общий интерфейс
  interface CommonInterface
  {
    public function __construct($title, $price, $country);
    public function getTitle();
    public function getPrice();
    public function getCountry();
  }

  //Интерфейс класса Fruit
  interface IFruit extends CommonInterface
  {
    public function setColor($color);
    public function setQuality($ripe);
  }

  //Интерфейс класса Table
  interface ITable extends CommonInterface
  {
    public function setMaterial($material);
    public function setHeight($height);
  }

  //Общий класс
  class CommonClass implements CommonInterface
  {
    public $title;
    public $price;
    public $country;

    public function __construct($title, $price, $country)
    {
      $this->title = $title;
      $this->price = $price;
      $this->country = $country;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCountry()
    {
        return $this->country;
    }
  }

  //Класс Fruit
  class Fruit extends CommonClass implements IFruit
  {
    public $color;
    public $ripe = false;

    public function setColor($color)
    {
      $this->color = $color;
    }

    public function setQuality($ripe)
    {
      $this->ripe = $ripe;
    }

    public function getColor()
    {
      return $this->color;
    }

    public function getQuality()
    {
      if ($this->ripe) {
        return 'спелый';
      } else {
        return 'неспелый';
      }
    }
  }

  //Класс Table
  class Table extends CommonClass implements ITable
  {
    public $material;
    public $height;

    public function setMaterial($material)
    {
      $this->material = $material;
    }

    public function setHeight($height)
    {
      $this->height = $height;
    }

    public function getMaterial()
    {
      return $this->material;
    }

    public function getHeight()
    {
      return $this->height;
    }
  }
