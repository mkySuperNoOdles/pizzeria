<?php
// index.php
require 'vendor/autoload.php';
require 'functions.php';

use utilities\ErrorHandler;
use business\RolService;
use business\LoginService;
use business\UserService;

session_start();


// Turn off all error reporting
error_reporting(0);

// Ensure that errors are not displayed to the user
ini_set('display_errors', '0');
// debug
// jd($_SERVER);

ErrorHandler::register();

checkAccess();

function checkAccess()
{
    $svc = new LoginService;
    $gebruikerRolId = $svc->getGebruikerRolId() ?? 'guest';
    $currentScript = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Making sure all users regardless of role have access to noacess.php controller

    if ($currentScript == '/pizzeria/noaccess.php') {
        return;
    }

    $permissions = RolService::getPermissions();

    // Check if the current script is in the user's role permissions
    if (!in_array($currentScript, $permissions[$gebruikerRolId])) {
        header("Location: noaccess.php");
        exit();
    }
}

// admin check

$userService = new UserService();
if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $isAdmin = $userService->userIsAdmin($user);
} else {
    $user = null;
}

require 'router.php';
