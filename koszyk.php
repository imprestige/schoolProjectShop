<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <link rel="stylesheet" href="koszykStyle.css">
</head>
<body>
    <a href="index.php" id="wroc">Wróć do sklepu</a>
    <main>
        <h3>Twój koszyk: </h3>
        <hr style="width: 100%;">
        <div id="conteinerKoszyk">
        <?php
            session_start();
            $session_id = $_SESSION['user_id'];
            $polaczenie = mysqli_connect('localhost', 'root', '', 'sklep_im');

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']) && isset($_POST['produkt_id'])) {
                $produkt_id = $_POST['produkt_id'];
                $delete_query = "DELETE FROM koszyk WHERE user_id = '$session_id' AND produkt_id = '$produkt_id' LIMIT 1";
                mysqli_query($polaczenie, $delete_query);
            }

            $zapytanie = "
                SELECT towary.image, towary.nazwa, towary.cena, towary.id
                FROM koszyk 
                JOIN towary ON koszyk.produkt_id = towary.id 
                WHERE koszyk.user_id = '$session_id'
            ";
            $wynik = mysqli_query($polaczenie, $zapytanie);

            while ($wiersz = mysqli_fetch_array($wynik)) {
                $image = $wiersz['image'];
                $nazwa = $wiersz['nazwa'];
                $cena = $wiersz['cena'];
                $produkt_id = $wiersz['id'];
            
                echo "<div class='koszykElement'>";
                echo "<img src='$image'>";
                echo "<h4>$nazwa</h4>";
                echo "<p>$cena zł</p>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='produkt_id' value='$produkt_id'>";
                echo "<button type='submit' name='delete'>X</button>";
                echo "</form>";
                echo "</div>";
            }

            mysqli_close($polaczenie);
        ?>

        </div>
    </main>

    <aside>
        <button onclick="randomTeleort()" id="kup">Kup</button>
    </aside>
    <script>
        function randomTeleort() {
            let kup = document.getElementById("kup")
            let randomTop = Math.floor(Math.random() * 600);
            let randomLeft = Math.floor(Math.random() * 300);
            kup.style.marginTop = randomTop + "px";
            kup.style.marginLeft = randomLeft + "px";
        }
    </script>
</body>
</html>