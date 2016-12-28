<?php

    class Dress
    {
        public $designer;
        public $style;
        public $size;
        public $length;
        public $price;

        public function __construct($designer, $price)
        {
          $this->designer = $designer;
          $this->price = $price;
        }

        public function setStyle($style)
        {
          $this->style = $style;
        }

        public function setSize($size)
        {
          $this->size = $size;
        }

        public function setLength($length)
        {
          $this->length = $length;
        }

        public function getSize()
        {
          return $this->size;
        }
    }
