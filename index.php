<!DOCTYPE html>
<html>
<head>
    <title>Logowanie</title>
    <link rel="stylesheet" href="style_index.css">
</head>
<body>
<form method="POST" id="skibidi">
    <input type="text" placeholder="Podaj Login" name="Login" required> <br>
    <input type="password" placeholder="Podaj Haslo" name="Haslo" required> <br>
    <input type="submit" value="Loguj!">
</form>
</body>
</html>

<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['Login'];
        $haslo = $_POST['Haslo'];

        if (!empty($login) && !empty($haslo) && isset($login, $haslo)) {
            $server = "localhost";
            $user = "root";
            $pass = "";
            $base = "obiady";

            $conn = new mysqli($server, $user, $pass, $base);

            if ($conn->connect_error) {
                die("Połączenie siadło: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM `ludzie` WHERE ludzie.Imie = '$login' and ludzie.Haslo = '$haslo'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['user_id'] = $row['ID_Usera'];
                header('Location: glowna.php');
                exit();
            } else {
                echo "Błędny login lub hasło!";
            }

            $conn->close();
        }
    }
?>
