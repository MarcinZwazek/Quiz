<?php
	require_once("OperacjeNaBazie.php");
	$Login=$_POST['login'];
	$Haslo=$_POST['haslo'];
	$Email=$_POST['email'];
	echo $Email;
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6Lcr5XUUAAAAAEcsqSG9WS-g2Fh4s2GMOJAWlgWW';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
           //Poprawna walidacja reCapcha
        	{
        		 $OperacjeNaBazie=new OperacjeNaBazie();
        	     $OperacjeNaBazie->zarejestruj($Login,$Email,$Haslo);
        	}
        
        else:
             echo " NIe udało się poprawie zweryfikować reCaptcha";
             header("Location: index.php");
        endif;
    else:
       echo " NIe udało się poprawie zweryfikować reCaptcha";
             header("Location: index.php");
    endif;

?>