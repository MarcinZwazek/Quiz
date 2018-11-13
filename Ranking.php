<?php

 require_once("OperacjeNaBazie.php");
   $OperacjeNaBazie=new OperacjeNaBazie(); 
   $TablicaWynikow=$OperacjeNaBazie->zwrocRanking();
   if($TablicaWynikow[0]=="Brak Wyników")
   {
   	echo $TablicaWynikow[0];
   	 return;
   }
?>
<ul>
	<?php foreach ($TablicaWynikow as $Kategoria)
            {
            echo  "<li>'".$Kategoria."'</li><br />";
            }
            ?>
</li>
</ul>