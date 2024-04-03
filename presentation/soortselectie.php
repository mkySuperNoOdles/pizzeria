<?php
//presentation/soortselectie.php
declare(strict_types=1);
?>

<body>
    <h1>Kooi <?php echo ($kooiId); ?></h1>
    <h2>Soort vogel:</h2>
    <form action="processapp.php" method="get"> <!-- Replace 'process.php' with the file you want to handle the form submission -->
        <input type="hidden" name="kooiId" value="<?php echo $kooiId; ?>">
        <label for="soortNaam">Soort naam:</label>
        <select name="soortId" id="soortNaam">
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