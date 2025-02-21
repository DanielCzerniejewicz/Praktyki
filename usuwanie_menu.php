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

function CzyszczeniePosiłków()
{
    $server = "localhost";
    $user = "root";
    $pass = "";
    $base = "obiady";
    $conn = new mysqli($server, $user, $pass, $base);

    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych");
    }

    if (isset($_POST['potrawy'])) {
        $input = $_POST['potrawy'];
        $query = "DELETE FROM `posilki` WHERE Nr_Wyboru LIKE '$input';";

        if ($conn->query($query) === TRUE) {
            echo "Danie zostało usunięte.";
            header("Refresh:2; url=panel.php");
            exit;
        } else {
            echo "Błąd: " . $conn->error;
        }
    }

    WypiszDania();

    echo "
        ";

    $conn->close();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel Admina</title>
    <link rel="stylesheet" href="style_dania.css">
</head>
<body>
    <div id="menu_dania_dodaj">
        <p>Wpisz ID dania do usunięcia! </p> <br>
            <?php
            CzyszczeniePosiłków();
            ?>
        <form method='post' id="formularz_jeden">
            <input type='number' name='potrawy' min='1' required>
            <input type='submit' value='Usuń'>
        </form>
    </div>
</body>
</html>
