<?php
//BestelService.php (Model)

declare(strict_types=1);

namespace business;

use data\BestellingDAO;
use data\BestellingPizzaDAO;
use data\PizzaDAO;
use data\GemeenteDAO;
use data\GebruikerDAO;
use entities\Bestelling;
use entities\BestellingPizza;

class BestelService
{
    private $bestellingDAO;
    private $bestellingPizzaDAO;
    private $pizzaDAO;
    private $gemeenteDAO;
    private $gebruikerDAO;

    public function __construct()
    {
        $this->bestellingDAO = new BestellingDAO();
        $this->bestellingPizzaDAO = new BestellingPizzaDAO();
        $this->pizzaDAO = new PizzaDAO();
        $this->gemeenteDAO = new GemeenteDAO();
        $this->gebruikerDAO = new GebruikerDAO();
    }

    // hier zeg ik tegen BestellingDAO en BestellingPizaDAO
    // dat er bestellingsdata in 2 kolommen in de database moet worden gestopt.
    // De waarden die ik krijg van presentaiton/bestellingsoverzicht.php (mijn controller) geef ik mee.

    public function publishBestelling($gebruikerId, $leverAdres, $contactNummer): bool
    {
        // returned true als bestelling is gelukt
        // false als deze niet is gelukt

        // Create a new Bestelling object with gebruikerId
        $bestelling = Bestelling::create([
            'gebruikerId' => $gebruikerId,
            'leverAdres' => $leverAdres,
            'contactNummer' => $contactNummer
        ]);
        $bestellingId = $this->bestellingDAO->create($bestelling);

        // grab user promo eligibility
        $user = $this->gebruikerDAO->findById($gebruikerId);
        $eligibleForPromo = $user->getRechtOpPromotie();

        //  pizza_bestelling objecten maken
        $pizzas = [];
        $cartData = $_SESSION['cart'];
        foreach ($cartData as $pizza_id => $quantity) {
            $pizza = $this->pizzaDAO->findById($pizza_id);
            if ($pizza) {
                $price = $eligibleForPromo ? $pizza->getPromotieprijs() : $pizza->getPrijs();
                $bestellingPizza = BestellingPizza::create([
                    'pizzaId' => $pizza_id,
                    'aantal' => $quantity,
                    'prijs' => $price,
                    'extra' => "geen idee waar dit voor dient tbh x'D"
                ]);
                $bestelling->voegPizzaToeAanBestelling($bestellingPizza);
                $pizzas[] = $bestellingPizza; // collect for later use
            } else {
                echo "no pizza";
            }
        }
        // save each bestellingpizza to the database
        foreach ($pizzas as $bestellingPizza) {
            $bestellingPizza->setBestellingId((int) $bestellingId); // set the foreign key
            $this->bestellingPizzaDAO->create($bestellingPizza);
        }

        return true;
    }

    public function getBestellingOverzicht()
    {
        $bestellingen = $this->bestellingDAO->findAll();
        return $bestellingen;
    }

    public function getOrderlines($bestellingId)
    {
        $pizzas = $this->bestellingPizzaDAO->findByBestellingId($bestellingId);
        return $pizzas;
    }

    public function getAllOrderInfo()
    {
        $bestellingen = $this->bestellingDAO->findAll();


        foreach ($bestellingen as $bestelling) {
            $bestellingId = $bestelling->getBestelling_id();
            $pizzas = $this->getOrderlines($bestellingId);
            foreach ($pizzas as $pizza) {
                $bestelling->voegPizzaToeAanBestelling($pizza);
            }
            $allOrderInfo[] = $bestelling;
        }
        return $allOrderInfo;
    }

    public function setKoerierInfo($id, $koerierInfo)
    {
        $bestelling = $this->bestellingDAO->findById($id);
        $bestelling->setKoerierInfo($koerierInfo);
        $data = [
            'koerierInfo' => $koerierInfo
        ];
        $this->bestellingDAO->update($id, $data);
    }

    public function isValidDelivery($gemeente, $postcode): bool
    {
        if ($this->gemeenteDAO->canDeliverPizza($gemeente, $postcode)) {
            return true;
        }
        return false;
    }

    public function handleDefaultGet($filePath)
    {
        $service = new CartService();
        $cart = $service->getCart();
        $cartDetails = $service->getCartDetails();
        $cartPrice = $service->getCartPrice();
        $service = new PizzaService();
        $pizzasInCart = [];
        foreach ($cart as $pizza_id => $quantity) {
            $pizzasInCart[$pizza_id] = $service->getPizzaById($pizza_id);
        }
        $adres = $_SESSION['deliverydetails']['address'];
        $postcode = $_SESSION['deliverydetails']['postcode'];
        $gemeente = $_SESSION['deliverydetails']['gemeente'];
        $service = new LoginService();
        $message = $service->toonGebruikerDetails();
        include PRESENTATION_DIR . $filePath;
        include PRESENTATION_DIR . '/userprofile.php';
        include PRESENTATION_DIR . '/cart.php';
    }
    // public function calculateTotal(BestellingPizza $bestellingPizza, bool $isEligibleForPromo = false) {
    //     $baseTotal = $bestellingPizza->getOrderlineTotal();
    //     if ($isEligibleForPromo) {

    //     }
    // }
}
