<?php
session_start();
if((isset($_SESSION['loggedAdmin'])) && ($_SESSION['loggedAdmin']==true))
{
header('Location: admin.php');
}
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
    <li><a href="http://www.lukasz-zdunowski.com.pl/pizbd/">Start</a></li>
    <li><a href="./produkty.php">Przegladaj produkty</a></li>
    <li><a href="http://www.lukasz-zdunowski.com.pl/pizbd/logowanie.php">Logowanie / Rejestracja</a></li>
    <!--<li><a href="#">Start</a></li>
    <li><a href="#">Start</a></li>
    <li><a href="#">Start</a></li>
-->
</ul>

<h1> Zaloguj sie</h1>
 
<form method="POST" action="zaloguj.php">

  Login: <br/> <input type="text" name="login"> <br/>
  Haslo: <br/> <input type="Password" name="pass"> <br/>
  <input type="submit" value="Login"/> <br><br>

</form>
<?php
  if(isset($_SESSION['blad'])) {
    unset($_SESSION['zle']);
    echo $_SESSION['blad'];
  }
?>
  <br>
  <h1> Rejestracja</h1><br>
<form method="POST" action="register.php">

  Login: <br/> <input type="text" name="login"> <br/>
  Haslo: <br/> <input type="Password" name="pass"> <br>
  Powtórz Haslo: <br/> <input type="Password" name="pass"><br/>
  Adres: <br/> <input type="text" name="adres"><br/>


  
  <input type="submit" value="Register"/><br>
<?php
  if(isset($_SESSION['zle'])){
     echo $_SESSION['zle'];
  } 
  if(isset($_SESSION['utworzone'])){
     unset($_SESSION['blad']);
     unset($_SESSION['zle']);
     echo $_SESSION['utworzone']."<br>";
     echo $_SESSION['utworzone2'];
  }
  if(isset($_SESSION['istnieje'])){
    unset($_SESSION['zle']);
    unset($_SESSION['blad']);
    unset($_SESSION['utworzenie']);
    unset($_SESSION['utworzenie2']);
    echo $_SESSION['istnieje']."<br>";
  }
  if(isset($_SESSION['blad'])){
    unset($_SESSION['istnieje']);
    unset($_SESSION['blad']);
    unset($_SESSION['utworzenie']);
    unset($_SESSION['utworzenie2']);
    echo $_SESSION['blad'];
    session_unset();

  }
?>
<br>

</form>
</body>
</html>