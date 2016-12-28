<?php

    class Fruit
    {
        public $title;
        public $country;
        public $color;
        public $ripe = false;
        public $price;

        public function construct($title, $price) {
          $this->title = $title;
          $this->price = $price;
        }

        public function setCountry($country)
        {
          $this->country = $country;
        }

        public function setColor($color)
        {
          $this->color = $color;
        }

        public function setQuality($ripe)
        {
          $this->ripe = $ripe;
        }

        public function getQuality()
        {
          if ($this->ripe) {
            return 'спелый';
          } else {
            return 'неспелый';
          }
        }

        public function setPrice($price)
        {
          $this->price = $price;
        }

        public function getCountry()
        {
          return $this->country;
        }
    }
