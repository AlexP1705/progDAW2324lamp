<?php
class Empresa
{
	public $id;
	public $company;
	public $investment;
	public $date;
	public $active;
 
	public function __construct($id, $company, $investment, $date, $active)
	{
		$this->id = $id;
		$this->company = $company;
		$this->investment = $investment;
		$this->date = $date;
		$this->active = $active === 'True';//Convierte el string a booleano.
	}
	public function isVIP()
	{
		return $this->investment >= 1000000;
	}

	public function getActiveImage()
	{
		return $this->active ? 'img05.gif' : 'img06.gif';
	}
}