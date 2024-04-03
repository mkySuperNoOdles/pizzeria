<?php
//maakkoppel.php
declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use business\AppService;

$manVogelId = $_POST['manVogelId'];
$vrVogelId = $_POST['vrVogelId'];

$appSvc = new AppService();
$appSvc->maakKoppel($manVogelId, $vrVogelId);
// include("presentation/.php");