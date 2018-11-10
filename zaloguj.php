<?php
	require_once("OperacjeNaBazie.php");
	$login=$_POST['login'];
	$haslo=$_POST['haslo'];
	$logowanie=new OperacjeNaBazie();
	$user=$logowanie->zaloguj($login,$haslo);
?>