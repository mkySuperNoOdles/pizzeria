<?php
//entities/Rol.php
declare(strict_types=1);
namespace entities;
class Rol {
    // Properties
    private $rol_id;
    private $naam;

    // Constructor
    public function __construct(
    $rol_id = null,
    $naam = null) {
        $this->rol_id = $rol_id;
        $this->naam = $naam;
    }

    // Getters and setters
    public function getRol_id() {
        return $this->rol_id;
    }

    public function setRol_id($rol_id) {
        $this->rol_id = $rol_id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

}
