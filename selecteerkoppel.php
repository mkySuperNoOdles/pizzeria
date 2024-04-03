<?php
//selecteerkoppel.php
declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use business\AppService;

$soortId=$_GET['soortId'];

$appSvc = new AppService();
$vogelLijstMannenPerSoort = $appSvc->getMannenPerSoort($soortId);
$vogelLijstVrouwenPerSoort = $appSvc->getVrouwenPerSoort($soortId);
include("presentation/koppelselectie.php");