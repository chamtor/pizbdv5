<?php
session_start();
//header("Location: logowanie.php");
$login = $_POST['login'];
$pass = $_POST['pass'];
$adres = $_POST['adres'];

$wiadomosc = "Welcome new user !";

$link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj' ,'zaq12wsx', '25509958_proj'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
	mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków



$sql = "SELECT * FROM klient WHERE login='$login'" ;
$rezultat = mysqli_query($link, $sql) or die(mysqli_error($link));

$rekord = mysqli_fetch_array($rezultat);

if($rekord['login'] == $login){
	$_SESSION['zle'] = '<span style="color:red">Użytkownik o takim loginie już istnieje.</span>';
	
	header('Location: logowanie.php');

	}else{
	$doBazy =  mysqli_query($link, "INSERT INTO klient (login,haslo,adres) VALUES('$login','$pass','$adres') ") or die(mysqli_error($link));

	$_SESSION['utworzone'] = "Konto zostało utworzone!";
	$_SESSION['utworzone2'] = "Teraz możesz się zalogować!";
	unset($_SESSION['blad']);
	unset($_SESSION['zle']);
	unset($_SESSION['userIstnieje']);
	header('Location: logowanie.php');	
}



/*if($login == "" OR $pass == "" OR $login AND $pass == "" OR $row_cnt>0){
	$_SESSION['zle'] = '<span style="color:red">Ops, something went wrong! Try to register again.</span>';

	header('Location: logowanie.php');
}else{
	$doBazy =  mysqli_query($polaczenie, "INSERT INTO klient (login, haslo, adres) VALUES('$login', '$pass', '$adres')");
	unset($_SESSION['zle']);
	$_SESSION['utworzone'] = "An account has been created !";
	$_SESSION['utworzone2'] = "Now you can log in!";
	unset($_SESSION['blad']); 
	header('Location: logowanie.php');
}*/
?>