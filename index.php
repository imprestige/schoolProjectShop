<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Sklep</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
          <?php
               session_start();
               if (isset($_POST["logout"])) {
                   $_SESSION["user"] = null;
                   $_SESSION["user_id"] = null;
                   header("Location: index.php");
                   exit();
          }
          
          ?>
     <header>
          <?php
          ?>
          <div id="ConteinerConteirnes">
          <div id="Witamy">
          <?php
               $miesiac=2592000+time();
               setcookie("wizyta",date("F jS - g:ia"),$miesiac);
          ?>

          <?php
            if(isset($_COOKIE['wizyta'])){
              $ostatnia=$_COOKIE['wizyta'];
              echo "<h3>Witamy ponownie!<br>Ostani raz odwiedziłeś nas: ".$ostatnia."</h3>";
            }
            else{
              echo "<h3>Witamy na naszej stronie!</h3>";
            }
          ?>
          </div>
          <div id="conteiner">


                    <?php

                    if (isset($_SESSION["user"])) {
                        echo "
                         <a href='koszyk.php'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bag' viewBox='0 0 16 16'>
                         <path d='M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z'/>
                         </svg></a>
                         <div id='youAreLogged'>
                              Witamy, <strong>".htmlspecialchars($_SESSION["user"]). "</strong>!
                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>
                              <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z'/>
                              </svg>
                              </div>
                              <form method='post'><button id='logout' type='submit' name='logout' title='logout'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-right' viewBox='0 0 16 16'>
                              <path fill-rule='evenodd' d='M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z'/>
                              <path fill-rule='evenodd' d='M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z'/>
                              </svg></button></form>
                        
                        ";
                    }
                    else{
                         echo "
                                   <a href='login.php'><div id='login'>Log-in</div></a>
                                   <a href='register.php'><div id='reg'>Sing-in</div></a>
                         ";
                    }
                    ?>
                    <?php
                         if(isset($_POST["logout"])){
                              $_SESSION["user"] = null;
                         }
                         if(isset($_POST["add1"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                              $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('1', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 1
                              ");
                         }
                              if(isset($_POST["add2"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('2', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 2
                              ");
                         }
                              if(isset($_POST["add3"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('3', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 3
                              ");
                         }
                              if(isset($_POST["add4"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('4', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 4
                              ");
                         }
                              if(isset($_POST["add5"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('5', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 5
                              ");
                         }
                              if(isset($_POST["add6"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('6', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 6
                              ");
                         }
                              if(isset($_POST["add7"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('7', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 7
                              ");
                         }
                              if(isset($_POST["add8"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('8', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 8
                              ");
                         }
                              if(isset($_POST["add9"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('9', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 9
                              ");
                         }
                              if(isset($_POST["add10"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('10', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 10
                              ");
                         }
                              if(isset($_POST["add11"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('11', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 11
                              ");
                         }
                              if(isset($_POST["add12"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('12', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 12
                              ");
                         }
                              if(isset($_POST["add13"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('13', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 13
                              ");
                         }
                              if(isset($_POST["add14"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('14', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 14
                              ");
                         }
                              if(isset($_POST["add15"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('15', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 15
                              ");
                         }
                              if(isset($_POST["add16"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('16', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 16
                              ");
                         }
                              if(isset($_POST["add17"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('17', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 17
                              ");
                         }
                              if(isset($_POST["add18"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('18', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 18
                              ");
                         }
                              if(isset($_POST["add19"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('19', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 19
                              ");
                         }
                              if(isset($_POST["add20"])) {
                              $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                              if (!$poloczenie) {
                                   die("Błąd połączenia: " . mysqli_connect_error());
                              }
                                                            $user_id = $_SESSION['user_id'];
                              $wynnik = mysqli_query($poloczenie, "INSERT INTO koszyk(produkt_id,user_id) VALUES ('20', '$user_id')");
                              $wynik = mysqli_query($poloczenie, "
                              UPDATE towary SET iloscOdwiedzen = iloscOdwiedzen + 1 WHERE id = 20
                              ");
                         }
                         
                    ?>

          </div>
          </div>
     </header>
     <aside>
          <h3>Najczęsciej odwiedzane towary:</h3>
              <div class="najczesciej">
                    <?php
                    $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');
                    if (!$poloczenie) {
                        die("Błąd połączenia: " . mysqli_connect_error());
                    }
               
                    $wynik = mysqli_query($poloczenie, "
                        SELECT id, image, nazwa, cena, iloscOdwiedzen 
                        FROM towary 
                        ORDER BY iloscOdwiedzen DESC 
                        LIMIT 2
                    ");
               
                    while ($wiersz = mysqli_fetch_row($wynik)) {
                        echo "<div class='towar'>";
                        echo "<img src='$wiersz[1]'>";
                        echo "<h4> $wiersz[2] </h4>";
                        echo "<p>$wiersz[3] zł </p>";
                        echo "<p>odwiedzono: $wiersz[4] razy</p>";
                        if (isset($_SESSION["user"])) {
                              echo "<form method='post'>";
                              echo "<button type='submit' name='add$wiersz[0]' class='activeCart'>Dodaj do koszyka <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
                              <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z'/>
                              <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0'/>
                              </svg></button>";
                              echo "</form>";
                        }
                        else{
                              echo "<div class='nonActiveCart' title='Aby dodać do koszyka, zaloguj się'>Dodaj do koszyka <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
                              <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z'/>
                              <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0'/>
                              </svg></div>";
                        }
                        echo "</div>";
                    }
                    ?>
               </div>
     </aside>
     <main>
          <br><br><br>
          <div class="wrapper">
               <button class="scrollBtnLeft" onclick="scrollContainer('towary1', 'left')"><</button>
               <div id="towarConteiner1">
                    <div id="towary1">
                    <?php
                    $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');

                    if (!$poloczenie) {
                        die("Błąd połączenia: " . mysqli_connect_error());
                    }
               
                    $wynik = mysqli_query($poloczenie, "
                        SELECT id, image, nazwa, cena
                        FROM towary
                        WHERE id <= 10
                    ");
               
                    while ($wiersz = mysqli_fetch_row($wynik)) {
                        echo "<div class='towar'>";
                        echo "<img src='$wiersz[1]'>";
                        echo "<h4> $wiersz[2] </h4>";
                        echo "<p>$wiersz[3] zł</p>";
                        if (isset($_SESSION["user"])) {
                              echo "<form method='post'>";
                              echo "<button type='submit' name='add$wiersz[0]' class='activeCart'>Dodaj do koszyka <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
                              <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z'/>
                              <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0'/>
                              </svg></button>";
                              echo "</form>";
                        }
                        else{
                              echo "<div class='nonActiveCart' title='Aby dodać do koszyka, zaloguj się'>Dodaj do koszyka <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
                              <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z'/>
                              <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0'/>
                              </svg></div>";
                        }
                        echo "</div>";
                    }
               
                    mysqli_close($poloczenie);
                    ?>
                    </div>
               </div>
               <button class="scrollBtnRight" onclick="scrollContainer('towary1', 'right')">></button>
          </div>
          <br><br><br>
          <div class="wrapper">
               <button class="scrollBtnLeft" onclick="scrollContainer('towary2', 'left')"><</button>
               <div id="towarConteiner2">
                    <div id="towary2">
                                        <?php
                    $poloczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');

                    if (!$poloczenie) {
                        die("Błąd połączenia: " . mysqli_connect_error());
                    }
               
                    $wynik = mysqli_query($poloczenie, "
                        SELECT id, image, nazwa, cena
                        FROM towary
                        WHERE id > 10
                    ");
               
                    while ($wiersz = mysqli_fetch_row($wynik)) {
                        echo "<div class='towar'>";
                        echo "<img src='$wiersz[1]'>";
                        echo "<h4> $wiersz[2] </h4>";
                        echo "<p>$wiersz[3] zł</p>";
                        if (isset($_SESSION["user"])) {
                              echo "<form method='post'>";
                              echo "<button type='submit' name='add$wiersz[0]' class='activeCart'>Dodaj do koszyka <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
                              <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z'/>
                              <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0'/>
                              </svg></button>";
                              echo "</form>";
                        }
                        else{
                              echo "<div class='nonActiveCart' title='Aby dodać do koszyka, zaloguj się'>Dodaj do koszyka <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
                              <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z'/>
                              <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0'/>
                              </svg></div>";
                        }
                        echo "</div>";
                    }
               
                    mysqli_close($poloczenie);
                    ?>
                    </div>
               </div>
               <button class="scrollBtnRight" onclick="scrollContainer('towary2', 'right')">></button>
          </div>
          <script>
               function scrollContainer(containerId, direction) {
                   const element = document.getElementById(containerId);
                   const step = 200;
                   const maxLeft = 0;
                   const minLeft = -1050;
               
                   let currentMargin = parseInt(window.getComputedStyle(element).marginLeft) || 0;
               
                   if (direction === 'left') {
                       let newMargin = Math.min(currentMargin + step, maxLeft);
                       element.style.marginLeft = newMargin + "px";
                   } else if (direction === 'right') {
                       let newMargin = Math.max(currentMargin - step, minLeft);
                       element.style.marginLeft = newMargin + "px";
                   }
               }
               let container = document.getElementById("towary1");
               localStorage.setItem("towary1_margin", container.style.marginLeft);

               window.addEventListener("DOMContentLoaded", function() {
               let container = document.getElementById("towary1");
               let savedMargin = localStorage.getItem("towary1_margin");
               if (savedMargin) {
                    container.style.marginLeft = savedMargin;
               }
               });


          </script>


     </main>
     <footer>
          
     </footer>
</body>
</html>