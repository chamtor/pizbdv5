<?php
session_start();
header('Location: logged.php');
$wybranyB = $_POST['produkt'];
$ilosc = $_POST['ilosc'];
$opisanyB = $_POST['opisZam'];
$user= $_SESSION['uzytkownik'];
$dateee = date("F j, Y, g:i a"); 

$link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj2' ,'zaq12wsx', '25509958_proj2'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków


$ilo = mysqli_query ($link , "SELECT cena FROM cennik WHERE ilosc='$ilosc' ") or die("blad zapytania");
while($row = mysqli_fetch_array($ilo)){   //Creates a loop to loop through results
	$_SESSION['cena1'] = $row['cena'];  //$row['index'] the index here is a field name
}
$cena2 = $_SESSION['cena1'];

//echo $cena2;


$sql11 = mysqli_query ($link , "SELECT adres FROM klient WHERE login='$user' ") or die("blad zapytania");
while($row = mysqli_fetch_array($sql11)){   //Creates a loop to loop through results
	$_SESSION['adres'] = $row['adres'];  //$row['index'] the index here is a field name
}
$adres = $_SESSION['adres'];

$result = mysqli_query($link, "INSERT INTO problem (produkt, opisZam, klient, czas,ilosc,adres, cenaZamowienia) VALUES ('$wybranyB', '$opisanyB', '$user' ,'$dateee','$ilosc','$adres', '$cena2') ") or die("bląd zapytania");
?>
