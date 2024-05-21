<?php
// controllers/HomeController.php

declare(strict_types=1);

use business\CartService;

class CartController
{

    private CartService $cartSvc;

    public function __construct()
    {
        $this->cartSvc = new CartService();
    }

    private function redirectToHome($redirectUrl)
    {
        // $currentScript = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            header("Location: " . $redirectUrl);
            exit();
    }

    public function addToCart()
    {
        $currentScript = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if ($currentScript == "/pizzeria/index.php") {
            $redirectUrl = "index.php";
        } else if ($currentScript == "/pizzeria/bestellingsoverzicht.php") {
        }
        $pizza_id = intval($_POST['add_to_cart']);
        $this->cartSvc->addToCart($pizza_id);
        $this->redirectToHome($redirectUrl);
        exit();
    }

    public function remove_one($pizza_id)
    {
        $currentScript = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if ($currentScript == "/pizzeria/index.php") {
            $redirectUrl = "index.php";
        } else if ($currentScript == "/pizzeria/bestellingsoverzicht.php") {
            $redirectUrl = "bestellingsoverzicht.php";
        }
        $this->cartSvc->remove_one($pizza_id);
        $this->redirectToHome($redirectUrl);
        exit();
    }

    public function add_one($pizza_id)
    {
        $currentScript = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if ($currentScript == "/pizzeria/index.php") {
            $redirectUrl = "index.php";
        } else if ($currentScript == "/pizzeria/bestellingsoverzicht.php") {
            $redirectUrl = "bestellingsoverzicht.php";
        }
        $this->cartSvc->add_one($pizza_id);
        $this->redirectToHome($redirectUrl);
        exit();
    }

    public function getCartDetails()
    {
        return $this->cartSvc->getCartDetails();
    }
}
