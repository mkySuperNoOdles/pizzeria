<?php
//CartService.php (Model)

declare(strict_types=1);

namespace business;

use data\PizzaDAO;
use data\GebruikerDAO;

class CartService
{

    public function addToCart($pizza_id)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$pizza_id])) {
            $_SESSION['cart'][$pizza_id]++;
        } else {
            $_SESSION['cart'][$pizza_id] = 1;
        }
        // maak object bestelling_pizza
        // zit pizza id al in array? 
        // object->aantal +1
        // 
    }

    public function remove_one($pizza_id)
    {
        $_SESSION['cart'][$pizza_id]--;
        if ($_SESSION['cart'][$pizza_id] <= 0) {
            unset($_SESSION['cart'][$pizza_id]);
        }
    }

    public function add_one($pizza_id)
    {
        $_SESSION['cart'][$pizza_id]++;
    }

    public function getCart()
    {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    public function getCartPrice($user = '')
    {
        $cartPrice = 0;
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                $dao = new GebruikerDAO();
                $promoEligible = $dao->findByEmail($user)->getRechtOpPromotie();
                if ($promoEligible) {
                    foreach ($_SESSION['cart'] as $pizza_id => $quantity) {
                        $pizzaDAO = new PizzaDAO;
                        $pizzaPrice = $pizzaDAO->findById($pizza_id)->getPromotieprijs();
                        $cartPrice += $pizzaPrice * $quantity;
                    }
                }
            }  else {
                foreach ($_SESSION['cart'] as $pizza_id => $quantity) {
                    $pizzaDAO = new PizzaDAO;
                    $pizzaPrice = $pizzaDAO->findById($pizza_id)->getPrijs();
                    $cartPrice += $pizzaPrice * $quantity;
                }
            }
        }
        return $cartPrice;
    }

    public function getCartDetails($user = '') {
        $cartDetails = [];
        $totalPrice = 0;

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            $promoEligible = false;
            if (isset($_SESSION['user'])) {
                $user  = $_SESSION['user'];
                $dao = new GebruikerDAO();
                $promoEligible = $dao->findByEmail($user)->getRechtOpPromotie();
            }

            foreach ($_SESSION['cart'] as $pizza_id => $quantity) {
                $pizzaDAO = new PizzaDAO;
                $pizza = $pizzaDAO->findById($pizza_id);
                $pizzaPrice = $promoEligible ? $pizza->getPromotieprijs() : $pizza->getPrijs();
                $lineTotal = $pizzaPrice * $quantity;

                $cartDetails[] = [
                    'pizza_id' => $pizza_id,
                    'quantity' => $quantity,
                    'unit_price' => $pizzaPrice,
                    'line_total' => $lineTotal,
                    'pizza' => $pizza
                ];

                $totalPrice += $lineTotal;
            }
        }

        return ['items' => $cartDetails, 'total_price' => $totalPrice];
    }
}
