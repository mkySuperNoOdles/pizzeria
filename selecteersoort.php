<?php
//selecteerkooi.php
declare(strict_types=1);
require_once realpath("vendor/autoload.php");
use business\SoortService;

$soortSvc = new SoortService();
$soortLijst = $soortSvc->getSoortenOverzicht();
include("presentation/soortenlijst.php");