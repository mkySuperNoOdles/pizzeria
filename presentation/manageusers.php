<!-- presentation/menu.php -->
<div class="container">
    <div class="left-section">
        <!-- Menu Presentation Content -->
        <h2>ManageUsers</h2>
        <form action="adminpage.php" method="post" id="setRechtOpPromotieForm">
            <input type="hidden" name="action" value="setRechtOpPromotie">
            <table>
                <thead>
                    <th>Naam</th>
                    <th>Voornaam</th>
                    <th>Email</th>
                    <th>Recht op Promo</th>
                </thead>
                <?php foreach ($gebruikers as $gebruiker) : ?>
                    <tr>
                        <td><?php echo $gebruiker->getNaam(); ?></td>
                        <td><?php echo $gebruiker->getVoornaam(); ?></td>
                        <td><?php echo $gebruiker->getEmail(); ?></td>
                        <td>
                            <input type="hidden" name="rechtOpPromotie[<?php echo $gebruiker->getGebruiker_id(); ?>]" value="0">
                            <input type="checkbox" name="rechtOpPromotie[<?php echo $gebruiker->getGebruiker_id(); ?>]" value="1" <?php echo $gebruiker->getRechtOpPromotie() ? 'checked' : ''; ?> disabled>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tfoot>
                    <td colspan="2"><button type="button" onclick="enableEditing()">edit</button></td>
                    <td colspan="2"><button type="submit">save</button></td>
                </tfoot>
            </table>
        </form>

    </div>

    <script>
        function enableEditing() {
            var checkboxes = document.querySelectorAll('#setRechtOpPromotieForm input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.removeAttribute('disabled');
            });
        }
    </script>