<?php
//entities/Pizza.php
declare(strict_types=1);
namespace entities;
class Pizza {
    // Properties
    private int $pizza_id;
    private string $naam;
    private float $prijs;
    private string $beschrijving;
    private float $promotieprijs;
    private ?string $seizoen_start;
    private ?string $seizoen_eind;

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
    public function getPizza_id() {
        return $this->pizza_id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function getPrijs() {
        return $this->prijs;
    }

    public function setPrijs($prijs) {
        $this->prijs = $prijs;
    }

    public function getBeschrijving() {
        return $this->beschrijving;
    }

    public function setBeschrijving($beschrijving) {
        $this->beschrijving = $beschrijving;
    }

    public function getPromotieprijs() {
        return $this->promotieprijs;
    }

    public function setPromotieprijs($promotieprijs) {
        $this->promotieprijs = $promotieprijs;
    }

    public function getSeizoen_start() {
        return $this->seizoen_start;
    }

    public function setSeizoen_start($seizoen_start) {
        $this->seizoen_start = $seizoen_start;
    }

    public function getSeizoen_eind() {
        return $this->seizoen_eind;
    }

    public function setSeizoen_eind($seizoen_eind) {
        $this->seizoen_eind = $seizoen_eind;
    }

}
