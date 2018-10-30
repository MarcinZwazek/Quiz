<?php
	$login=$_POST['login'];
	$haslo=$_POST['haslo'];
	$dbConnect=new mysqli('localhost','BOSS','boss4321','db_gra');


	if(mysqli_connect_errno())
	{
		echo "Błąd połączenia z bazą, Spróbuj ponownie później";
		exit;
	}
	else
	{

		$zapytanie="SELECT * FROM User WHERE Login='".$login."' AND Haslo='".$haslo."'";
		$wynik =$dbConnect->query($zapytanie);
		
		$ile=$wynik->num_rows;

		if($ile==0)
		{
			header("Location: index.php"); 
			
		}
		else
		{
			session_start();
			$_SESSION['uzytkownik'] =1;
			header("Location: Quiz.php");
		}
		

	
	
	
	}
?>