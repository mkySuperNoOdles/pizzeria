<body>
    <h1>Vogels in deze kooi:</h1>
    <h2>Man: </h2>
    <?php
    foreach ($vogels as $vogel) {
        if ($vogel->getGeslacht() === 'Man')
        {
            echo ($vogel->getRingnummer());
        }
    }
    ?>
    <h2>Vrouw: </h2>
    <?php
    foreach ($vogels as $vogel) {
        if ($vogel->getGeslacht() === 'Vrouw')
        {
            echo ($vogel->getRingnummer());
        }
    }
    ?>
</body>