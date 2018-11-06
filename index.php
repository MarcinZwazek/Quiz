
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Spicy+Rice" rel="stylesheet">
  <script src="sprawdzLogowanie.js" type="text/javascript" ></script>
  <link rel="stylesheet" href="style.css">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script type="text/javascript">
    //Tutaj Ajax obsługa Kategorii
    function showCategories()
    {
      if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
      xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("dropdown").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","Kategorie.php",true);
  xmlhttp.send();
  }
// Tutaj Ajax obsługa pytań
function showQuestions(str)
    {
      if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
      xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("main").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","Quiz.php?q="+str,true);
  xmlhttp.send();
}

function showAnswers()
    {
      if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
      xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("main").innerHTML=this.responseText;
    }
  }
  
  xmlhttp.open("GET","Wynik.php",true);
  xmlhttp.send();

}

</script>

</head>
<body >
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <a id="header" href="index.php"> <h3 class="tytul">Quiz</h3></a>
    </div>
      <ul class="nav navbar-nav navbar-right">
        <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal2">Zarejestruj</button>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Zaloguj</button>
      </ul>
    </div>
  </nav>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Zaloguj się</h4>
        </div>
        <div class="modal-body">
          <!--Formularz logowania -->
          <form method="POST" id="formularz" action="zaloguj.php" >
        <label>Login</label> <input type="text" name="login" id="login" />
        <label>Haslo</label> <input type="password" name="haslo" id="haslo"/>

        <input type="button" name="logowanie" value="zaloguj" onclick="sprawdz()">  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
          <div id="raport" >
            <p  style="color:red" id ="blad"></p>
        </div>
          </div>
        </form>
        </div>
      </div>  
    </div>
  </div>
  <!--rejestracja nowego konta-->
   <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Zarejestruj Konto</h4>
        </div>
        <div class="modal-body">
          <!--Formularz rejestracji -->
         <form method="POST" id="formularz" action="Zarejestruj.php" >
          <div class="rejestracja">
            <label>Login</label><br />
            <input type="text" name="login" id="login" />
            <br />
            <label>Haslo</label>
            <br />
            <input type="password" name="haslo" id="haslo"/>
            <br />
            <label>Powtórz hasło</label><br />
            <input type="text" name="powtorzHaslo" id="haslo" />
            <br />
            <label>E-mail</label><br />
            <input type="text" name="email" id="login" />
            <br />
            <br />
            <div class="g-recaptcha" data-sitekey="6Lcr5XUUAAAAAFyu5-I3KSPQKuZ1gukrM7bOaktr"></div>
            <input type="button" name="rejestracja" value="Zarejestruj" onclick="sprawdzRejestracje()">  
          </div>
        </form>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
          <div id="raport" >
            <p  style="color:red" id ="blad"></p>
        </div>
          </div>
        </form>
        </div>
      </div>  
    </div>
  </div>
</div>
<!--Pasek boczny strony z menu poziomym -->
<div class="container-fluid text-center" >    
  <div class="row content">
    <div class="col-sm-2 sidenav" >
      <div class="btn-group-vertical" id="dropdown" >
           <button type="button" class="btn btn-primary btn-lg btn-block"  onclick="showCategories()">Kategorie</button>
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="showQuestions()">Pytania</button>
        <button type="button" class="btn btn-primary btn-lg btn-block">Wyniki</button>
        <button type="button" class="btn btn-primary btn-lg btn-block">Konto</button>
      </div>
      <br />
      <div class="abaut">
        <h3>Witam </h3>
        <p> Mam na imię Marcin<br /> Moją pasją jest informatyka, zajmuję się nią od prawie 10 lat. Potrafię naprawiać komputery od tego zaczynałem, od kilka lat tworzę strony internetowe.</p>
      </div>
    </div>

      <div class="col-sm-8 text-left tekst" id="main" style="height: 700px;"> 
       <section class="tekst"> 
        <h3>Witaj</h3>
        <p> Tą stronę poświęcę quizom. Każdy chyba zna quizy działają na bardzo prostej zasadzie pytanie odpowiedz.<br /> W tych quizach odpowiedzi nigdy nie możesz być pewien zazwyczaj bywa tak że wszystkie pasują do odpowiedzi,ale tak naprawdę <strong>Jest tylko jedna</strong><br /> </p>
        <br />

        <h3>Instrukcja</h3><br />

          <ul>
            <li> Załóż konto aby mieć dostęp do wyników uzyskanych przez Ciebie i Twoich znajomych</li>
            <li> Zaloguj się aby mięc dostęp do Twoja konta możesz zmienić hasło, dodać pytanie bądz kategorię </li>
            <li> Wybierz kategorię pytania, możesz też wybrać same pytania które będą losowane przypadkowo </li>
            <li> Baw się dobrze </li>
          </ul>

          <br />
          <p><STRONG>POWODZENIA</STRONG></p>




       </section>
      </div>
    <div class="col-sm-2 sidenav " >
      <div class="well">
        <p>Email: marcinzwazek@gmail.com</p>
      </div>
      <div class="well">
        <a href="https://www.facebook.com/marcin.zwiazek.1" target="_blank"><p>Facebook</p></a>
      </div>
    </div>
  </div>
</section>
</div>
<footer class="container-fluid text-center">
  <p>Wszelkie Prawa zastrzeżone 2018</p>
</footer>

</body>
</html>
