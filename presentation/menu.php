<!-- presentation/menu.php -->
<div class="container">
    <div class="left-section">
        <!-- Menu Presentation Content -->
        <h2>Menu</h2>
        <form method="POST" action="index.php">
            <input type="hidden" name="action" value="add_to_cart">
            <?php foreach ($pizzaLijst as $pizza) : ?>
                <div>
                    <h3><?php echo $pizza->getNaam(); ?></h3>
                    <p>Prijs: <?php echo $pizza->getPrijs(); ?> EUR</p>
                    <p>Beschrijving: <?php echo $pizza->getBeschrijving(); ?></p>
                    <p>Promotieprijs: <?php echo $pizza->getPromotieprijs(); ?> EUR</p>
                    <button type="submit" name="add_to_cart" value="<?php echo $pizza->getPizza_id(); ?>">+ Add to Cart</button>
                </div>
            <?php endforeach; ?>
        </form>
    </div>