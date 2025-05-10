<?php
function WypiszDania()
{
    $server = "localhost";
    $user = "root";
    $pass = "";
    $base = "obiady";
    $con = new mysqli($server, $user, $pass, $base);

    $zapytanie = "SELECT posilki.Nr_Wyboru,posilki.Posilek,posilki.Dzien FROM `posilki`;";
    if($wynik=$con->query($zapytanie))
        while($row=$wynik->fetch_array())
            echo $row["Nr_Wyboru"]." ".$row["Posilek"]." ".$row["Dzien"]."<br>";
    else
        echo $con->errno." ". $con->error;
    $con->close();
}
    $server = "localhost";
    $user = "root";
    $pass = "";
    $base = "obiady";
    $conn = new mysqli($server, $user, $pass, $base);

    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych");
    }

    if (isset($_POST['potrawy']) and isset($_POST['data'])) {
        $input = $_POST['potrawy'];
        $data = $_POST['data'];
        $query = "INSERT INTO posilki(Posilek,Dzien) VALUES ('$input','$data') ";

        if ($conn->query($query) === TRUE) {
            echo "Danie zostało dodane.";
            header("Refresh:2; url=panel.php");
            exit;
        } else {
            echo "Błąd: " . $conn->error;
        }
    }

    $conn->close();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="style_dania.css">
        <title>Panel Admina</title>
    </head>
    <body>
        <div id="menu_dania_dodaj">
            <?php     WypiszDania(); ?>
            <form method='post' id="formularz_jeden">
<!--                Oddajcie f1 pls-->
                <input type='text' name='potrawy' placeholder='Nazwa Posiłku' required > <br>
                <input type='date' name='data' placeholder='Data' required> <br>
                <input type='submit' value='Dodaj'>

            </form>

        </div>
    </body>
    </html>

