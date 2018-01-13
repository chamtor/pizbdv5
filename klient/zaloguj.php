<?php
session_start();

 	$user=$_POST['user']; // login z formularza
	$pass=$_POST['pass']; // hasło z formularza
	$_SESSION['uzytkownik'] = $user;
	$link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj' ,'zaq12wsx', '25509958_proj'); // połączenie z BD – wpisać swoje parametry !!!
	if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
	mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
	$result = mysqli_query($link, "SELECT * FROM klient WHERE login='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
	mysqli_query($link, "SET NAMES 'utf8'");
	$date = date("F j, Y, g:i a",time());
	$rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
	if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
	{
			mysqli_close($link); // zamknięcie połączenia z BD
			echo "Brak użytkownika o takim loginie !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
		}
		else    { // Jeśli $rekord istnieje
				if($rekord['haslo']==$pass) // czy hasło zgadza się z BD
				{
					$log = mysqli_query($link, "UPDATE logi SET dataLogowania ='$date' WHERE login='$user'") or die(mysqli_error($link));
					header('Location: logged.php');
					$_SESSION['loggedKlient'] = true;
				}
				else
				{
					$_SESSION['blad'] = '<span style="color:red">Ups, coś poszło nie tak. Spróbuj ponownie!</span>';
					unset($_SESSION['utworzenie']);
					unset($_SESSION['utworzenie2']);	
					header('Location: logowanie.php');
				}
			}
			?>