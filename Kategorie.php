<?php
    $dbConnect=new mysqli('localhost','BOSS','boss4321','db_gra');
    $zapytanie="SELECT * FROM Category";
    $wynik =$dbConnect->query($zapytanie);
    $tablicaKategorii=array();
    for($a=0;$a<$wynik->num_rows;$a++)
    {
        $wiersz=$wynik->fetch_assoc();
        
        
        $tablicaKategorii[$a]=$wiersz['Name'];
    }

    $wynik->free();
    $dbConnect->close();

?>



  
   <div class="btn-group-vertical" id="dropdown" >
     <div class="dropdown dropright">
        <button type="button" class="btn btn-primary btn-lg btn-block " data-toggle="dropdown">Kategorie</button>
       
        <?php foreach ($tablicaKategorii as $Kategoria)
        {

            echo  "<input type='submit' Name='a' id='kategoria1' class='btn btn-danger btn-lg item-menu buttons' onclick='showQuestions(this.value)' value='".$Kategoria."'></button><br />";
        }
      ?>
      
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="showQuestions()">Pytania</button>
        <button type="button" class="btn btn-primary btn-lg btn-block">Wyniki</button>
        <button type="button" class="btn btn-primary btn-lg btn-block">Konto</button>
      </div>
        
 