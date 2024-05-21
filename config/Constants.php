<?php
//constants.php
declare(strict_types=1);

namespace config;

class Constants
{
    public function setConstants()
    {
        //define() is used in PHP to define constants outside of classes,
        //so within the entire project
        //const is a language construct in PHP used to define class constants
        //these are only available within classes

        //Application root folder (from config folder up!)
        define('ROOT_DIR', realpath(__DIR__ . '/../'));

        //Entities folder
        define('ENTITIES_DIR', ROOT_DIR . '/entities/');
        //Business folder
        define('BUSINESS_DIR', ROOT_DIR . '/business/');
        //Config folder
        define('CONFIG_DIR', ROOT_DIR . '/config/');
        //Data folder
        define('DATA_DIR', ROOT_DIR . '/data/');
        //Presentation folder
        define('PRESENTATION_DIR', ROOT_DIR . '/presentation/');
        //Utilities folder
        define('UTILITIES_DIR', ROOT_DIR . '/utilities/');
        //Temp folder
        define('TEMP_DIR', ROOT_DIR . '/temp/');
        //Controllers folder
        define('CONTR_DIR', ROOT_DIR . '/controllers/');
        //Logs folder
        define('LOG_DIR', ROOT_DIR . '/logs/');
    }
}