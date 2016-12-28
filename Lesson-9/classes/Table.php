<?php

    class Table
    {
        public $title;
        public $country;
        public $material;
        public $height;
        public $price;

        public function __construct($title, $price) {
          $this->title = $title;
          $this->price = $price;
        }

        public function setCountry($country)
        {
          $this->country = $country;
        }

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
    }
