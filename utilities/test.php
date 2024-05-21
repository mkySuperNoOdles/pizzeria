<?php
// Include the autoloader to load classes automatically
require_once __DIR__ . '/../vendor/autoload.php';

session_start();

use config\Constants;
use data\BestellingPizzaDAO;
use business\CartService;
use data\BestellingDAO;
use entities\Bestelling;
use entities\Pizza;
use data\PizzaDAO;
use entities\BestellingPizza;
use business\BestelService;
use data\GemeenteDAO;
use data\GebruikerDAO;
use business\LoginService;
use business\UserService;


// ---------------------------------------
// --     bestelling test               --
// ---------------------------------------
// $bestellingDAO = new BestellingDAO();
// $bestellingPizzaDAO = new BestellingPizzaDAO();
// $pizzaDAO = new PizzaDAO();
// $gebruikerId = 2147483647;

// // Create a new Bestelling object with gebruikerId
// $bestelling = Bestelling::create([
//     'gebruikerId' => $gebruikerId
// ]);
// $bestellingId = $bestellingDAO->create($bestelling);
// echo $bestellingId;

// //  pizza_bestelling objecten maken
// $pizzas = [];
// $pizzaIds = [1,2,3]; // example id's
// foreach ($pizzaIds as $pizza_id) {
//     $pizza = $pizzaDAO->findById($pizza_id);
//     if ($pizza_id) {
//         $bestellingPizza = BestellingPizza::create([
//             'pizzaId' => $pizza_id,
//             'aantal' => 2, // example
//             'prijs' => $pizza->getPrijs(),
//             'extra' => "no comment"
//         ]);
//         $bestelling->voegPizzaToeAanBestelling($bestellingPizza);
//         $pizzas[] = $bestellingPizza; // collect for later use
//     }
// }

// // Save the bestelling object to the database and get the inserted ID
// $bestellingId = $bestellingDAO->create($bestelling);
// echo "Bestelling ID: " . $bestellingId . "\n";

// // save each bestellingpizza to the database
// foreach ($pizzas as $bestellingPizza) {
//     $bestellingPizza->setBestellingId((int) $bestellingId); // set the foreign key
//     $bestellingPizzaDAO->create($bestellingPizza);
// }

// if (!empty($pizzas)) {
//     echo "Prijs van Pizza ID 1 : " . $pizzas[0]->getPrijs();
// }


// ---------------------------------------
// --     deliverypossible test         --
// ---------------------------------------


// $dao = new GemeenteDAO();

// $gemeente = "Zillebeke";
// $postcode = 8902;

// if ($dao->canDeliverPizza($gemeente, $postcode) == true) {
//     echo "Ja";
// } else {
//     echo "Nee";
// };

// $dao = new GebruikerDAO();
// $gebruiker = $dao->findById(1);
// print_r($gebruiker);

