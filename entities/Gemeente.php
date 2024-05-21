<?php
//entities/Gemeente.php
declare(strict_types=1);
namespace entities;
class Gemeente {
    // Properties
    private $gemeente_id;
    private $postcode;
    private $gemeente;

    // Constructor
    public function __construct(
    $gemeente_id = null,
    $postcode = null,
    $gemeente = null) {
        $this->gemeente_id = $gemeente_id;
        $this->postcode = $postcode;
        $this->gemeente = $gemeente;
    }

    // Getters and setters
    public function getGemeente_id() {
        return $this->gemeente_id;
    }

    public function setGemeente_id($gemeente_id) {
        $this->gemeente_id = $gemeente_id;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function getGemeente() {
        return $this->gemeente;
    }

    public function setGemeente($gemeente) {
        $this->gemeente = $gemeente;
    }

}
