function sprawdzRejestracje()
{
 var login=document.getElementById("Nazwa").value;
 var haslo=document.getElementById('Haslo').value;
 var haslo2=document.getElementById('HasloPowtorz').value;
 var email=document.getElementById('Email').value;
  var v = grecaptcha.getResponse();
 
		
		if(((login.length>3)&&(login.length<10))||(login.length!=0))
		{
			if(((haslo.length>3)&&(haslo.length<10))||(haslo.length!=0))
			{
				 
				if(((haslo2.length>3)&&(haslo2.length<10))||(haslo2.length!=0))
					{
						if(haslo==haslo2)
						{
							if(((email.length>3)&&(email.length<10))||(email.length!=0))
							{
								for(var a=0;a<email.length;a++)
								{
									if(email[a]=='@')
									{
    									if(v.length != 0)
										{
										document.getElementById('blad2').innerHTML="Captcha zaakceptowana";
										document.getElementById('rejestracja').submit();
										return true; 
										}
										else
										{
										document.getElementById('blad2').innerHTML="Zaznacz nie jestem robotem";
										 return false;
										}
									}
									else
									{
										document.getElementById('blad2').innerHTML="To nie email";

									}
								}
							}
						}
						else
						{
							document.getElementById('blad2').innerHTML="hasla nie są równe";
						}
			
					}
					else
					{
						document.getElementById('blad2').innerHTML="haslo za krótkie";
					}
			}
			else
			{
				document.getElementById('blad2').innerHTML="Za krótkie hasło";
			}	
		}
		else
		{
			document.getElementById('blad2').innerHTML="Za krótki login";
		}
}