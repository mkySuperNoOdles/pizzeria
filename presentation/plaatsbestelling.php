<div class="container">
    <div class="left-section">
        <div>
            <h2>Your Order</h2>
            <table>
                <thead>
                    <tr>
                        <th>Pizza</th>
                        <th>Details</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Promo price</th>
                        <th>Ur Pizza total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartDetails['items'] as $item) : ?>
                        <tr>
                            <td><?php echo $item['pizza']->getNaam(); ?></td>
                            <td><?php echo $item['pizza']->getBeschrijving(); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['pizza']->getPrijs(); ?></td>
                            <td><?php echo $item['pizza']->getPromotieprijs(); ?></td>
                            <td><?php echo $item['line_total']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>Order Total: <span id="totalPrice"><?php echo $cartDetails['total_price']; ?></span></p>
        </div>

        <h2>Delivery Details</h2>
        <p id="deliveryAddress"><?php echo $adres ?></p>
        <p><?php echo $postcode ?> <?php echo $gemeente ?></p>
        <form action="bestellingsoverzicht.php" method="post">
            <input type="hidden" name="action" value="changeAddress">

            <label>
                <input type="checkbox" name="changeAddress" id="changeAddressCheckbox" onclick="toggleAccountFields()">
                Wijzig adres van levering
            </label>

            <div id="accountFields" class="hidden">
                <label for="adres">Adres:</label>
                <input type="adres" id="adres" name="adres" value="">

                <label for="postcode">Postcode:</label>
                <input type="postcode" id="postcode" name="postcode" value="">

                <label for="gemeente">Gemeente:</label>
                <input type="gemeente" id="gemeente" name="gemeente" value="">

                <input type="submit" value="Save Changes">
            </div>

        </form>

        <a href="bestellingsoverzicht.php?action=confirm_order" class="button">Confirm Order</a>

    </div>

    <script>
        function toggleAccountFields() {
            var checkbox = document.getElementById('changeAddressCheckbox');
            var accountFields = document.getElementById('accountFields');
            if (checkbox.checked) {
                accountFields.style.display = 'block';
            } else {
                accountFields.style.display = 'none';
            }
        }
    </script>