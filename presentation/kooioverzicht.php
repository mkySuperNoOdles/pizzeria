<?php
//presentation/kooioverzicht.php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kooi Overzicht</title>
</head>

<body>
    <h1>Kooi <?php echo($kooi->getId()); ?></h1>
    <h2>Soort vogel:</h2>
    <form action="selecteersoort.php" method="get"> <!-- Replace 'process.php' with the file you want to handle the form submission -->
        <label for="soortNaam">Soort naam:</label>
        <select name="id" id="soortNaam">
            <?php
            foreach ($soortLijst as $soort) {
                echo "<option value=\"{$soort->getId()}\">{$soort->getNaam()}</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Kies Soort">
    </form>
</body>

</html>