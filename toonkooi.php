<?php
//toonkooi.php
declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use business\AppService;

$kooiId = intval($_GET['kooiId']);
$appSvc = new AppService();
$kooi = $appSvc->getKooiDetail($kooiId);
$soortLijst = $appSvc->getSoortenOverzicht();

include("presentation/kooioverzicht.php");