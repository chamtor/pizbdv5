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

</form>
</body>
</html>