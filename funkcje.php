<?php include 'index.php' ?>
<?php
function CzyAdmin() {
    $sprawdzacz = false;
    $tab = [];
    $server = "localhost";
    $user = "root";
    $pass = "";
    $base = "obiady";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $con = new mysqli($server, $user, $pass, $base);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }


    $query = "SELECT * FROM `rangi` WHERE Ranga LIKE 'Admin';";

    if ($wynik = $con->query($query)) {
        while ($row = $wynik->fetch_assoc()) {
            $tab[] = $row["ID_Usera"];
        }
    }

    if (in_array($_SESSION['user_id'], $tab))
    {
        $sprawdzacz = TRUE;
    }
    $con->close();
    return $sprawdzacz;
}


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
                echo '<input type="checkbox" name="potrawy">'.$row["Nr_Wyboru"]." ".$row["Posilek"]." ".$row["Dzien"]."<br>";
        else
            echo $con->errno." ". $con->error;
        $con->close();
    }
?>
