<?php
// controllers/index.php
include PRESENTATION_DIR . '/header.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['action']) && isset($_GET['pizza_id'])) {
            require CONTR_DIR . '/CartController.php';
            $controller = new CartController();
            $pizza_id = intval($_GET['pizza_id']);
            switch ($_GET['action']) {
                case 'remove_one':
                    $controller->remove_one($pizza_id);
                    break;
                case 'add_one':
                    $controller->add_one($pizza_id);
                    break;
            }
            break;
        }

        if (isset($_GET['action']) && $_GET['action'] == 'afrekenen' && isset($_GET['cartPrice'])) {
            if (isset($_SESSION['user'])) {
                // user is logged in, redirect to order overview
                header("Location: bestellingsoverzicht.php");
            } else {
                // user not logged in
                header("Location: login.php");
            }
            exit();
        }
    case 'POST':
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'add_to_cart':
                    require CONTR_DIR . '/CartController.php';
                    $controller = new CartController();
                    $controller->addToCart();
                    break;
            }
        }
    default:
        require CONTR_DIR . '/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
}

include PRESENTATION_DIR . '/footer.php';
