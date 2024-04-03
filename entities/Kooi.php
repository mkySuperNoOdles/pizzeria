<?php
//entities/Kooi.php
declare(strict_types=1);
namespace entities;
class Kooi
{
    // Properties
    private int $id;
    private int $kooiNummer;
    private array $vogels = [];

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
    public function getId(): int
    {
        return $this->id;
    }

    public function getKooiNummer(): int
    {
        return $this->kooiNummer;
    }

    public function setKooiNummer($kooiNummer)
    {
        $this->kooiNummer = $kooiNummer;
    }

    public function getVogels($vogels): array
    {
        return $vogels;
    }

    public function setVogels($vogels)
    {
        $this->vogels = $vogels;
    }
}