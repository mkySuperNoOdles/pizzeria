<?php
//entities/Soort.php
declare(strict_types=1);
namespace entities;
class Soort {
    // Properties
    private int $id;
    private string $naam;

    // Constructor
    private function __construct(
    int $id = -1,
    string $naam) {
        $this->id = $id;
        $this->naam = $naam;
    }

    public static function create(int $id, string $naam) 
    {
        return new Soort($id, $naam);
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

}
