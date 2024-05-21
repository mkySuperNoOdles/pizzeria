<?php
// adminpage.php

use business\PizzaService;
use business\UserService;
use business\BestelService;

include PRESENTATION_DIR . 'header.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo "GET request received<br>";
        if (isset($_GET['action'])) {
            echo "action parameter set<br>";
            switch ($_GET['action']) {
                case 'manageUsers':
                    echo "Loading manageUsers.php<br>";
                    $service = new UserService();
                    $gebruikers = $service->getGebruikerOverzicht();
                    include PRESENTATION_DIR . 'manageusers.php';
                    include PRESENTATION_DIR . 'userprofile.php';
                    include PRESENTATION_DIR . 'admmenu.php';
                    break;
                case 'managePizzas':
                case 'setPromotieprijs':
                    echo "Loading managePizzas.php<br>";
                    $service = new PizzaService();
                    $pizzas = $service->getPizzaOverzicht();
                    $id=0;
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    include PRESENTATION_DIR . 'managepizzas.php';
                    include PRESENTATION_DIR . 'userprofile.php';
                    include PRESENTATION_DIR . 'admmenu.php';
                    break;
                case 'manageOrders':
                case 'setKoerierinfo':
                    echo "Loading manageOrders.php<br>";
                    $service = new BestelService();
                    $id=0;
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    $bestellingen = $service->getAllOrderInfo();
                    include PRESENTATION_DIR . 'manageorders.php';
                    include PRESENTATION_DIR . 'userprofile.php';
                    include PRESENTATION_DIR . 'admmenu.php';
                    break;
            }
        } else {
            echo "loading default case";
            include PRESENTATION_DIR . 'admindashboard.php';
            include PRESENTATION_DIR . 'userprofile.php';
            include PRESENTATION_DIR . 'admmenu.php';
        }
        break;
    case 'POST':
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'setRechtOpPromotie':
                    $rechtOpPromotieStatus = $_POST['rechtOpPromotie'] ?? [];
                    foreach ($rechtOpPromotieStatus as $gebruiker_id => $value) {                        
                        $data = [
                            'rechtOpPromotie' => $value
                        ];
                        $service = new UserService();
                        $service->setRechtOpPromotie($gebruiker_id, $data);
                    }
                    echo "loading setRechtOpPromotie";
                    include PRESENTATION_DIR . 'manageusers.php';
                    include PRESENTATION_DIR . 'userprofile.php';
                    include PRESENTATION_DIR . 'admmenu.php';
                    break;
                case 'savePromotieprijs':
                    $id = $_POST['id'];
                    $nieuwePromotieprijs = 0;
                    $nieuwePromotieprijs = $_POST['nieuwePromotiePrijs'];
                    $service = new PizzaService;
                    $pizza = $service->getPizzaById($id);
                    $prijs = $pizza->getPrijs();
                    if ($service->checkPromotieprijs($prijs, $nieuwePromotieprijs)) {
                        $service->updatePizza($id, $nieuwePromotieprijs);
                    } else {
                        echo "Promotieprijs niet geldig";
                    };
                    unset($_POST['action']);
                    unset($_POST['nieuwePromotiePrijs']);
                    unset($_POST['id']);
                    $id=0;
                    $pizzas = $service->getPizzaOverzicht();
                    include PRESENTATION_DIR . 'managepizzas.php';
                    include PRESENTATION_DIR . 'userprofile.php';
                    include PRESENTATION_DIR . 'admmenu.php';
                    break;
                case "saveKoerierInfo":
                    $id=$_POST['id'];
                    $koerierInfo = $_POST['setKoerierInfo'];
                    $service = new BestelService();
                    $service->setKoerierInfo($id, $koerierInfo);
                    break;
            }
        }
        break;
}

include PRESENTATION_DIR . '/footer.php';
