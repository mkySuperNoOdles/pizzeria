<?php
//entities/Ronde.php
declare(strict_types=1);
namespace entities;
class Ronde {
    // Properties
    private $id;
    private $rondeNummer;
    private $jaar;
    private $koppelId;
    private $gezetOp;
    private $verwachtOp;
    private $uitgekomenOp;
    private $aantalEieren;

    // Constructor
    public function __construct(
    $id = null,
    $rondeNummer = null,
    $jaar = null,
    $koppelId = null,
    $gezetOp = null,
    $verwachtOp = null,
    $uitgekomenOp = null,
    $aantalEieren = null) {
        $this->id = $id;
        $this->rondeNummer = $rondeNummer;
        $this->jaar = $jaar;
        $this->koppelId = $koppelId;
        $this->gezetOp = $gezetOp;
        $this->verwachtOp = $verwachtOp;
        $this->uitgekomenOp = $uitgekomenOp;
        $this->aantalEieren = $aantalEieren;
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getRondeNummer() {
        return $this->rondeNummer;
    }

    public function setRondeNummer($rondeNummer) {
        $this->rondeNummer = $rondeNummer;
    }

    public function getJaar() {
        return $this->jaar;
    }

    public function setJaar($jaar) {
        $this->jaar = $jaar;
    }

    public function getKoppelId() {
        return $this->koppelId;
    }

    public function setKoppelId($koppelId) {
        $this->koppelId = $koppelId;
    }

    public function getGezetOp() {
        return $this->gezetOp;
    }

    public function setGezetOp($gezetOp) {
        $this->gezetOp = $gezetOp;
    }

    public function getVerwachtOp() {
        return $this->verwachtOp;
    }

    public function setVerwachtOp($verwachtOp) {
        $this->verwachtOp = $verwachtOp;
    }

    public function getUitgekomenOp() {
        return $this->uitgekomenOp;
    }

    public function setUitgekomenOp($uitgekomenOp) {
        $this->uitgekomenOp = $uitgekomenOp;
    }

    public function getAantalEieren() {
        return $this->aantalEieren;
    }

    public function setAantalEieren($aantalEieren) {
        $this->aantalEieren = $aantalEieren;
    }

}
