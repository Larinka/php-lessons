<?php
require_once 'autoload.php';

class Dress implements DressInterface
{
	private $designer;
	private $style;
	private $size;
	private $color;
	private $length;
	private $price;

	public function __construct($designer, $style, $size, $color, $length, $price)
	{
		$this->designer = $designer;
		$this->style = $style;
		$this->size = $size;
		$this->color = $color;
    $this->length = $length;
		$this->price = $price;
	}

	public function getDesigner()
	{
		return $this->designer;
	}

	public function setDesigner($designer)
	{
		$this->designer = $designer;
	}

	public function getStyle()
	{
		return $this->style;
	}

	public function setStyle($style)
	{
		$this->style = $style;
	}

	public function getSize()
	{
		return $this->size;
	}

	public function setSize($size)
	{
		$this->size = $size;
	}

	public function getColor()
	{
		return $this->color;
	}

	public function setColor($color)
	{
		$this->color = $color;
	}

	public function getLength()
	{
		return $this->length;
	}

	public function setLength($length)
	{
		$this->length = $length;
	}

	public function changeColor($otherColor)
	{
		$this->color = $otherColor;
	}

  public function getPrice()
	{
		return $this->price;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function moreExpensive(Dress $otherDress)
	{
		if($this->price > $otherDress->price) {
			return 'Первое платье дороже';
		} elseif($this->price < $otherDress->price) {
			return 'Второе платье дороже';
		} else {
			return 'Цена одинаковая';
		}
	}

	public function getDressInfo()
	{
		return sprintf(
				'Дизайнер: %s, Стиль: %s, Размер: %s, Цвет: %s, Длина: %s, Цена: %d',
				$this->getDesigner(),
				$this->getStyle(),
				$this->getSize(),
				$this->getColor(),
        $this->getLength(),
				$this->getPrice()

		);
	}

}
