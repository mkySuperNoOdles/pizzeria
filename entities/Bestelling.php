<?php
//entities/Bestelling.php
declare(strict_types=1);
namespace entities;
use entities\BestellingPizza;
class Bestelling {
    // Properties
    private int $bestelling_id;
    private int $gebruikerId; // guest = 1
    private string $datum;
    private string $tijd;
    private array $pizzas = [];
    private string $leverAdres;
    private string $contactNummer;
    private string $koerierInfo;
    // Constructor
    private function __construct(array $properties = [])
    {
        //
        $dateTime = new \DateTime();
        $this->datum = $dateTime->format('Y-m-d');
        $this->tijd = $dateTime->format('H:i:s');

        // we overlopen deze array en assignen de key en zijn waarde
        foreach ($properties as $property => $value) {
            // INDIEN de property in de array gedefinieerd is binnen deze klasse ($this)
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

    public static function create($properties = [])
    {
        return new self($properties);
    }

    // Getters and setters

    public function voegPizzaToeAanBestelling(BestellingPizza $pizza) {
        $this->pizzas[] = $pizza;
    }

    public function getPizzas(): array {
        return $this->pizzas;
    }
    
    public function getBestelling_id() {
        return $this->bestelling_id;
    }

    public function getGebruikerId() {
        return $this->gebruikerId;
    }

    public function setGebruikerId($gebruikerId) {
        $this->gebruikerId = $gebruikerId;
    }

    public function getDatum() {
        return $this->datum;
    }

    public function getTijd() {
        return $this->tijd;
    }

    public function getLeverAdres() {
        return $this->leverAdres;
    }

    public function setLeverAdres($leverAdres) {
        $this->leverAdres = $leverAdres;
    }

    public function getContactNummer() {
        return $this->contactNummer;
    }

    public function setContactNummer($contactNummer) {
        $this->contactNummer = $contactNummer;
    }

    public function getKoerierInfo() {
        return $this->koerierInfo;
    }

    public function setKoerierInfo($koerierInfo) {
        $this->koerierInfo = $koerierInfo;
    }

    public function getOrderTotal() {
        $total = 0;
        foreach ($this->pizzas as $pizza) {
            $total += $pizza->getOrderlineTotal();
        }
        return $total;
    }
}