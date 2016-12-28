<?php
  interface ICookies extends IProduct
  {
      public function setDiscount($discount);
      public function setWeight($weight);
      public function getPrice();
  }
