<?php
//entities/Bestelling_pizza.php
declare(strict_types=1);
namespace entities;
class BestellingPizza {
    // Properties
    private int $bestelling_pizza_id;
    private int $bestellingId;
    private int $pizzaId;
    private int $aantal;
    private float $prijs;
    private ?string $extra;
    private ?string $pizzanaam;

    // Constructor
    private function __construct(array $properties = [])
    {
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
    public function getBestelling_pizza_id() {
        return $this->bestelling_pizza_id;
    }

    public function getBestellingId() {
        return $this->bestellingId;
    }

    public function getPizzanaam() {
        return $this->pizzanaam;
    }

    public function setBestellingId(int $bestellingId) {
        $this->bestellingId = $bestellingId;
    }

    public function getPizzaId() {
        return $this->pizzaId;
    }

    public function setPizzaId($pizzaId) {
        $this->pizzaId = $pizzaId;
    }

    public function getAantal() {
        return $this->aantal;
    }

    public function setAantal($aantal) {
        $this->aantal = $aantal;
    }

    public function getPrijs() {
        return $this->prijs;
    }

    public function setPrijs($prijs) {
        $this->prijs = $prijs;
    }

    public function getExtra() {
        return $this->extra;
    }

    public function setExtra($extra) {
        $this->extra = $extra === "" ? null : $extra; // assuring empty = null
    }

    public function getOrderlineTotal() {
        return $this->aantal * $this->prijs;
    }
}