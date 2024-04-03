<?php
//presentation/kooienlijst.php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kooien</title>
</head>

<body>
    <h1>Selecteer een kooinummer</h1>
    <form action="processapp.php" method="get"> <!-- Replace 'process.php' with the file you want to handle the form submission -->
        <label for="kooiNummer">Kooinummer:</label>
        <select name="kooiId" id="kooiNummer">
            <?php
            foreach ($kooienLijst as $kooi) {
                echo "<option value=\"{$kooi->getId()}\">{$kooi->getKooiNummer()}</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Toon Kooi">
    </form>
</body>

</html>