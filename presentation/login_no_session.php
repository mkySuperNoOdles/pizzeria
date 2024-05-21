<div class="container2">
        <h2>Ik heb een account</h2>
        <form action="login.php" method="post">
        <input type="hidden" name="action" value="eenaccount">
            <label for="email">Emailadres:</label>
            <input type="email" id="email" name="email" required value="test2@gmail.com">
            
            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required value="test2">
            
            <button type="submit">Inloggen</button>
        </form>
    </div>

    <div class="container2">
        <h2>Ik heb geen account</h2>
        <form action="login.php" method="post" id="registrationForm">
        <input type="hidden" name="action" value="geenaccount">
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" required value="x">

            <label for="firstName">Voornaam:</label>
            <input type="text" id="firstName" name="firstName" required value="x">

            <label for="address">Adres:</label>
            <input type="text" id="address" name="address" required value="x">

            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" required value="x">

            <label for="gemeente">Gemeente:</label>
            <input type="text" id="gemeente" name="gemeente" required value="x">

            <label for="phoneNumber">Telefoonnummer:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" required value="x">

            <label>
                <input type="checkbox" name="createAccount" id="createAccountCheckbox" onclick="toggleAccountFields()">
                Ik wil ook een account!
            </label>

            <div id="accountFields" class="hidden">
                <label for="email">Emailadres:</label>
                <input type="email" id="email" name="email" value="test@hotmail.com">

                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" value="test">
            </div>

            <button type="submit">Ga verder</button>
        </form>
    </div>

    <script>
        function toggleAccountFields() {
            var checkbox = document.getElementById('createAccountCheckbox');
            var accountFields = document.getElementById('accountFields');
            if (checkbox.checked) {
                accountFields.style.display = 'block';
            } else {
                accountFields.style.display = 'none';
            }
        }
    </script>