<!-- presentation/manageorders.php -->
<div class="container">
    <div class="left-section">
        <!-- Menu Presentation Content -->
        <h2>Manage Orders</h2>
        <form action="adminpage.php" method="post" id="setKoerierInfoForm">
            <input type="hidden" name="action" value="saveKoerierInfo">
            <table>
                <thead>
                    <th>Klantnr</th>
                    <th>Datum bestelling</th>
                    <th>Tijd besteld</th>
                    <th>Leveradres</th>
                    <th>Contactnummer</th>
                    <th>Koerierinfo</th>

                </thead>
                <?php foreach ($bestellingen as $bestelling) : ?>
                    <tr>
                        <td><?php echo $bestelling->getGebruikerId(); ?></td>
                        <td><?php echo $bestelling->getDatum(); ?></td>
                        <td><?php echo $bestelling->getTijd(); ?></td>
                        <td><?php echo $bestelling->getLeverAdres(); ?></td>
                        <td><?php echo $bestelling->getContactNummer(); ?></td>
                        <?php if ($id == $bestelling->getBestelling_id()) : ?>
                            <td><input type="textbox" name="setKoerierInfo"><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                            <td><input type="submit"></td>
                        <?php else : ?>
                            <td><a href="adminpage.php?action=setKoerierinfo&id=<?php echo $bestelling->getBestelling_id(); ?>">extra</a></td>
                            <td><?php echo $bestelling->getKoerierInfo(); ?></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <?php foreach ($bestelling->getPizzas() as $orderline) : ?>
                                <?php echo $orderline->getPizzanaam(); ?>
                                <?php echo $orderline->getAantal(); ?>
                                <?php echo $orderline->getPrijs(); ?>
                                <?php echo $orderline->getOrderlineTotal(); ?>
                                <br>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </form>

    </div>