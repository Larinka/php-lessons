<?php
class Tangerines extends Product implements ITangerines
{
    public $discount = 10;
    public function getPrice()
    {
        if ($this->weight > 10) {
            $totalPrice = ($this->price - ($this->price * $this->discount / 100)) * $this->weight;
            $this->isDiscounted = true;
            return $totalPrice;
        } else {
            return $this->weight * $this->price;
        }
    }
}
