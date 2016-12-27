<?php
require_once 'autoload.php';

class Buyer
{
	private $name;
	private $number;
	private $female = false;
	private $money;
	private $dress;

	public function __construct($name, $number, $female, $money, Dress $dress = null)
	{
		$this->name = $name;
		$this->number = $number;
		$this->female = $female;
		$this->money = $money;
		$this->dress = $dress;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function setNumber($number)
	{
		$this->number = $number;
	}

	public function getGender()
	{
		if($this->female) {
			return 'девушка';
		}
		return 'мужчина';
	}

	public function setGender($female)
	{
		$this->female = $female;
	}

	public function getMoney()
	{
		return $this->money;
	}

	public function setMoney($money)
	{
		$this->money = $money;
	}

	public function getDress()
	{
		return $this->dress;
	}

	public function setDress(Dress $dress)
	{
		$this->dress = $dress;
	}

	public function buyDress(Dress $dress)
	{
		if($this->money >= $dress->getPrice()) {
			echo 'Платье куплено! Поздравляем. У вас осталось денег ' . ($this->money - $dress->getPrice());
		} else {
			echo 'Не удалось купить! Вам не хватает ' . ($dress->getPrice() - $this->money);
		}
	}

	public function getInfo()
	{
		return sprintf(
			'Имя: %s, Номер: %s, Пол: %s, Бюджет: %d',
			$this->getName(),
			$this->getNumber(),
      $this->getGender(),
			$this->getMoney()

		);
	}
}
