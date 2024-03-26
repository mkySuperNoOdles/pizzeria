<?php
//toonkooi.php
declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use business\KooiService;
use business\SoortService;

$id = intval($_GET['id']);
$kooiSvc = new KooiService();
$kooi = $kooiSvc->getKooiOverzicht($id);

$soortSvc = new SoortService();
$soortLijst = $soortSvc->getSoortenOverzicht();

include("presentation/kooioverzicht.php");