<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pizzeria</title>
    <link rel="stylesheet" href="style/pizzeria.css" type="text/css">
</head>

<body>

    <a href="index.php">[Menu]</a>
    <?php if (!isset($_SESSION['user'])) : ?>
        <a href="login.php">[Meld aan]</a>
    <?php else : ?>
        <a href="logout.php">[Log out]</a>
        <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == "yes") : ?>
            <a href="adminpage.php">[Admin]</a>
        <?php endif; ?>
    <?php endif; ?>