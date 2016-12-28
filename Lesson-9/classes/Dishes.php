<?php

    class Dishes
    {
        public $type;
        public $form;
        public $color;
        public $material;
        public $price;

        public function construct($type, $price) {
          $this->type = $type;
          $this->price = $price;
        }

        public function setForm($form)
        {
          $this->form = $form;
        }

        public function setColor($color)
        {
          $this->color = $color;
        }

        public function setMaterial($material)
        {
          $this->material = $material;
        }

        public function getMaterial()
        {
          return $this->material;
        }

        public function getColor()
        {
          return $this->color;
        }
    }
