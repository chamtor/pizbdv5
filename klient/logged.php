<?php
session_start();
if((isset($_SESSION['loggedKlient'])) && ($_SESSION['loggedKlient']==true))
{
$link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj' ,'zaq12wsx', '25509958_proj'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków

?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
  <meta http-equiv="refresh" content="1000" /> 
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Zdunowski</title>

</head>
<body>
  <ul>
   <li><a href="http://www.lukasz-zdunowski.com.pl/pizbd">Home</a></li>
   <li><a href="http://www.lukasz-zdunowski.com.pl/pizbd/klient/logowanie.php">Log In / Register</a></li>
   <li style="float:right"><a href="http://www.lukasz-zdunowski.com.pl/pizbd/klient/logout.php">Log out</a></li>
   
 </ul

 <?php 
 if(isset($_SESSION['uzytkownik'])){
  echo "<p>Witaj: "." ".$_SESSION['uzytkownik']."!";
}
?> 
<br>
 <form method="post">
                <input type='submit' name='przycisk' value="Przegladaj produkty"><br>
                <input type='submit' name='przycisk' value="Status zamówienia."><br>



    </form>
    
    
<?php
    if(isset($_POST['przycisk'])){            													//jeśli wciśnięto przycisk
        echo "<form method='post'>";
        switch($_POST['przycisk']){

        
        case "Przegladaj produkty":{												//natomiast jeśli wciśnięto "dodaj nowego szkoleniowca" to
            echo "<p>Produkty w magazynie:</p>";											//komunikat


            $result = mysqli_query($link, "SELECT * FROM produkty");
            print "<TABLE CELLPADDING=5 BORDER=1>";
            print "<TR><TD>Kategoria</TD><TD>Nazwa</TD><TD>Cena</TD></TR>\n";

            while ($wiersz = mysqli_fetch_array($result))
            {
                $kat = $wiersz['kategoria'];
                $naz = $wiersz['nazwa'];
                $cen = $wiersz['cena'];


                print "<TR><TD>$kat</TD><TD>$naz</TD><TD>$cen</TD></TR>\n";   
            } 
            print "</TABLE>" ;
            break;
        }
        
          case "Status zamówienia.":{    											//natomiast jeśli wciśnięto "dodaj nowego szkoleniowca" to
            echo "<p>Status Twojego zamówienia:</p>";											//komunikat
            $user = $_SESSION['uzytkownik'];

            $result = mysqli_query($link, "SELECT * FROM zamowienia WHERE login ='$user' ");
            print "<TABLE CELLPADDING=5 BORDER=1>";
            print "<TR><TD>Kategoria</TD><TD>Nazwa</TD><TD>Cena</TD></TR>\n";

            while ($wiersz = mysqli_fetch_array($result))
            {
                $kat = $wiersz['kategoria'];
                $naz = $wiersz['nazwa'];
                $cen = $wiersz['cena'];


                print "<TR><TD>$kat</TD><TD>$naz</TD><TD>$cen</TD></TR>\n";   
            } 
            print "</TABLE>" ;
            break;
        }
        
        
    ?>
<form method="POST" action="problem.php">
  <br>
  <p1> Wybierz produkt jaki chcesz zamówić. </p1><br><br>
  <select name="produkt">
    <option value="Czapki" size="40" >Czapki</option>
    <option value="Rękawiczki" size="40" >Rękawiczki</option>
    <option value="Szale" size="40" >Szale</option>
    <option value="Skarpety" size="40" >Skarpety</option>
  </select>
  <br><br><br>

  <p1> Podaj ilość zamówienia </p1><br>
  <select name="ilosc">
    <option value="1000" size="40" >1000</option>
    <option value="1500" size="40" >1500</option>
    <option value="2000" size="40" >2000</option>
    <option value="2500" size="40" >2500</option>
  </select>
  <br><br><br>
  <?php


     }
}

?>
<p1>Twoje zamówienia.</p1><br>
<?php
$user= $_SESSION['uzytkownik'];


/*
print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>Zamówienie.</TD>
<TD>Ilość.</TD>
<TD>Szczegóły zamówienia.</TD>
<TD>Czas złożenia zamówienia</TD>
<TD>Status zamówienia.</TD>
<TD>Szczegóły.</TD>
<TD>Cena</TD>
</TR>\n";

$sql = mysqli_query ($link , "SELECT * FROM zamowienia WHERE klient='$user' ") or die("blad zapytania");

while ($wiersz = mysqli_fetch_array ($sql))
{      
  $nP = $wiersz['produkt'];


  print "<TR>
  <TD>$nP</TD>
  
  </TR>\n";
}
print "</TABLE>";
*/
?>


</table>
</body>
</html>
<?php
}
else{
  echo "błąd logowania";
  echo "<a href='http://www.lukasz-zdunowski.com.pl/pizbd'>Powrót.</a>";
}
?>