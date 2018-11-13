<?php
   require_once("OperacjeNaBazie.php");
   $OperacjeNaBazie=new OperacjeNaBazie();
   $tablicaKategorii=$OperacjeNaBazie->zwrocTabliceKategorii();
?>
  
   <div class="btn-group-vertical" id="dropdown" >
     <div class="dropdown dropright">
        <button type="button" class="btn btn-primary btn-lg btn-block " data-toggle="dropdown">Kategorie</button>
       <?php 
        if($tablicaKategorii[0]=="Brak Kategorii")
        {
             echo  "<input type='submit' Name='a' id='kategoria1' class='btn btn-danger btn-lg item-menu buttons' disabled value='Brak Kategorii'></button><br />";
             
             $tablicaKategorii[0]="";

        }
        else
        {
             foreach ($tablicaKategorii as $Kategoria)
            {

            echo  "<input type='submit' Name='a' id='kategoria1' class='btn btn-danger btn-lg item-menu buttons' onclick='showQuestions(this.value)' value='".$Kategoria."'></button><br />";
            }

        }
      ?>
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="showQuestions()">Pytania</button>
        <button type="button" class="btn btn-primary btn-lg btn-block">Wyniki</button>
        <button type="button" class="btn btn-primary btn-lg btn-block">Konto</button>
      </div>
        
 