<?php
session_start();
	$user=$_POST['login']; // login z formularza
	$pass=$_POST['pass']; // hasło z formularza
	

	$link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj' ,'zaq12wsx', '25509958_proj'); // połączenie z BD
	if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
	mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków



	$result = mysqli_query($link, "SELECT * FROM  admin WHERE login='$user'"); // pobranie z BD wiersza, w którym login=login z formularza


	$rekord = mysqli_fetch_assoc($result) or die($result); // wiersza z BD, struktura zmiennej jak w BD
	if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
	{
			mysqli_close($link); //zamknięcie połączenia z BD
			echo "Error1 !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów

		}
		else
		{ // Jeśli $rekord istnieje
			if($rekord['haslo']==$pass) // czy hasło zgadza się z BD
			{		
				$_SESSION['loggedAdmin'] = true; 	// wskazuje ze jestesmy zalogowani
				header("Location: ./admin.php");			
		}
		else
		{
			mysqli_close($link);
			echo "Error2 !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
		}
	}
	?>
