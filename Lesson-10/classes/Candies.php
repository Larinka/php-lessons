<?php
class Candies extends Product implements ICandies
{
    public $discount = 10;
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function getPrice()
    {
        $totalPrice = ($this->price - ($this->price * $this->discount / 100)) * $this->weight;
        $this->isDiscounted = true;
        return $totalPrice;
    }
}
