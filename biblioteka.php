<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Biblioteka Publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="banner"><h1>Biblioteka w Książkowicach Wielkich</h1></div>
    <div id="main">
        <div id="lewy">
            <h3>Polecamy Dzieła Autorów: </h3>
            <?php
            $server = 'localhost';
            $user = 'root';
            $pass = '';
            $base = 'biblioteka';
            $conn = new mysqli($server, $user, $pass, $base);

            $query = "SELECT imie,nazwisko FROM `autorzy`;";
            echo "<ol>";
            if($wynik=$conn->query($query))
                while($row=$wynik->fetch_array())
                    echo "<li>".$row["imie"]." ".$row["nazwisko"]."</li>";
            echo "</ol>";
            ?>
        </div>
        <div id="srodkowy">
            <h3>ul. Czytelnicza 25, Książkowice Wielkie</h3>
            <br>
            <p><a href="mailto:sekretariat@biblioteka.pl">Napisz do nas</a></p>
            <br>
            <img src="biblioteka.png" alt="ksiazki">
        </div>
        <div id="prawy">
            <div id="gora">
                <form method="post">
                    Imię :&nbsp;<input type="text" name="imie"> <br>
                    Nazwisko :&nbsp;<input type="text" name="nazwisko"> <br>
                    Numer :&nbsp;<input type="number" name="kod"> <br>
                    <input type="submit" value="DODAJ">
                </form>
            </div>
            <div id="dol">
                <?php
                $imie = isset($_POST['imie']) ? $_POST['imie'] : '';
                $nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : '';
                $kod = isset($_POST['kod']) ? $_POST['kod'] : '';

                $server = 'localhost';
                $user = 'root';
                $pass = '';
                $base = 'biblioteka';
                $conn = new mysqli($server, $user, $pass, $base);

                $query = "INSERT INTO czytelnicy (imie,nazwisko,kod) VALUES ('${imie}','${nazwisko}',${kod});";
                if(!empty($imie) && !empty($nazwisko) && !empty($kod)) {
                    if($conn->query($query))
                        echo "User ${imie} ${nazwisko} dodany";
                }
                ?>
            </div>
        </div>

    </div>
    <footer>AUTOR : 0000000</footer>
</body>
</html>