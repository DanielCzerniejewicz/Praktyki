<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $base="obiady";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel Admina</title>
    <link rel="stylesheet" href="style_panel.css">
</head>
<body>
<div id="srodek">
    <form method="POST">
        <?php echo '<input type="button" value="Usuń dania z menu" onClick="location.href=\'usuwanie_menu.php\'">' ?>
        <?php echo '<input type="button" value="Dodaj dania do menu" onClick="location.href=\'dodaj_menu.php\'">' ?>

    </form>
</div>
</body>
</html>

