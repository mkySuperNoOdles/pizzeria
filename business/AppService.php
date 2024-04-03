<?php
//business/AppService.php
declare(strict_types=1);

namespace business;

use entities\Soort;
use entities\Kooi;
use entities\Koppel;
use data\KoppelDAO;
use data\SoortDAO;
use data\VogelDAO;
use data\KooiDAO;


class AppService
{
    public function getKooienOverzicht(): array
    {
        $kooiDAO = new KooiDAO();
        $kooiLijst = $kooiDAO->findAll();
        return $kooiLijst;
    }

    public function getKooiDetail(int $id): Kooi
    {
        $kooiDAO = new KooiDAO();
        $kooi = $kooiDAO->findById($id);
        return $kooi;
    }

    public function getSoortenOverzicht(): array
    {
        $soortDAO = new SoortDAO();
        $soortLijst = $soortDAO->findAll();
        return $soortLijst;
    }

    public function getSoortOverzicht(int $id): Soort
    {
        $soortDAO = new SoortDAO();
        $soort = $soortDAO->findById($id);
        return $soort;
    }

    public function getMannenPerSoort(int $soortId): array
    {
        $vogelDAO = new VogelDAO();
        $vogelLijstMannenPerSoort = $vogelDAO->findMannenPerSoort($soortId);
        return $vogelLijstMannenPerSoort;
    }
    public function getVrouwenPerSoort(int $soortId): array
    {
        $vogelDAO = new VogelDAO();
        $vogelLijstVrouwenPerSoort = $vogelDAO->findVrouwenPerSoort($soortId);
        return $vogelLijstVrouwenPerSoort;
    }

    public function maakKoppel(int $manVogelId, int $vrVogelId)
    {
        $gekoppeldOp = date("Y-m-d");
        $data = [
            'manVogelId' => $manVogelId,
            'vrVogelId' => $vrVogelId,
            'gekoppeldOp' => $gekoppeldOp
        ];
        $koppelDAO = new KoppelDAO();
        $koppelDAO->create($data);
    }

    public function setKoppelInKooi(int $manVogelId, int $vrVogelId, int $kooiId) : void
    {
        $this->updateKooiIdVoorVogel($manVogelId, $kooiId);
        $this->updateKooiIdVoorVogel($vrVogelId, $kooiId);
    }

    public function updateKooiIdVoorVogel(int $vogelId, int $kooiId): void {
        $data = [
            'kooiId' => $kooiId
        ];
        $vogelDAO = new VogelDAO();
        $vogelDAO->update($vogelId, $data);
    }

    public function isKooiIdLeeg($kooiId): bool {
        $vogelDAO = new VogelDAO();
        $vogels = $vogelDAO->findByKooiId($kooiId);
        return empty($vogels);
    }

    public function getVogelsPerKooiId($kooiId): array {
        $vogelDAO = new VogelDAO();
        $vogels = $vogelDAO->findByKooiId($kooiId);
        return $vogels;
    }
}
