<?php

class OperacjeNaBazie
{
	//Zwracamy z bazy tablicę z kategoriami 
	function zwrocTabliceKategorii()
	{
		require("config.php");
	$dbConnect=new mysqli($Serwer,$DBUser,$DBPassword,$DBName);
    $zapytanie="SELECT * FROM kategoria";
    $wynik =$dbConnect->query($zapytanie);
     $tablicaKategorii=array();
    if($wynik->num_rows<1)
    {
      $tablicaKategorii[0]="Brak Kategorii";
    }
   else
   {
     for($a=0;$a<$wynik->num_rows;$a++)
        {
          $wiersz=$wynik->fetch_assoc();
          $tablicaKategorii[$a]=$wiersz['Nazwa'];
        }
   }	
    $wynik->free();
    $dbConnect->close();

  return $tablicaKategorii;	
	}

	//zwracamy id kategorii
	function zwrocIDKategorii($q)
	{
		require("config.php");
	$dbConnect=new mysqli($Serwer,$DBUser,$DBPassword,$DBName);
    $zapytanie="SELECT IDKategorii FROM kategoria WHERE Nazwa='".$q."'";
    $wynik =$dbConnect->query($zapytanie);
    $wiersz=$wynik->fetch_assoc();
    $ID=$wiersz['IDKategorii'];
    $wynik->free();
    $dbConnect->close();
    return $ID;
	}

	//Zwracamy pytania z danej kategorii
	function zwrocPytanieZKategorii($ID)
	{
	require("config.php");
	require("Pytania.php");

	$dbConnect1=new mysqli($Serwer,$DBUser,$DBPassword,$DBName);
    $zapytanie1="SELECT * FROM pytania WHERE IDKategorii='".$ID."'";
    $wynik =$dbConnect1->query($zapytanie1);
    $ile=$wynik->num_rows;

    $tablicaPytan=array();
    if($ile<1)
    {
      $idPytania=0;
      echo "BRAK PYTAN";
    }
   
    for($a=0;$a<$ile;$a++)
    {
      $Pytanie = new Pytania(); 
      $wiersz=$wynik->fetch_assoc(); 
      $Pytanie->ID=$wiersz['IDPytania'];
      $Pytanie->Pytanie=$wiersz['Pytanie'];
      $Pytanie->OdpowiedzA=$wiersz['OdpowiedzA']; 
      $Pytanie->OdpowiedzB=$wiersz['OdpowiedzB']; 
      $Pytanie->OdpowiedzC=$wiersz['OdpowiedzC']; 
      $Pytanie->OdpowiedzD=$wiersz['OdpowiedzD']; 
      $Pytanie->Prawidlowa=$wiersz['Prawidlowa'];
      $tablicaPytan[$a]=$Pytanie;
    }
    $wynik->free();
    $dbConnect1->close();
    $idPytania=$Pytanie->losuj($ile);
    for($a=0;$a<count($tablicaPytan);$a++)
    {
      if($tablicaPytan[$a]->ID==$idPytania)
      {
         $tablicaPytan[$a]->Pytanie;
         return $tablicaPytan[$a];
      }
    } 
	}
} 
?>