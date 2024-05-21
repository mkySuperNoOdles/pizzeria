<?php
// logout.php

use business\LoginService;

require_once("utilities/FormValidator.php");

include PRESENTATION_DIR . 'header.php';
$service = new LoginService();
$service->logout();
header("Location: index.php");
exit();