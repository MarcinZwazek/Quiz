<?php
require_once("Pytania.php");
$Pytanie = new Pytania(); 
$q = $_REQUEST['q'];
  //UZYSKANIE ID z bazy wybranej kategorii
  $dbConnect=new mysqli('localhost','BOSS','boss4321','db_gra');
    $zapytanie="SELECT ID FROM Category WHERE Name='".$q."'";
    $wynik =$dbConnect->query($zapytanie);
    $wiersz=$wynik->fetch_assoc();
     $ID=$wiersz['ID'];
    $wynik->free();
    $dbConnect->close();
   

    //UZYSKANIE PYTANIA z bazy
    $dbConnect=new mysqli('localhost','BOSS','boss4321','db_gra');
    $zapytanie="SELECT * FROM Questions WHERE ID_FK_Category='".$ID."'";
    $wynik =$dbConnect->query($zapytanie);
    $tablicaPytan=array();
    $ile=$wynik->num_rows;
     $idPytania=$Pytanie->losuj($ile);
    
    for($a=0;$a<$ile;$a++)
    {
      $wiersz=$wynik->fetch_assoc(); 
      $Pytanie->ID=$wiersz['IDQuestion'];
      $Pytanie->Pytanie=$wiersz['Pytanie'];
      $Pytanie->OdpowiedzA=$wiersz['OdpowiedzA']; 
      $Pytanie->OdpowiedzB=$wiersz['OdpowiedzB']; 
      $Pytanie->OdpowiedzC=$wiersz['OdpowiedzC']; 
      $Pytanie->OdpowiedzD=$wiersz['OdpowiedzD']; 
      $Pytanie->Prawidlowa=$wiersz['Prawidlowa'];
      $tablicaPytan[$a]=$Pytanie;

    }
   
   echo count($tablicaPytan);
    
   
   
  

   
  //  echo $wiersz['Pytanie'];
    $wynik->free();
    $dbConnect->close();

  
?>
  
  
