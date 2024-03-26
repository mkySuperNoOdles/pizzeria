<?php
//entities/Vogel.php
declare(strict_types=1);

namespace entities;

class Vogel
{
    // Properties
    private $id;
    private $soort;
    private $geslacht;
    private $kleur;
    private $geborenOp;
    private $afkomst;
    private $vererving;
    private $geringdOp;
    private $ringnummer;
    private $ringmaat;
    private $uitgevlogenOp;
    private $kooiId;

    // Constructor
    public function __construct(
        $id = null,
        $soort = null,
        $geslacht = null,
        $kleur = null,
        $geborenOp = null,
        $afkomst = null,
        $vererving = null,
        $geringdOp = null,
        $ringnummer = null,
        $ringmaat = null,
        $uitgevlogenOp = null,
        $kooiId = null
    ) {
        $this->id = $id;
        $this->soort = $soort;
        $this->geslacht = $geslacht;
        $this->kleur = $kleur;
        $this->geborenOp = $geborenOp;
        $this->afkomst = $afkomst;
        $this->vererving = $vererving;
        $this->geringdOp = $geringdOp;
        $this->ringnummer = $ringnummer;
        $this->ringmaat = $ringmaat;
        $this->uitgevlogenOp = $uitgevlogenOp;
        $this->kooiId = $kooiId;
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSoort()
    {
        return $this->soort;
    }

    public function setSoort($soort)
    {
        $this->soort = $soort;
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
