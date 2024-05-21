<?php
//BestelService.php (Model)

declare(strict_types=1);

namespace business;

use data\GebruikerDAO;

class UserService
{
    private $gebruikerDAO;

    public function __construct()
    {
        $this->gebruikerDAO = new GebruikerDAO();
    }

    public function getGebruikerOverzicht() {
        $gebruikers = $this->gebruikerDAO->findAll();
        return $gebruikers;
    }

    public function setRechtOpPromotie($gebruiker_id, $data) {
        $this->gebruikerDAO->update($gebruiker_id, $data);
    }

    public function getUser()
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : [];
    }

    public function userIsAdmin() : bool {
        if (!isset($_SESSION['user'])) {
            $gebruikerEmail = "guest@guest.be";
        } else {
            $gebruikerEmail = $this->getUser();
        }
        $gebruiker = $this->gebruikerDAO->findByEmail($gebruikerEmail);
        $rolId = $gebruiker->getRolId();
        if ($rolId == 2) {
            $_SESSION['isAdmin'] = "yes";
            return true;
        } else {
            $_SESSION['isAdmin'] = "no";
            return false;
        }
    }
}
