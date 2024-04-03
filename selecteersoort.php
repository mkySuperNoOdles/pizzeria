<?php
//selecteerkooi.php
declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use business\AppService;
$id = $_GET['id'];
$soortSvc = new AppService();
$soortLijst = $soortSvc->getSoortenOverzicht();
include("presentation/koppelselectie.php");
