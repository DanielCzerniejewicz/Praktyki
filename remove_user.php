<?php
    function PokazUzytkownikow()
    {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $base = "obiady";
        $con = new mysqli($server, $user, $pass, $base);

        $zapytanie = "SELECT ludzie.ID_Usera,ludzie.Imie,ludzie.Nazwisko,ludzie.Haslo FROM `ludzie`;";
        if($wynik=$con->query($zapytanie))
            while($row=$wynik->fetch_array())
                echo "<p>".$row["ID_Usera"]." ".$row["Imie"]." ".$row["Nazwisko"]." ".$row["Haslo"]."</p>"."<br>";
        else
            echo $con->errno." ". $con->error;
        $con->close();
    }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    if(!empty($id) && isset($id)) {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $base = "obiady";

        $conn = new mysqli($server, $user, $pass, $base);

        if ($conn->connect_error) {
            die("Połączenie siadło: " . $conn->connect_error);
        }

        $conn->begin_transaction();

        try {

            $sql1 = "DELETE FROM rangi WHERE ID_Usera = '$id'";
            if ($conn->query($sql1) === TRUE) {
                $sql2 = "DELETE FROM Ludzie WHERE ID_Usera = '$id'";
                if ($conn->query($sql2) === TRUE) {
                    $conn->commit();
                    echo "Usunięto użytkownika.";
                    header("Refresh:2; url=panel.php");
                    exit();
                } else {
                    throw new Exception("Błąd przy usuwaniu z tabeli Ludzie: " . $conn->error);
                }
            } else {
                throw new Exception("Błąd przy usuwaniu z tabeli rangi: " . $conn->error);
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo $e->getMessage();
        }

        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Usuń Usera</title>
    <link rel="stylesheet" href="style_user.css">
</head>
<body>
    <div id="menu_user_dodaj">
        <?php
        PokazUzytkownikow();
        ?>
        <form method="POST" id="formularz_user_dodaj">
            <input type="number" name="id" placeholder="Podaj ID do usunięcia" required min="1"> <br>
            <input type="submit" value="Usuń Usera">
        </form>
    </div>
</body>
</html>
