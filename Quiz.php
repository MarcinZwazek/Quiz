<?php
  session_start();
  $q = $_REQUEST['q'];
  $_SESSION['Kategoria']=$q;
  //UZYSKANIE ID z bazy wybranej kategorii
   require_once("OperacjeNaBazie.php");
   $OperacjeNaBazie=new OperacjeNaBazie();
   $ID=$OperacjeNaBazie->zwrocIDKategorii($q);
   if($ID=="")
   {
     $Pytanie=$OperacjeNaBazie->zwrocWszystkiePytania();
   }
   else
   {
   $Pytanie=$OperacjeNaBazie->zwrocPytanieZKategorii($ID);
   if($Pytanie==null)
   {
      echo "Brak pytań z wybranej kategorii";
      return ;
   }
    //UZYSKANIE PYTANIA z bazy
}
?>
       <section class="pytanka">  
        <?php echo $Pytanie->Pytanie;?>
        <div class="odpowiedz">
          <form action="wynik.php" method="POST" name="myForm">
         <label><input type="radio"  name="optradio"  value="OdpowiedzA"><?php echo $Pytanie->OdpowiedzA;?></label> <br />
         <label><input type="radio"  name="optradio" value="OdpowiedzB"><?php echo $Pytanie->OdpowiedzB;?></label> <br />
         <label><input type="radio"  name="optradio" value="OdpowiedzC"><?php echo $Pytanie->OdpowiedzC;?></label> <br />
         <label><input type="radio" name="optradio" value="OdpowiedzD"><?php echo $Pytanie->OdpowiedzD;?></label> <br />
         <br />
         <input type="button"  name="submit" onclick="showAnswers()"  value="Następne">
       </form>
       </div>
       </section>


 
