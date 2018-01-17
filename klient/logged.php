<?php
session_start();
?>
<?php
if((isset($_SESSION['loggedKlient'])) && ($_SESSION['loggedKlient']==true))
{
  $link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_proj' ,'zaq12wsx', '25509958_proj'); // połączenie z BD – wpisać swoje parametry !!!
  if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
  } // obsługa błędu połączenia z BD
  mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
<<<<<<< HEAD
<<<<<<< HEAD
  $user= $_SESSION['uzytkownik'];
=======
/*  $user= $_SESSION['uzytkownik'];
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
=======
/*  $user= $_SESSION['uzytkownik'];
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
  $iNaz = $item["nazwa"];
  $iCod = $item["code"];
  $iIlo = $item["ilosc"];
  $iCen = $item["cena"];
<<<<<<< HEAD
<<<<<<< HEAD

=======
*/
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
=======
*/
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c

  require_once("dbcontroller.php");
  $db_handle = new DBController();
  if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
      case "add":
      if(!empty($_POST["ilosc"])) {
        $productByCode = $db_handle->runQuery("SELECT * FROM produkty WHERE code='" . $_GET["code"] . "'");

        $itemArray = array($productByCode[0]["code"]=>array('nazwa'=>$productByCode[0]["nazwa"],
          'code'=>$productByCode[0]["code"], 
          'ilosc'=>$_POST["ilosc"], 
          'cena'=>$productByCode[0]["cena"]));

        if(!empty($_SESSION["cart_item"])) {
          if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
            foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["ilosc"])) {
                  $_SESSION["cart_item"][$k]["ilosc"] = 0;
                }
                $_SESSION["cart_item"][$k]["ilosc"] += $_POST["ilosc"];
              }
            }
          } else {
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
          }
        } else {
          $_SESSION["cart_item"] = $itemArray;
        }

<<<<<<< HEAD
<<<<<<< HEAD
      }
=======
      }        //$zakupDoBazy = mysqli_query($link, "INSERT INTO zamowienia (produkt, ilosc, cena) VALUES ('$iNaz', '$iIlo', '$iCen')") or die("blad zapytania");
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
=======
      }        //$zakupDoBazy = mysqli_query($link, "INSERT INTO zamowienia (produkt, ilosc, cena) VALUES ('$iNaz', '$iIlo', '$iCen')") or die("blad zapytania");
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c

      break;

      case "remove":
      if(!empty($_SESSION["cart_item"])) {
        foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
        }
      }
      break;


      case "empty":
      unset($_SESSION["cart_item"]);
<<<<<<< HEAD
<<<<<<< HEAD


=======
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
=======
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
      break;
/*
      case "zatwierdzZakup":
      $adasdqwe132 = mysqli_query($link, "INSERT INTO zamowienia (produkt) VALUES ('$iNaz')") or die("blad zapytania");
      unset($_SESSION["cart_item"]);
*/
    }
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
      <input type='submit' name='przycisk' value="Status zamówienia."><br>
    </form>


<<<<<<< HEAD
<<<<<<< HEAD
    <?php


    if(isset($_POST['przycisk'])){
      echo "<form method='post'>";
      switch($_POST['przycisk']){

       case "Status zamówienia.":  
       $result = mysqli_query($link, "SELECT * FROM zamowienia WHERE login='$user'");
       print "<TABLE CELLPADDING=5 BORDER=1>";
       print "<TR><TD>Produkt</TD><TD>Ilość</TD><TD>Cena</TD><TD>Status</TD></TR>\n";

       while ($wiersz = mysqli_fetch_array($result))
       {
        $id = $wiersz['produkt'];
        $ilosc = $wiersz['ilosc'];
        $cena = $wiersz['cena'];
        $cenaTotal = $ilosc*$cena;
        $status = $wiersz['status'];



        print "<TR><TD>$id</TD><TD>$ilosc</TD><TD>$cenaTotal</TD><TD>$status</TD></TR>\n";   
      } 
      print "</TABLE>" ;
      break;

    }
  }
  ?>


  <div id="shopping-cart">
    <div class="txt-heading">Shopping Cart <a id="btnEmpty" href="logged.php?action=empty">Empty Cart</a></div>
    <?php
    if(isset($_SESSION["cart_item"])){
      $item_total = 0;
      ?>  
      <table cellpadding="10" cellspacing="1">
        <tbody>
          <tr>
            <th style="text-align:left;"><strong>Nazwa</strong></th>
            <th style="text-align:right;"><strong>Ilosc</strong></th>
            <th style="text-align:right;"><strong>Cena</strong></th>
            <th style="text-align:center;"><strong>Usuń</strong></th>
          </tr> 

          <?php   
          foreach ($_SESSION["cart_item"] as $item){
            ?>
            <form method="post" action="logged.php?action=zatwierdzZakup">

              <tr>
                <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["nazwa"]; ?></strong></td>
                <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["ilosc"]; ?></td>
                <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["cena"]." "."zł"; ?></td>
                <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="logged.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Usuń produkt</a></td>
              </tr>


              <?php

              $user= $_SESSION['uzytkownik'];
              $_SESSION['nazwa'] = $item["nazwa"];
              $_SESSION['ilosc'] = $item['ilosc'];
              $_SESSION['cena'] = $item['cena'];
=======
=======
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
    <div id="shopping-cart">
      <div class="txt-heading">Shopping Cart <a id="btnEmpty" href="logged.php?action=empty">Empty Cart</a></div>
      <?php
      if(isset($_SESSION["cart_item"])){
        $item_total = 0;
        ?>  
        <table cellpadding="10" cellspacing="1">
          <tbody>
            <tr>
              <th style="text-align:left;"><strong>Nazwa</strong></th>
              <th style="text-align:right;"><strong>Ilosc</strong></th>
              <th style="text-align:right;"><strong>Cena</strong></th>
              <th style="text-align:center;"><strong>Usuń</strong></th>
            </tr> 

            <?php   
            foreach ($_SESSION["cart_item"] as $item){
              ?>
              <form method="post" action="logged.php?action=zatwierdzZakup">

                <tr>
                  <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["nazwa"]; ?></strong></td>
                  <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["ilosc"]; ?></td>
                  <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["cena"]." "."zł"; ?></td>
                  <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="logged.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Usuń produkt</a></td>
                </tr>

                <?php
                $item_total += ($item["cena"]*$item["ilosc"]);
              }
              ?>


              <tr>
                <td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total."zł"; ?></td>
              </tr>
<<<<<<< HEAD
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c

              $item_total += ($item["cena"]*$item["ilosc"]);

             //   $adasdqwe132 = mysqli_query($link, "INSERT INTO zamowienia (login ,produkt, ilosc, cena) VALUES ('$user', '$naz1', '$ilo1','$cen1')") or die("blad zapytania");
            }
            ?>


            <tr>
              <td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total."zł"; ?></td>
            </tr>


=======
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c


          </tbody>
        </table>    
        <input type='submit' name='zatwZakup' value='Kupuje'>
      </form>

<<<<<<< HEAD
<<<<<<< HEAD
      <?php
    }
    ?>
  </div>
  <div id="product-grid">
    <div class="txt-heading">Produkty</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM produkty ORDER BY nazwa ASC");
    if (!empty($product_array)) { 
      foreach($product_array as $key=>$value){
        ?>
        <div class="product-item">
          <form method="post" action="logged.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
            <div><strong><?php echo $product_array[$key]["nazwa"]; ?></strong></div>
            <div class="product-price"><?php echo $product_array[$key]["cena"]."zł"; ?></div>
            <div><input type="text" name="ilosc" value="0" size="2" />
              <input type="submit" value="Add" class="btnAddAction" /></div>
            </form>
          </div>
          <?php
        }
      }
      ?>
    </div>

    <?php
=======
=======
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c

            </tbody>
          </table>    
          <input type='submit' name='zatwZakup' value='Kupuje'>
        </form>

        <?php
      }
      ?>
    </div>
    <div id="product-grid">
      <div class="txt-heading">Produkty</div>
      <?php
      $product_array = $db_handle->runQuery("SELECT * FROM produkty ORDER BY nazwa ASC");
      if (!empty($product_array)) { 
        foreach($product_array as $key=>$value){
          ?>
          <div class="product-item">
            <form method="post" action="logged.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
              <div><strong><?php echo $product_array[$key]["nazwa"]; ?></strong></div>
              <div class="product-price"><?php echo $product_array[$key]["cena"]."zł"; ?></div>
              <div><input type="text" name="ilosc" value="0" size="2" />
                <input type="submit" value="Add" class="btnAddAction" /></div>
              </form>
            </div>
            <?php
          }
        }
        ?>
      </div>

      <?php
<<<<<<< HEAD
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
=======
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
/*      echo $user;
      echo $item["nazwa"];
      echo $item["code"];
      echo $item["ilosc"];
      echo $item["cena"];
*/


          if(isset($_POST['zatwZakup'])){                                    //jeśli wciśnięto przycisk
            echo "<form method='post'>";
            switch($_POST['zatwZakup']){

<<<<<<< HEAD
<<<<<<< HEAD
              case "Kupuje":{
                $user= $_SESSION['uzytkownik'];
                $naz1 = $_SESSION['nazwa'];
                $ilo1 = $_SESSION['ilosc'];
                $cen1 = $_SESSION['cena'];

                $sql = mysqli_query($link, "SELECT * FROM zamowienia WHERE login='$user'") or die("blad");
                $row_cnt = mysqli_num_rows($sql);

                if($row_cnt>0){
                  $zap = mysqli_query($link, "UPDATE zamowienia SET ilosc= ilosc + '$ilo1' WHERE produkt = '$naz1") or die("blad");
                }else{
                  $adasdqwe132 = mysqli_query($link, "INSERT INTO zamowienia (login ,produkt, ilosc, cena) VALUES ('$user', '$naz1', '$ilo1','$cen1')") or die("blad zapytania");
                }
              }
              unset($_SESSION["cart_item"]);
              break;
            }
          }


=======
              case "Kupuje":

              $adasdqwe132 = mysqli_query($link, "INSERT INTO zamowienia (produkt) VALUES ('$iNaz')") or die("blad zapytania");
              unset($_SESSION["cart_item"]);

              break;
            }
          }
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
=======
              case "Kupuje":

              $adasdqwe132 = mysqli_query($link, "INSERT INTO zamowienia (produkt) VALUES ('$iNaz')") or die("blad zapytania");
              unset($_SESSION["cart_item"]);

              break;
            }
          }
>>>>>>> 27bff1281bed071dc823835e52727332be6c286c
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