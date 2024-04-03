<?php
//processapp.php
declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use business\AppService;
// presentation/kooienlijst.php stuurt kooiId door
$appSvc = new AppService();

if (isset($_GET['kooiId'])) {
    $kooiId = intval($_GET['kooiId']);
    //is kooi leeg?
    if ($appSvc->isKooiIdLeeg($kooiId) == true) {
        // ja, selecteer dan soort om een koppel te maken en toe te voegen
        if (!isset($_GET['soortId'])) {
            $soortLijst = $appSvc->getSoortenOverzicht();
            include("presentation/soortselectie.php");
        } else {
            $soortId = intval($_GET['soortId']);
            $vogelLijstMannenPerSoort = $appSvc->getMannenPerSoort($soortId);
            $vogelLijstVrouwenPerSoort = $appSvc->getVrouwenPerSoort($soortId);
            include("presentation/koppelselectie.php");
            if (isset($_GET['manVogelId']) && isset($_GET['vrVogelId'])) {
                $manVogelId = intval($_GET['manVogelId']);
                $vrVogelId = intval($_GET['vrVogelId']);
                $appSvc->maakKoppel($manVogelId, $vrVogelId);
                $appSvc->setKoppelInKooi($manVogelId, $vrVogelId, $kooiId);
                include("presentation/soortselectie.php");
            }
        }
    } else if (isset($_GET['manVogelId']) && isset($_GET['vrVogelId'])) {
        // kooi is niet leeg, toon dan het koppel vogels
        // of we krijgen manVogelId & vrVogelId via de url
        $vogels = $appSvc->getVogelsPerKooiId($kooiId);
        include("presentation/toonkoppel.php");
    } else {
        $vogels = $appSvc->getVogelsPerKooiId($kooiId);
        include("presentation/toonkoppel.php");
    }
}