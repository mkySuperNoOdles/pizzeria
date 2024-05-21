        <div class="cart-container">
            <!-- Shopping Cart Content -->
            <h2>Winkelwagen</h2>
            <?php if (empty($cart)) : ?>
                <p>Winkelwagen is leeg.</p>
            <?php else : ?>
                <ul>
                    <?php foreach ($cart as $pizza_id => $quantity) : ?>
                        <li><?php echo $pizzasInCart[$pizza_id]->getNaam(); ?>
                            <a href="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>?action=remove_one&pizza_id=<?php echo $pizza_id; ?>">-</a>
                            <?php echo $quantity; ?>
                            <a href="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>?action=add_one&pizza_id=<?php echo $pizza_id; ?>">+</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php if (!isset($_SESSION['verbergCartKnop']) || $_SESSION['verbergCartKnop'] !== true) : ?>
                    <a href="index.php?action=afrekenen&cartPrice=<?php echo $cartPrice; ?>">Afrekenen (<?php echo $cartPrice ?>€)</a>
                <?php else : ?>
                    <a href="index.php">Add from Menu</a>
                <?php endif ?>
            <?php endif; ?>
        </div>
        </div>
        </div>