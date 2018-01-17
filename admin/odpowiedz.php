<?php
session_start();
header('Location: admin.php');
$link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj' ,'zaq12wsx', '25509958_proj');
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków

$idPytania = $_POST['numerpytania'];
$statusZam = $_POST['statusZamowienia'];

$updateKoment =  mysqli_query ($link , "UPDATE zamowienia SET status='$statusZam' WHERE id='$idPytania'") or die(mysqli_error($link));
?>