<?php
//FormValidator.php
declare(strict_types=1);

class FormValidator
{
    private static $errors = array();
    // public omdat hij buiten de class gebruikt moet worden
    // static omdat deze klasse maar 1 toestand/instantie heeft, hij is statisch dus, 
    // reset errors array om clean slate te maken what so ever
    // wanneer $formData niet leeg is en request method van $server is post
    // === is stricte vergelijking, is hier niet nodig (datatype)
    // loop dan door die $formdata, neem hun waarden
    // en controleer of deze leeg zijn
    // als een input leeg is, voeg dan een foutmelding toe aan de array errors
    // return dan de errors    
    public static function validateForm($formData): array
    {
        self::$errors = array();
        if (!empty($formData) && $_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($formData as $key => $value) {
                if (empty($value)) {
                    self::$errors[$key] = substr($key, 3) . " is required.";
                }
            }
            return self::$errors;
        }
    }

    public static function getErrors() : array {
        return self::$errors;
    }

    public static function printErrors(){
        foreach (self::$errors as $error) {
            echo $error . "</br>";
        }
    }
}
