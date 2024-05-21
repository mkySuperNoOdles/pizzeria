<!-- presentation/menu.php -->
<div class="container">
    <div class="left-section">
        <!-- Menu Presentation Content -->
        <h2>Manage Pizzas</h2>
        <form action="adminpage.php" method="post" id="setPromotiePrijsForm">
            <input type="hidden" name="action" value="savePromotieprijs">
            <table>
                <thead>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                    <th>Promotieprijs</th>
                </thead>
                <?php foreach ($pizzas as $pizza) : ?>
                    <tr>
                        <td><?php echo $pizza->getNaam(); ?></td>
                        <td><?php echo $pizza->getBeschrijving(); ?></td>
                        <td><?php echo $pizza->getPrijs(); ?></td>
                        <?php if ($id == $pizza->getPizza_id()) : ?>
                            <td><input type="textbox" name="nieuwePromotiePrijs"><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                            <td><input type="submit"></td>
                        <?php else : ?>
                            <td><?php echo $pizza->getPromotieprijs(); ?></td>
                            <td><a href="adminpage.php?action=setPromotieprijs&id=<?php echo $pizza->getPizza_id(); ?>">edit</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </form>



    </div>