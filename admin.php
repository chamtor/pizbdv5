<?php
session_start();
    $link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj' ,'zaq12wsx', '25509958_proj');    //łączymy sie z bazą danych

    if(isset($_SESSION['loggedAdmin'])){

        ?>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Zdunowski-Admin</title>
            <link href="style.css" rel="stylesheet">
        </head>
        <body>
            <p1>Witaj adminie!</p>
            <p><a href="logout.php">Logout</a></p>
            <form method="post">
                <input type='submit' name='przycisk' value="Dodaj nowy produkt"><br>
                <input type="submit" name="przycisk" value="Przeglądaj zamówienie klientów"><br>
                <input type="submit" name="przycisk" value="Usuń produkt."><br>

            </form>



            <?php
    if(isset($_POST['przycisk'])){        														//jeśli wciśnięto przycisk
        echo "<form method='post'>";
        switch($_POST['przycisk']){






        case "Dodaj nowy produkt":{//i jeśli wciśnięto "dodaj nowego pracownika" to
            echo "<p>Dodaj nowy produkt!</p>";											//komunikat
            echo "<input type='hidden' name='stanowisko' value='Dodaj nowy produkt'>"; 

            ?>
            <p> Kategoria:</p>
            <select name="produkt">
                <option value="Czapki" size="40" >Czapki</option>
                <option value="Rękawiczki" size="40" >Rękawiczki</option>
                <option value="Szale" size="40" >Szale</option>
                <option value="Skarpety" size="40" >Skarpety</option>
            </select>
            
            <?php
          /*  echo "<p>Kategoria:";
            echo "<select name='produkt>";
            echo "<option value='1'>Czapki</option>";
            echo "<option value='2'>Rękawiczki</option>";
            echo " </select>";
            */

            echo "<p>Produkt: </p><input type='text' name='prod' maxlength='40' required>";
            echo "<p>Ilość: </p><input type='int' name='ilosc' maxlength='40' required>";
            echo "<p>Cena za sztuke: </p><input type='double' name='cena' maxlength='40' required>";

            echo "<input type='submit' name='dodaj' value='Dodaj'>";
            echo "</form>";
            break;
        }
        case "Przeglądaj zamówienie klientów":{												//natomiast jeśli wciśnięto "dodaj nowego szkoleniowca" to
            echo "<p>Przeglądaj zamówienie klientów</p>";											//komunikat


            $result = mysqli_query($link, "SELECT * FROM klient");
            print "<TABLE CELLPADDING=5 BORDER=1>";
            print "<TR><TD>ID</TD><TD>Login</TD><TD>adres</TD><TD>Zamowienie</TD><TD>Ilosc</TD></TR>\n";

            while ($wiersz = mysqli_fetch_array($result))
            {
                $id = $wiersz['id'];
                $login = $wiersz['login'];
                $adres = $wiersz['adres'];


                print "<TR><TD>$id</TD><TD>$login</TD><TD>$adres</TD></TR>\n";   
            } 
            print "</TABLE>" ;
            break;
        }

        
        case "Usuń produkt.":{
           echo "<p>Usuń produkt</p>";

           $result = mysqli_query($link, "SELECT * FROM klient");
           print "<TABLE CELLPADDING=5 BORDER=1>";
           print "<TR><TD>ID</TD><TD>Login</TD><TD>adres</TD><TD>Zamowienie</TD><TD>Ilosc</TD></TR>\n";
           $delete = "asdad";
           while ($wiersz = mysqli_fetch_array($result))
           {
            $id = $wiersz['id'];
            $login = $wiersz['login'];
            $adres = $wiersz['adres'];
            $usubProdukt = $delete;
            $ilosc = $wiersz['ilosc'];


            print "<TR><TD>$id</TD><TD>$login</TD><TD>$adres</TD><TD>$usubProdukt</TD><TD?$ilosc</TD></TR>\n";   
        } 
        print "</TABLE>" ;



        break;
    }
}
}



?>
<br/>
<br/>
<!--<p>Produkt: </p><input type="text" name="login" maxlength="40" required>
<p>Ilość: </p><input type="int" name="haslo" maxlength="40" required>
<p>Imię: </p><input type="text" name="imie" maxlength="40" >
<p>Nazwisko: </p><input type="text" name="nazwisko" maxlength="40" ><br>
<input type="submit" name="dodaj" value="Dodaj">
</form>
-->

<br/>
<br/>
<?php
        if(isset($_POST['dodaj'])){																	//jeśli wciśnięto "dodaj"
        if($link != null){
            $il = $_POST['ilosc'];
            $pr = $_POST['prod'];
            $cen = $_POST['cena'];
            $kat = $_POST['produkt'];


            $zap = "SELECT * FROM produkty WHERE nazwa='$pr'";
            $wynik = mysqli_query($link, $zap);		

            if($wynik){																			
                echo "<p>Udało się dodać produkt!</p>";
                $zap = "INSERT INTO produkty (nazwa,ilosc,cena,Kategoria) VALUES('$pr','$il','$cen','$kat')";
                $wynik = mysqli_query($link, $zap);     
            }
            else{

                echo "<p>Produkt juz istnieje - zaktualizowana ilość.</p>";
                $zap = "UPDATE produkty SET ilosc = ilosc + '$il' WHERE nazwa = '$pr'";
                $wynik = mysqli_query($link, $zap);

            } 
            mysqli_close($link);
        }
    }


     /*   $result = mysqli_query($link, "SELECT * FROM klient");

        while ($wiersz = mysqli_fetch_array($result))
        {
            $login = $wiersz['login'];
            $adres = $wiersz['adres'];

            echo "login:  ".$login."<br>";
            echo "Adres:  ".$adres."<br>";
        }*/

        ?>      
    </body>
    </html>

    <?php
}else{
   echo "Nie jesteś zalogowany!!";
   echo "<br/>";
   echo "<a href='http://www.lukasz-zdunowski.com.pl/pizbd/''>Powrót na główną strone.</a>";

}
?>
