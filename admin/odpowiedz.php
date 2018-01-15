<?php
session_start();
header('Location: tabela.php');
$link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj' ,'zaq12wsx', '25509958_proj'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków


$idPytania = (int) $_POST['numerpytania'];
$odpowiedzAdmina = $_POST['odpowiedz'];

 //$odp = mysqli_query($link , "SELECT * FROM problem WHERE id = '$idPytania'") or die(mysqli_error($link));

//$idPytaniaZbazy = mysqli_query ($link , "SELECT * FROM problem WHERE id='$idPytania' ") or die("blad zapytania");
if (!empty($_POST['numerpytania']) =="true" && !empty($_POST['odpowiedz']) =="true") {


//$odpowiedzDoBazy = mysqli_query ($link , "INSERT INTO `problem` (resolved) VALUES ('$odpowiedzAdmina')  ") or die(mysqli_error($link));
//$user = $_SESSION['user'];
$updateKoment =  mysqli_query ($link , "UPDATE zamowienia SET odpowiedz='$odpowiedzAdmina' WHERE id='$idPytania'") or die(mysqli_error($link));


}
else{
  echo "Brak danych";
}

?>

