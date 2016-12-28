<?php
  interface ICandies extends IProduct
  {
      public function setDiscount($discount);
      public function setWeight($weight);
      public function getPrice();
  }
