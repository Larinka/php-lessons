<?php
class Cookies extends Product implements ICookies
{
    public $discount = 10;
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function getPrice()
    {
        $totalPrice = ($this->price - ($this->price * $this->discount / 100)) * $this->weight;
        $this->isDiscounted = true;
        return $totalPrice;
    }
}
