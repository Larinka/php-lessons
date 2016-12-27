<?php
class Boutique
{
	private $dressArray;
	public function __construct()
	{
		$this->dressArray = [];
	}

	public function addDress(Dress $dress)
	{
		$this->dressArray[] = $dress;
	}

	public function getDressArray()
	{
		return $this->dressArray;
	}

	public function removeDress(Dress $dress)
	{
		$array = $this->getDressArray();
		foreach ($array as $key=>$value)
		{
			if($array[$key] == $dress)
			{
				unset ($array[$key]);
			}
		}
	}

	public function showAllDresses()
	{
		$array = $this->dressArray;
		foreach ($array as $key => $value)
		{
			echo $value->getInfo();
		}
	}
}
