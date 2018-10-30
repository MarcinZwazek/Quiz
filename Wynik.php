<?php
	$dbConnect=new mysqli('localhost','BOSS','boss4321','db_gra');
	$zapytanie="SELECT * FROM Questions";
	$wynik =$dbConnect->query($zapytanie);
	$wiersz=$wynik->fetch_assoc();

	$Odpowiedz=$_POST['optradio'];


	if($wiersz['Prawidlowa']==$Odpowiedz)
	{
		echo "gratuluję";
	}
	else
	{
		echo "Przykro mi";
		
	}

	?>