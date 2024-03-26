<?php
//business/SoortService.php
declare(strict_types=1);

namespace business;

use data\SoortDAO;
use entities\Soort;

class SoortService extends SoortDAO 
{
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
}