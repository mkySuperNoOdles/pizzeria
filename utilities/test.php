<?php
// Include the autoloader to load classes automatically
require_once __DIR__ . '/../vendor/autoload.php';

use config\Constants;
use data\VogelDAO;
use data\KooiDAO;
use business\KooiService;
use business\SoortService;

//instantiate Directory constants
// $constants = new Constants();
// $constants->setConstants();

// Instantiate the EntitiesGenerator class
// Call the generateEntities method

// $generator = new utilities\EntitiesGenerator();
// $generator->generateEntities();



// Instantiate the DAOsGenerator class
// Call the generateDAOs method

// $generator = new utilities\DAOsGenerator();
// $generator->generateDAOs();

// test create from VogelDAO
// data array vullen met nodige keys
// $data = [
//     // 'soort' => 'Parrot',
//     'geslacht' => 'Vrouw',
//     // 'kleur' => 'Green',
//     // 'geborenOp' => '2023-01-15',
//     // 'afkomst' => 'Breeder X',
//     // 'vererving' => 'Genetic',
//     // 'geringdOp' => '2023-02-01',
//     // 'ringnummer' => 'ABC123',
//     // 'ringmaat' => 'Large',
//     // 'uitgevlogenOp' => '2023-03-20',
// ];
// $id = 4;
// $daoSvc = new VogelDAO();
// $daoSvc->update($id, $data);

// $dao = new KooiDAO();
// $kooi = $dao->findById(2);
// foreach ($kooiLijst as $kooi) {
    // echo($kooi->getId());
// }

$soortSvc = new SoortService();
$lijst = $soortSvc->getSoortenOverzicht();
print("<pre>");
print_r($lijst);
print("</pre>");