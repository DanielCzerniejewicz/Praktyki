<?php
include "funkcje.php";
setlocale(LC_TIME, 'pl_PL.UTF-8');

$mysqli = new mysqli("localhost", "root", "", "obiady");

if ($mysqli->connect_error) {
    die("Połączenie z bazą danych nieudane: " . $mysqli->connect_error);
}

$daysOfWeek = ['Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek'];

$meals = [
    'Poniedziałek' => [],
    'Wtorek' => [],
    'Środa' => [],
    'Czwartek' => [],
    'Piątek' => []
];

$query = "SELECT posilki.Posilek, posilki.Dzien FROM posilki";
$result = $mysqli->query($query);

while ($row = $result->fetch_assoc()) {
    $date = $row['Dzien'];
    $obiad = $row['Posilek'];
    $datetime = DateTime::createFromFormat('Y-m-d', $date);

    if ($datetime === false) {
        continue;
    }

    $dayOfWeek = $datetime->format('l');
    $daysInPolish = [
        'Monday' => 'Poniedziałek',
        'Tuesday' => 'Wtorek',
        'Wednesday' => 'Środa',
        'Thursday' => 'Czwartek',
        'Friday' => 'Piątek'
    ];

    $polishDay = $daysInPolish[$dayOfWeek];

    if (array_key_exists($polishDay, $meals)) {
        $meals[$polishDay][] = $obiad;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = 1;

    $preferences = [];
    foreach ($daysOfWeek as $day) {
        if (isset($_POST[strtolower($day)])) {
            $preferences[$day] = $_POST[strtolower($day)];
        } else {
            $preferences[$day] = null;
        }
    }

    $stmt = $mysqli->prepare("INSERT INTO preferencje (ID_Usera, Preferencje, Dzien) VALUES (?, ?, NOW())");

    foreach ($preferences as $day => $meal) {
        $preference = $meal ? "$day: $meal" : "$day: Brak wyboru";
        $stmt->bind_param("is", $_SESSION['user_id'], $preference);
        $stmt->execute();
    }

    $stmt->close();
    echo "Preferencje zostały zapisane.";
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Obiady</title>
    <link rel="stylesheet" href="style_glowna.css">
</head>
<body>

<div id="pasek">
    <p id="forcom"><i id="f1"><b>For</b></i><i id="f2">com</i></p>
    <?php
    if(CzyAdmin() === TRUE)
    {
        echo '<input type="button" value="Zarzadzaj" id="admin_button" onClick="location.href=\'panel.php\'">';
    } ?>
</div>
<div id="strona">
    <div id="menu">
        <p id="menu_tekst">Menu na ten tydzien : </p> <br>

        <form method="POST" action="">
            <?php foreach ($daysOfWeek as $day) : ?>
                <div id="<?php echo $day; ?>">
                    <strong><?php echo $day; ?>:</strong>
                    <?php
                    if (count($meals[$day]) > 0) {
                        foreach ($meals[$day] as $meal) {
                            echo "<br>";
                            echo "<input type='radio' name='" . strtolower($day) . "' value='" . $meal . "'>" . $meal . "<br>";
                        }
                    } else {
                        echo "Brak posiłków na ten dzień.";
                    }
                    ?>
                </div>
            <?php endforeach; ?>
            <input type="submit" value="Złóż Zamówienie" id="zamowienia_button">
        </form>
    </div>
</div>
</body>
</html>
