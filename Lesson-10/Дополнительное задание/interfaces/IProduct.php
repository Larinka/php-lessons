<?php
  interface IProduct
  {
      public function __construct($name, $price);
      public function getPrice();
      public function getDeliveryPrice();
      
  }
