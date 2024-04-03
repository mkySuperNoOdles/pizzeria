<?php
//entities/Vogel.php
declare(strict_types=1);

namespace entities;

class Vogel
{
    // Properties
    private int $id;
    private int $soortId;
    private string $geslacht;
    private string $kleur;
    private string $geborenOp;
    private string $afkomst;
    private string $vererving;
    private ?string $geringdOp;
    private ?string $ringnummer;
    private ?float $ringmaat;
    private ?string $uitgevlogenOp;
    private ?int $kooiId;

    // Constructor

    // lege array properties als parameter in de construct functie
    // vanwege [] lege array als standaardwaarde kan de constructor dus worden opgeroepen 
    // zonder argumenten in te vullen. Dan maken we een nieuw (leeg) object
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

    // public function __construct(
    //     $id = null,
    //     $soort = null,
    //     $geslacht = null,
    //     $kleur = null,
    //     $geborenOp = null,
    //     $afkomst = null,
    //     $vererving = null,
    //     $geringdOp = null,
    //     $ringnummer = null,
    //     $ringmaat = null,
    //     $uitgevlogenOp = null,
    //     $kooiId = null
    // ) {
    //     $this->id = $id;
    //     $this->soort = $soort;
    //     $this->geslacht = $geslacht;
    //     $this->kleur = $kleur;
    //     $this->geborenOp = $geborenOp;
    //     $this->afkomst = $afkomst;
    //     $this->vererving = $vererving;
    //     $this->geringdOp = $geringdOp;
    //     $this->ringnummer = $ringnummer;
    //     $this->ringmaat = $ringmaat;
    //     $this->uitgevlogenOp = $uitgevlogenOp;
    //     $this->kooiId = $kooiId;
    // }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getSoortId()
    {
        return $this->soortId;
    }

    public function setSoortId($soortId)
    {
        $this->soortId = $soortId;
    }

    public function getGeslacht()
    {
        return $this->geslacht;
    }

    public function setGeslacht($geslacht)
    {
        $this->geslacht = $geslacht;
    }

    public function getKleur()
    {
        return $this->kleur;
    }

    public function setKleur($kleur)
    {
        $this->kleur = $kleur;
    }

    public function getGeborenOp()
    {
        return $this->geborenOp;
    }

    public function setGeborenOp($geborenOp)
    {
        $this->geborenOp = $geborenOp;
    }

    public function getAfkomst()
    {
        return $this->afkomst;
    }

    public function setAfkomst($afkomst)
    {
        $this->afkomst = $afkomst;
    }

    public function getVererving()
    {
        return $this->vererving;
    }

    public function setVererving($vererving)
    {
        $this->vererving = $vererving;
    }

    public function getGeringdOp()
    {
        return $this->geringdOp;
    }

    public function setGeringdOp($geringdOp)
    {
        $this->geringdOp = $geringdOp;
    }

    public function getRingnummer()
    {
        return $this->ringnummer;
    }

    public function setRingnummer($ringnummer)
    {
        $this->ringnummer = $ringnummer;
    }

    public function getRingmaat()
    {
        return $this->ringmaat;
    }

    public function setRingmaat($ringmaat)
    {
        $this->ringmaat = $ringmaat;
    }

    public function getUitgevlogenOp()
    {
        return $this->uitgevlogenOp;
    }

    public function setUitgevlogenOp($uitgevlogenOp)
    {
        $this->uitgevlogenOp = $uitgevlogenOp;
    }

    public function getKooiId()
    {
        return $this->kooiId;
    }

    public function setKooiId($kooiId)
    {
        $this->kooiId = $kooiId;
    }
}
