<body>
    <h1>Selecteer een man en vrouw</h1>
    <form action="processapp.php" method="get"> <!-- Replace 'process.php' with the file you want to handle the form submission -->
        <input type="hidden" name="kooiId" value="<?php echo $kooiId; ?>">
        <input type="hidden" name="soortId" value="<?php echo $soortId; ?>">
        <label for="man">Man:</label>
        <select name="manVogelId" id="man">
            <?php
            foreach ($vogelLijstMannenPerSoort as $vogel) {
                echo "<option value=\"{$vogel->getId()}\">{$vogel->getRingnummer()}</option>";
            }
            ?>
        </select>
        <br><br>
        <label for="vrouw">Vrouw:</label>
        <select name="vrVogelId" id="vrouw">
            <?php
            foreach ($vogelLijstVrouwenPerSoort as $vogel) {
                echo "<option value=\"{$vogel->getId()}\">{$vogel->getRingnummer()}</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Maak Koppel">
    </form>
</body>