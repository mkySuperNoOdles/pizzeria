<?php
//selecteerkooi.php
declare(strict_types=1);
require_once realpath("vendor/autoload.php");
use business\AppService;

$appSvc = new AppService();
$kooienLijst = $appSvc->getKooienOverzicht();
include("presentation/kooienlijst.php");