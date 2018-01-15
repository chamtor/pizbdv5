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

<ul>
    <li><a href="http://www.lukasz-zdunowski.com.pl/pizbd/index.php">Start</a></li>
    <li style="float:right"><a href="http://www.lukasz-zdunowski.com.pl/pizbd/admin/logout.php">Wyloguj</a></li>
    
</ul>

	<br>
	<p1>Witaj adminie!</p>
	<form method="post">
	<input type='submit' name='przycisk' value="Dodaj nowy produkt"><br><br>
	<input type="submit" name="przycisk" value="Przeglądaj zamówienie klientów"><br><br>
	<input type="submit" name="przycisk" value="Edycja ceny"><br><br>
	<input type="submit" name="przycisk" value="Usuń produkt"><br><br>
	</form>



	<?php
	if(isset($_POST['przycisk'])){        														//jeśli wciśnięto przycisk
		echo "<form method='post'>";
		switch($_POST['przycisk']){

		case "Dodaj nowy produkt":{   					//i jeśli wciśnięto "dodaj nowego pracownika" to
				echo "<p>Dodaj nowy produkt!</p>";											//komunikat
				echo "<input type='hidden' name='stanowisko' value='Dodaj nowy produkt'>"; 

				?>
				<p> Kategoria:</p>
				<select name="produkt">
				<option value="Napoje" size="40" >Napoje</option>
				<option value="Nabiał" size="40" >Nabiał</option>
				<option value="Jedzenie" size="40" >Jedzenie</option>
				<option value="asd" size="40" >asd</option>
				</select>
	
				<?php
			/*
			echo "<p>Kategoria:";
			echo "<select name='produkt>";
			echo "<option value='1'>Czapki</option>";
			echo "<option value='2'>Rękawiczki</option>";
			echo " </select>";
			*/
				echo "<p>Produkt: </p><input type='text' name='prod' maxlength='40' required>";
				echo "<p>Ilość: </p><input type='number' name='ilosc' maxlength='40' required>";
				echo "<p>Cena za sztuke: </p><input type='number' step='0.01' name='cena' maxlength='40' required>"."<br>";
				echo "<input type='submit' name='dodaj' value='Dodaj'>";
				echo "</form>";
				break;
			}
		case "Przeglądaj zamówienie klientów":{												//natomiast jeśli wciśnięto "dodaj nowego szkoleniowca" to
				echo "<p>Przeglądaj zamówienie klientów</p>";											//komunikat

				echo "<form method='POST' action='odpowiedz.php'>";
				echo " Podaj ID pytania:";
				echo "<input type='number' name='numerpytania' maxlength='100' size='50' required>";
				echo "<br><br>";
				echo "Zaznacz status zamówienia";
				echo <<<END
				<select id='mySelect' name='statusZamowienia'>";
			<option value='Oczekuje' size='40'  >Oczekuje.</option>;
			<option value='W trakcie realizacji.'' size='40' >W trakcie realizacji.</option>;
			<option value='Wyslano.'' size='40' >Wyslano.</option>;
			<option value='Dostarczono.'' size='40' >Dostarczono.</option><br>;
			</select>
			<br><br>
END;
			echo "Udziel odpowiedzi na wybrane pytanie:"; 
			echo "<input type='text' name='odpowiedz' maxlength='100' size='50' required>";
			echo "<br><br>";
			echo "<input type='submit' value='Odpowiedz'/>";
			echo "</form>";

			$result = mysqli_query($link, "SELECT * FROM zamowienia");
			print "<TABLE CELLPADDING=5 BORDER=1>";
			print "<TR><TD>ID</TD><TD>Zamawiający</TD><TD>adres</TD><TD>Zamowienie</TD><TD>Ilosc</TD></TR>\n";

			while ($wiersz = mysqli_fetch_array($result))
			{
				$id = $wiersz['id'];
				$login = $wiersz['login'];
				//$adres = $wiersz['adres'];
				$produkt = $wiersz['produkt']; 
				$ilosc = $wiersz['ilosc'];

				$adress = mysqli_query($link, "SELECT adres FROM klient WHERE login=$login");


				print "<TR><TD>$id</TD><TD>$login</TD><TD>$adress</TD><TD>$produkt</TD><TD>$ilosc</TD></TR>\n";   
			} 
			print "</TABLE>" ;
			break;
		}
		
		
		case "Edycja ceny":  //Edycja Ceny 
		echo "<p>Wybierz produkt a następnie podaj jego nową cene.</p>";

		$produkty = mysqli_query($link, "SELECT * FROM produkty");	

		
		if(mysqli_num_rows($produkty)){
			$select= '<select name="nameEdytuj">';
		while($rs=mysqli_fetch_array($produkty)){
			$select.='<option value="'.$rs['nazwa'].'" >'.$rs['nazwa'].'</option>';
			}
		}
		$select.='</select>';
		echo $select;
		
		echo "<p>Wprowadź nowa cene.</p>";
		echo "<p>Cena za sztuke: </p><input type='number' step='0.01' name='cena' maxlength='40' required>"."<br>";
		echo "<input type='submit' name='edytuj' value='Edytuj'>";
		echo "</form>";

		break;

		
		
		
		case "Usuń produkt":
		echo "<p>Który produkt chcesz usunąć?</p>";

		$ktoryDoUsuniecia = mysqli_query($link, "SELECT * FROM produkty ORDER BY nazwa");

		while ($wiersz = mysqli_fetch_array($ktoryDoUsuniecia))
		{

			echo "<form method='post'>";
			$id = $wiersz['nazwa'];
		// echo "<form method='post'>";
			//echo "<input type= 'checkbox' value='chebkBoxUsunProdukt'>".$id."</option>";
			echo "<input type='submit' name='sUsun' value='$id'>";
			echo "</form>";
		}
		break;
		
	
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
		$row_cnt = mysqli_num_rows($wynik);

		if($row_cnt > 0){																			
		echo "<p>Produkt juz istnieje - zaktualizowana ilość.</p>";
		$zap = "UPDATE produkty SET ilosc = ilosc + '$il' WHERE nazwa = '$pr'";
		$wynik = mysqli_query($link, $zap);
	}
	else{

	echo "<p>Udało się dodać produkt!</p>";
	$zap = "INSERT INTO produkty (nazwa,ilosc,cena,Kategoria) VALUES('$pr','$il','$cen','$kat')";
	$wynik = mysqli_query($link, $zap); 

} 
mysqli_close($link);
}
}


if(isset($_POST['edytuj'])){  //jeśli wciśnięto "edytuj"
	if($link != null){ 

		$produkt = $_POST['nameEdytuj'];
		$cena = $_POST['cena'];
		//echo $produkt;
		//echo $cena;
		$ktoryDoUsuniecia = mysqli_query($link, "UPDATE produkty SET cena='$cena' WHERE nazwa='$produkt'") or die("blad zapytania");
		echo "Cena zaktualizowana";
	}
}




if(isset($_POST['sUsun'])){   //jeśli wciśnięto "usun"
	if($link != null){ 

		$produkt = $_POST['sUsun'];
		$ktoryDoUsuniecia = mysqli_query($link, "DELETE FROM produkty WHERE nazwa='$produkt'") or die("blad zapytania");

	  echo "Produkt ".$produkt." został usunięty.";
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
