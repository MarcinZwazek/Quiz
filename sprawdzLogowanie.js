function sprawdz()
		{
			//WALIDACJA PODSTAWOWA LOGINU
			
			var loginCheck = document.getElementById('login').value;
			const tekst=loginCheck;
			const reg=new RegExp("[a-z]*[0-9]","i");
			//Sprawdzenie logowania 
			if((loginCheck.length>6)&&(loginCheck.length<25))
			{
				//Wyrażenie regularne sprawdzające login
				
				if(reg.test(tekst)==true)
				{
					var passwordCheck = document.getElementById('haslo').value;
					const tekstPasssword=passwordCheck;
					const reg2=new RegExp("[a-z]*[0-9]");
					if((passwordCheck.length>6)&&(passwordCheck.length<25))
					{
						//Wyrażenie regularne sprawdzające login
						
						if(reg2.test(tekstPasssword)==true)
						{
							document.getElementById('formularz').submit();
						}
						else
						{
							document.getElementById("blad").innerHTML= " Błąd hasła: Wprowadz właściwe znaki";
						}
					}
					else 
					{
						document.getElementById("blad").innerHTML= "Błąd hasła: Zła długość tekstu";
						
					}	
				}
				else
				{
					document.getElementById("blad").innerHTML= " Błąd loginu: Wprowadz właściwe znaki";
				}
			}
			else 
			{
				document.getElementById("blad").innerHTML= "Błąd loginu: Zła długość tekstu";
				
			}
			
			
		}