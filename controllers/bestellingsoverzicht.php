<?php
// bestellingsoverzicht.php

use business\BestelService;
use business\CartService;
use business\PizzaService;
use business\LoginService;

include PRESENTATION_DIR . 'header.php';

$_SESSION['verbergCartKnop'] = true;

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

        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'confirm_order':
                    $service = new LoginService();
                    $gebruikerId = $service->getLoggedInUser();
                    $contactNummer = $_SESSION['deliverydetails']['phoneNumber'];
                    $adres = $_SESSION['deliverydetails']['address'];
                    $postcode = $_SESSION['deliverydetails']['postcode'];
                    $gemeente = $_SESSION['deliverydetails']['gemeente'];
                    $service = new BestelService();
                    if ($service->isValidDelivery($gemeente, $postcode)) {
                        $leverAdres = $adres . "" . $postcode . "" . $gemeente;
                        $service = new BestelService();
                        $service->publishBestelling($gebruikerId, $leverAdres, $contactNummer);
                        $service->handleDefaultGet('/ordersuccess.php');
                    } else {
                        $service->handleDefaultGet('/orderfailed.php');
                    }
                    break;
                default:
                    echo "Action not recognized.";
                    break;
            }
        } else {
            // Default GET handling
            $service = new BestelService();
            $service->handleDefaultGet('/plaatsbestelling.php');
            break;
        }
        break;
    case 'POST':
        if (isset($_POST['action']) && $_POST['action'] == 'changeAddress') {
            // Default POST handling
            $service = new CartService();
            $cart = $service->getCart();
            $cartDetails = $service->getCartDetails();
            // Grab pizza details for items in cart
            $service = new PizzaService();
            $pizzasInCart = [];
            foreach ($cart as $pizza_id => $quantity) {
                $pizzasInCart[$pizza_id] = $service->getPizzaById($pizza_id);
            }
            // validate form

            // execute changes meaning
            // update $_SESSION['deliverydetails']
            $adres = $_POST['adres'];
            $postcode = $_POST['postcode'];
            $gemeente = $_POST['gemeente'];
            $_SESSION['deliverydetails']['address'] = $adres;
            $_SESSION['deliverydetails']['postcode'] = $postcode;
            $_SESSION['deliverydetails']['gemeente'] = $gemeente;
            $service = new LoginService();
            $message = $service->toonGebruikerDetails();
            include PRESENTATION_DIR . '/plaatsbestelling.php';
            include PRESENTATION_DIR . '/userprofile.php';
            include PRESENTATION_DIR . '/cart.php';
        }
        break;
    default:
        $service = new LoginService();
        if ($service->isLoggedIn()) {
            $user = $_SESSION['user'];
        };
        $service = new CartService();
        $cart = $service->getCart();
        $cartDetails = $service->getCartDetails();
        $cartPrice = $service->getCartPrice($user);
        // Grab pizza details for items in cart
        $service = new PizzaService();
        $pizzasInCart = [];
        foreach ($cart as $pizza_id => $quantity) {
            $pizzasInCart[$pizza_id] = $service->getPizzaById($pizza_id);
        }
        $adres = $_SESSION['deliverydetails']['address'];
        $postcode = $_SESSION['deliverydetails']['postcode'];
        $gemeente = $_SESSION['deliverydetails']['gemeente'];
        include PRESENTATION_DIR . '/bestellingsoverzicht.php';
        include PRESENTATION_DIR . '/cart.php';
        break;
}

include PRESENTATION_DIR . '/footer.php';
