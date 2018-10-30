<?php
class Pytania
{
	function __construct()
	{

	} 
	private $ID,$Pytanie,$OdpowiedzA,$OdpowiedzB,$OdpowiedzC,$OdpowiedzD,$Prawidlowa,$ID_FK_Kategoria;

	function __get($nazwa)
	{
		return $this->$nazwa;
	}
	function __set($nazwa,$wartosc)
	{
		$this->$nazwa=$wartosc;
	}
	public function losuj($ile)
	{
		//losowanie pytania
		$idPytania=rand(1,$ile);
		return $idPytania;

	}
} 
?>