<?php
class Uzytkownik
{
	function __construct()
	{

	}
	//IDUzytkownika	Nazwa	Email	Haslo	IDWyniku

	private $IDUzytkownika,$Nazwa,$Email,$Haslo,$IDWyniku;

	function __get($nazwa)
	{
		return $this->$nazwa;
	}
	function __set($nazwa,$wartosc)
	{
		$this->$nazwa=$wartosc;
	}
} 
?>