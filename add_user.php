<?php
    session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dodaj Usera</title>
    <link rel="stylesheet" href="style_user.css">
</head>
<body>
    <div id="menu_user_dodaj">
        <form method="POST" id="formularz_user_dodaj">
            <input type="text" name="imie" placeholder="Imie" required> <br><br>
            <input type="text" name="nazwisko" placeholder="Nazwisko" required> <br><br>
            <input type="text" name="Haslo" placeholder="Haslo" required> <br><br>
            <select name="ranga" id="select_user_dodaj">
                <option>Pracownik</option>
                <option>Admin</option>
            </select>
            <br><br>
            <input type="submit" value="Utwórz Usera">
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $ranga = $_POST["ranga"];
    $haslo = $_POST["Haslo"];

    if(!empty($imie) && !empty($nazwisko) && isset($imie, $nazwisko)) {
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
            $sql = "INSERT INTO Ludzie (Imie, Nazwisko,Haslo) VALUES ('$imie', '$nazwisko','$haslo')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                $sql2 = "INSERT INTO rangi (ID_Usera, Ranga) VALUES ('$last_id', '$ranga')";
                if ($conn->query($sql2) === TRUE) {
                    $conn->commit();
                    echo"Dodano";
                    header("Refresh:2; url=panel.php");
                    exit();
                } else {
                    throw new Exception("Error: " . $sql2 . "<br>" . $conn->error);
                }
            } else {
                throw new Exception("Error: " . $sql . "<br>" . $conn->error);
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo $e->getMessage();
        }

        $conn->close();
    }
}
?>
