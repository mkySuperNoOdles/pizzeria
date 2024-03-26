<?php
//entities/Koppel.php
declare(strict_types=1);
namespace entities;
class Koppel {
    // Properties
    private $id;
    private $manVogelId;
    private $vrVogelId;
    private $gekoppeldOp;
    private $notities;

    // Constructor
    public function __construct(
    $id = null,
    $manVogelId = null,
    $vrVogelId = null,
    $gekoppeldOp = null,
    $notities = null) {
        $this->id = $id;
        $this->manVogelId = $manVogelId;
        $this->vrVogelId = $vrVogelId;
        $this->gekoppeldOp = $gekoppeldOp;
        $this->notities = $notities;
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getManVogelId() {
        return $this->manVogelId;
    }

    public function setManVogelId($manVogelId) {
        $this->manVogelId = $manVogelId;
    }

    public function getVrVogelId() {
        return $this->vrVogelId;
    }

    public function setVrVogelId($vrVogelId) {
        $this->vrVogelId = $vrVogelId;
    }

    public function getGekoppeldOp() {
        return $this->gekoppeldOp;
    }

    public function setGekoppeldOp($gekoppeldOp) {
        $this->gekoppeldOp = $gekoppeldOp;
    }

    public function getNotities() {
        return $this->notities;
    }

    public function setNotities($notities) {
        $this->notities = $notities;
    }

}
