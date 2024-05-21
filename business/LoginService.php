<?php
//business/AppService.php
declare(strict_types=1);

namespace business;

use entities\Gebruiker;
use entities\Rol;
use data\GebruikerDAO;
use data\RolDAO;
use data\GemeenteDAO;

class LoginService
{
    private GebruikerDAO $gebruikerDAO;

    public function __construct()
    {
        $this->gebruikerDAO = new GebruikerDAO();
    }

    public function login(string $email, string $wachtwoord): bool
    {
        $gebruiker = $this->gebruikerDAO->findByEmail($email);
        if ($gebruiker !== null && password_verify($wachtwoord, $gebruiker->getWachtwoord())) {
            $_SESSION['user'] = $gebruiker->getEmail();
            return true;
        }

        return false;
    }

    public function logout(): void
    {
        session_unset();
        session_destroy();
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }

    public function getLoggedInUser(): int
    {
        $email = $_SESSION['user'];
        $gebruikerDAO = new GebruikerDAO();
        $gebruikerId = $gebruikerDAO->findByEmail($email)->getGebruiker_id();
        return $gebruikerId;
    }

    public function setToGuest(): string
    {
        $gebruikerDAO = new GebruikerDAO();
        $gebruiker = $gebruikerDAO->findGuest();
        return $gebruiker->getEmail();
    }

    public function register($formData): bool
    {
        // here comes register logics
        $naam = $formData['name'];
        $voornaam = $formData['firstName'];
        $adres = $formData['address'];
        $postcode = $formData['postcode'];
        $gemeente = $formData['gemeente'];
        $telefoon = $formData['phoneNumber'];
        $email = $formData['email'];
        $wachtwoord = $formData['password'];

        // server side validation
        if (empty($naam) || empty($voornaam) || empty($adres) || empty($postcode) || empty($gemeente) || empty($telefoon) || empty($email) || empty($wachtwoord)) {
            return false; // validation failed
        }

        // continue with password hashing
        $hashedPassword = password_hash($wachtwoord, PASSWORD_DEFAULT);

        // pick up gemeenteId from input
        $gemeenteDAO = new GemeenteDAO();
        $gemeenteId = $gemeenteDAO->findGemeenteId($gemeente, $postcode);
        $rolId = 1;

        // construct data array
        $data = [
            'rolId' => $rolId,
            'naam' => $naam,
            'voornaam' => $voornaam,
            'adres' => $adres,
            'gemeenteId' => $gemeenteId,
            'telefoon' => $telefoon,
            'email' => $email,
            'wachtwoord' => $hashedPassword
        ];

        // create gebruiker
        $gebruikerDAO = new GebruikerDAO();
        $gebruikerId = $gebruikerDAO->create($data);
        $email = $gebruikerDAO->findById(intval($gebruikerId))->getEmail();
        // log gebruiker in
        $_SESSION['user'] = $email;

        // Assuming everything went well
        return true;
    }

    public function setDeliveryDetails($formData)
    {
        // this function will fill $_SESSION['deliverydetails'] with data according to guest or signd up user

        if ($this->getLoggedInUser() == 1) {
            // guest logic
            if ($formData) {
                $_SESSION['deliverydetails'] = [
                    'address' => $formData['address'],
                    'phoneNumber' => $formData['phoneNumber'],
                    'name' => $formData['name'],
                    'firstName' => $formData['firstName'],
                    'gemeente' => $formData['gemeente'],
                    'postcode' => $formData['postcode']
                ];
            }
        } else {
            // registered user logic
            $gebruikerId = $this->getLoggedInUser();
            $gebruikerDAO = new gebruikerDAO();
            $gebruiker = $gebruikerDAO->findById($gebruikerId);
            $_SESSION['deliverydetails'] = [
                'address' => $gebruiker->getAdres(),
                'phoneNumber' => $gebruiker->getTelefoon(),
                'name' => $gebruiker->getNaam(),
                'firstName' => $gebruiker->getVoornaam(),
                'gemeente' => $gebruiker->getGemeente(),
                'postcode' => $gebruiker->getPostcode()
            ];
        }
    }

    public function toonGebruikerDetails(): string
    {
        if ($this->isLoggedIn() == true) {
            $gebruikerId = $this->getLoggedInUser();
            $message = "";
            switch ($gebruikerId) {
                case '1':
                    // guest user
                    $message = "guest user identified";
                    return $message;
                    break;

                default:
                    // all other cases
                    $message = "hello " . $gebruikerId;
                    return $message;
                    break;
            }
        } else {
            $message = "Hallo! Zin in een lekkere pizza?";
            return $message;
        }
    }

    public function getGebruikerRolId(): int
    {
        // default email for guests
        $email = "guest@guest.be";

        // check if 'user' session is set and not null
        if (isset($_SESSION['user']) && $_SESSION['user'] == !null) {
            $email = $_SESSION['user'];
        }

        $gebruikerDAO = new GebruikerDAO();
        $gebruiker = $gebruikerDAO->findByEmail($email);

        // Check if a gebruiker object was returned
        if ($gebruiker !== null) {
            return $gebruiker->getRolId();
        } else {
            echo "user not found";
        }
    }
}
