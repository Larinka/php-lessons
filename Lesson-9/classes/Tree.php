<?php

    class Tree
    {
        public $region;
        public $country;
        public $type;
        public $title;
        public $leafsForm;
        public $age;

        public function construct($region, $type, $title) {
          $this->region = $region;
          $this->type = $type;
          $this->title = $title;
        }

        public function setCountry($country)
        {
          $this->country = $country;
        }

        public function setLeafsForm($leafsForm)
        {
          $this->leafsForm = $leafsForm;
        }

        public function setAge($age)
        {
          $this->age = $age;
        }

        public function getCountry()
        {
          return $this->country;
        }

        public function getAge()
        {
          return $this->age;
        }
    }
