<?php
  interface ITangerines extends IProduct
  {
      public function setWeight($weight);
      public function getWeight();
      public function getPrice();
  }
