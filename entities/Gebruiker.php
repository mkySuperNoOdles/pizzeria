<?php
//entities/Gebruiker.php
declare(strict_types=1);
namespace entities;
class Gebruiker {
    // Properties
    private int $gebruiker_id;
    private int $rolId;
    private string $naam;
    private string $voornaam;
    private string $adres;
    private string $telefoon;
    private string $email;
    private string $wachtwoord;
    private bool $rechtOpPromotie;
    private string $bemerkingen;
    private int $gemeenteId;
    private string $gemeente;
    private string $postcode;

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
    public function getGebruiker_id() {
        return $this->gebruiker_id;
    }

    public function getRolId() {
        return $this->rolId;
    }

    public function setRolId($rolId) {
        $this->rolId = $rolId;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function getVoornaam() {
        return $this->voornaam;
    }

    public function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;
    }

    public function getAdres() {
        return $this->adres;
    }

    public function setAdres($adres) {
        $this->adres = $adres;
    }

    public function getGemeenteId() {
        return $this->gemeenteId;
    }

    public function setGemeenteId($gemeenteId) {
        $this->gemeenteId = $gemeenteId;
    }

    public function getTelefoon() {
        return $this->telefoon;
    }

    public function setTelefoon($telefoon) {
        $this->telefoon = $telefoon;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getWachtwoord() {
        return $this->wachtwoord;
    }

    public function setWachtwoord($wachtwoord) {
        $this->wachtwoord = $wachtwoord;
    }

    public function getRechtOpPromotie() {
        return $this->rechtOpPromotie;
    }

    public function setRechtOpPromotie($rechtOpPromotie) {
        $this->rechtOpPromotie = $rechtOpPromotie;
    }

    public function getBemerkingen() {
        return $this->bemerkingen;
    }

    public function setBemerkingen($bemerkingen) {
        $this->bemerkingen = $bemerkingen;
    }

    public function getGemeente(): string {
        return $this->gemeente;
    }

    public function getPostcode(): string {
        return $this->postcode;
    }
}
