<?php
session_start();
//header("Location: logowanie.php");
$login = $_POST['login'];
$pass = $_POST['pass1'];
$adres = $_POST['adres'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c

>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
$wiadomosc = "Welcome new user !";
$link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj' ,'zaq12wsx', '25509958_proj'); 
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
    mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
$sql = "SELECT * FROM klient WHERE login='$login'" ;
$rezultat = mysqli_query($link, $sql) or die(mysqli_error($link));
$rekord = mysqli_fetch_array($rezultat);
if($rekord['login'] == $login){
	$_SESSION['zle'] = '<span style="color:red">Użytkownik o takim loginie już istnieje.</span>';
	header('Location: logowanie.php');
<<<<<<< HEAD
<<<<<<< HEAD
	}else{
	$doBazy =  mysqli_query($link, "INSERT INTO klient (login,haslo,adres,imie,nazwisko) VALUES('$login','$pass','$adres','$imie','$nazwisko') ") or die(mysqli_error($link));
=======
=======
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
	}
	else{
	$doBazy =  mysqli_query($link, "INSERT INTO klient (login,haslo,adres, imie, nazwisko) VALUES('$login','$pass','$adres', '$imie','$nazwisko') ") or die(mysqli_error($link));
    
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
    $Logi =  mysqli_query($link, "INSERT INTO logi (login) VALUES('$login') ") or die(mysqli_error($link));
	$_SESSION['utworzone'] = "Konto zostało utworzone!";
	$_SESSION['utworzone2'] = "Teraz możesz się zalogować!";
	unset($_SESSION['blad']);
	unset($_SESSION['zle']);
	unset($_SESSION['userIstnieje']);
	header('Location: logowanie.php');	
}
?>