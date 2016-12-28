<?php
abstract class Product implements IProduct
{
    public $name;
    public $price;
    public $discount;
    public $isDiscounted = false;
    public $weight;
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    abstract public function getPrice();
    public function getDeliveryPrice()
    {
        if ($this->isDiscounted == true) {
            return 300;
        } else {
            return 250;
        }
    }
}
