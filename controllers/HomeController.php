<?php
// controllers/HomeController.php

use business\PizzaService;
use business\CartService;
use business\LoginService;

class HomeController
{
    public function index()
    {
        $_SESSION['verbergCartKnop'] = false;
        $pizzaSvc = new PizzaService();
        $cartSvc = new CartService();

        $pizzaLijst = $pizzaSvc->getPizzaOverzicht();
        $cart = $cartSvc->getCart();
        $cartPrice = $cartSvc->getCartPrice();

        // Grab pizza details for items in cart
        $pizzasInCart = [];
        foreach ($cart as $pizza_id => $quantity) {
            $pizzasInCart[$pizza_id] = $pizzaSvc->getPizzaById($pizza_id);
        }

        $service = new LoginService();
        $message = $service->toonGebruikerDetails();

        // pass to the view
        include PRESENTATION_DIR . '/menu.php';
        include PRESENTATION_DIR . '/userprofile.php';
        include PRESENTATION_DIR . '/cart.php';
    }

    public function adm()
    {
        // pass to the view
        include PRESENTATION_DIR . 'admindashboard.php';
        include PRESENTATION_DIR . 'userprofile.php';
        include PRESENTATION_DIR . 'admmenu.php';
    }

}
// // Handle add to cart button actions

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
//     if (isset($_POST['add_to_cart'])) {
//         // Handle adding pizza to cart
        
//     }
// }

// // Retrieve cart data
// $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];


// }
