<?php
//business/KooiService.php
declare(strict_types=1);

namespace business;

use data\KooiDAO;
use entities\Kooi;

class KooiService extends KooiDAO 
{
    public function getKooienOverzicht(): array
    {
        $kooiDAO = new KooiDAO();
        $kooiLijst = $kooiDAO->findAll();
        return $kooiLijst;
    }

    public function getKooiOverzicht(int $id): Kooi
    {
        $kooiDAO = new KooiDAO();
        $kooi = $kooiDAO->findById($id);
        return $kooi;
    }
}