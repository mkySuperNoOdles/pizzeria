<?php
// login.php

use business\LoginService;

require_once("utilities/FormValidator.php");

include PRESENTATION_DIR . 'header.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
        // case 'GET':
        //     echo "hallo";
        //     break;
        //     // if (isset($_GET['action'])) {
        //     //     switch ($_GET['action']) {
        //     //         case 'eenaccount':

        //     //             break;
        //     //         case 'geenaccount':

        //     //             break;
        //     //     }
        //     //     break;
        //     }
    case 'POST':
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'eenaccount':
                    if (isset($_POST['email']) && isset($_POST['wachtwoord'])) {
                        $email = $_POST['email'];
                        $wachtwoord = $_POST['wachtwoord'];
                        $service = new LoginService();
                        $service->login($email, $wachtwoord);
                        //grab and fill delivery details session var from user data in database
                        $service->setDeliveryDetails($formData);
                        header("Location: bestellingsoverzicht.php");
                        exit();
                    }
                    // require CONTR_DIR . '/CartController.php';
                    // $controller = new CartController();
                    // $controller->addToCart();
                    // break;
                    break;
                case 'geenaccount':
                    $createAccount = isset($_POST['createAccount']);
                    if ($createAccount) {
                        $formData = [
                            'name' => $_POST['name'] ?? '',
                            'firstName' => $_POST['firstName'] ?? '',
                            'address' => $_POST['address'] ?? '',
                            'postcode' => $_POST['postcode'] ?? '',
                            'gemeente' => $_POST['gemeente'] ?? '',
                            'phoneNumber' => $_POST['phoneNumber'] ?? '',
                            'email' => $_POST['email'] ?? '',
                            'password' => $_POST['password'] ?? ''
                        ];
                    } else {
                        $formData = [
                            'name' => $_POST['name'] ?? '',
                            'firstName' => $_POST['firstName'] ?? '',
                            'address' => $_POST['address'] ?? '',
                            'postcode' => $_POST['postcode'] ?? '',
                            'gemeente' => $_POST['gemeente'] ?? '',
                            'phoneNumber' => $_POST['phoneNumber'] ?? '',
                        ];
                    }
                    $errors = FormValidator::validateForm($formData);

                    if (empty($errors) && $createAccount == true) {
                        // indien het formulier correct is ingevuld, createAccount is gechecked en dus email en paswoord zijn meegegeven
                        $service = new LoginService();
                        $service->register($formData);
                        $service->setDeliveryDetails($formData);
                        header("Location: bestellingsoverzicht.php");
                    } elseif (empty($errors) && $createAccount == false) {
                        // indien het formulier correct is ingevuld, createAccount is unchecked
                        $service = new LoginService();
                        if ($service->isLoggedIn() == false) {
                            $_SESSION['user'] = $service->setToGuest();
                        }
                        $service->setDeliveryDetails($formData);
                        header("Location: bestellingsoverzicht.php");
                    } else {
                        // Display errors
                        FormValidator::printErrors();
                    }
                    break;
            }
        }

        break;
    default:
        include PRESENTATION_DIR . '/login_no_session.php';
}

include PRESENTATION_DIR . '/footer.php';
