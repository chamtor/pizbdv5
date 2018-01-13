<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
    <meta http-equiv="refresh" content="1000" /> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Zdunowski</title>

    
</head>

<body>

<ul>
    <li><a href="http://www.lukasz-zdunowski.com.pl/pizbd">Start</a></li>
    <li><a href="/produkty.php">Przegladaj produkty</a></li>
    <li><a href="http://www.lukasz-zdunowski.com.pl/pizbd/logowanie.php">Logowanie / Rejestracja</a></li>
    <!--<li><a href="#">Start</a></li>
    <li><a href="#">Start</a></li>
    <li><a href="#">Start</a></li>
-->

</ul>
<br>
    <h1> Produkty </h1><br>
   
<br>
<? 

    $link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj' ,'zaq12wsx', '25509958_proj'); // połączenie z BD – wpisać swoje parametry !!!
    if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
    mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków



    $result = mysqli_query($link, "SELECT * FROM produkty");


        print "<TABLE CELLPADDING=5 BORDER=1>";
        print "<TR><TD>Produkt</TD>
                   <TD>Ilość</TD>
                   <TD>Cena [zł]</TD>
                </TR>\n";
        
               
        while ($wiersz = mysqli_fetch_array ($result))
            { 
  
            $produkt = $wiersz ['nazwa'];
            $ilosc = $wiersz['ilosc'];
            $cena = $wiersz['cena'];
                
        
            
           print "<TR><TD>$produkt</TD><TD>$ilosc</TD><TD>$cena</TD></TR>\n";  
}
         print "</TABLE>" 

?>


</body>
</html>