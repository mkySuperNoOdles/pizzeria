<?php
//entities/Kooi.php
declare(strict_types=1);
namespace entities;
class Kooi
{
    // Properties
    private int $id;
    private int $kooiNummer;

    // Constructor
    private function __construct(
        int $id = -1,
        int $kooiNummer
    ) {
        $this->id = $id;
        $this->kooiNummer = $kooiNummer;
    }

    public static function create(int $id, int $kooiNummer) 
    {
        return new Kooi($id, $kooiNummer);
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getKooiNummer()
    {
        return $this->kooiNummer;
    }

    public function setKooiNummer($kooiNummer)
    {
        $this->kooiNummer = $kooiNummer;
    }
}
