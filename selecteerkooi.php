<?php
//selecteerkooi.php
declare(strict_types=1);
require_once realpath("vendor/autoload.php");
use business\KooiService;

$kooiSvc = new KooiService();
$kooienLijst = $kooiSvc->getKooienOverzicht();
include("presentation/kooienlijst.php");