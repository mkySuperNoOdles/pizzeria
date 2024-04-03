<?php
//entities/Koppel.php
declare(strict_types=1);

namespace entities;

class Koppel
{
    // Properties
    private int $id;
    private int $manVogelId;
    private int $vrVogelId;
    private string $gekoppeldOp;
    private string $notities;

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

    public function create($properties = [])
    {
        return new self($properties);
    }

    // public function __construct(
    // $id = null,
    // $manVogelId = null,
    // $vrVogelId = null,
    // $gekoppeldOp = null,
    // $notities = null) {
    //     $this->id = $id;
    //     $this->manVogelId = $manVogelId;
    //     $this->vrVogelId = $vrVogelId;
    //     $this->gekoppeldOp = $gekoppeldOp;
    //     $this->notities = $notities;
    // }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getManVogelId()
    {
        return $this->manVogelId;
    }

    public function setManVogelId($manVogelId)
    {
        $this->manVogelId = $manVogelId;
    }

    public function getVrVogelId()
    {
        return $this->vrVogelId;
    }

    public function setVrVogelId($vrVogelId)
    {
        $this->vrVogelId = $vrVogelId;
    }

    public function getGekoppeldOp()
    {
        return $this->gekoppeldOp;
    }

    public function setGekoppeldOp($gekoppeldOp)
    {
        $this->gekoppeldOp = $gekoppeldOp;
    }

    public function getNotities()
    {
        return $this->notities;
    }

    public function setNotities($notities)
    {
        $this->notities = $notities;
    }
}
