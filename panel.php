<!DOCTYPE html>
<html>
<head>
    <title>Panel Admina</title>
    <link rel="stylesheet" href="style_panel.css">
</head>
<body>
<div id="pasek">
    <p id="forcom"><i id="f1"><b>For</b></i><i id="f2">com</i></p>
    <?php
    echo '<input type="button" value="Powrót" id="admin_button" onClick="location.href=\'glowna.php\'">';
    ?>


</div>
<div id="srodek">
    <form method="POST">
        <?php echo '<input type="button" value="Usuń dania z menu" id="lg" onClick="location.href=\'usuwanie_menu.php\'">' ?>
        <?php echo '<input type="button" value="Dodaj dania do menu" id="pg" onClick="location.href=\'dodaj_menu.php\'">' ?>
        <?php echo '<input type="button" value="Dodaj usera" id="ld" onClick="location.href=\'add_user.php\'">' ?>
        <?php echo '<input type="button" value="Usuń usera" id="pd" onClick="location.href=\'remove_user.php\'">' ?>
    </form>
</div>
</body>
</html>
