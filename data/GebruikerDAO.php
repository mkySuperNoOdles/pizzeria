<?php
//data/GebruikerDAO.php
declare(strict_types=1);

namespace data;

use data\Dbh;
use entities\Gebruiker;

class GebruikerDAO extends Dbh
{

    public function create($data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO gebruiker ($columns) VALUES ($values)";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($data);
            return $conn->lastInsertId();
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findGuest(): Gebruiker
    {
        try {
            $sql = "SELECT * FROM gebruiker WHERE gebruiker_id = 1";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $rij =  $stmt->fetch();
            $gebruiker = Gebruiker::create(
                [
                    'gebruiker_id' => (int) $rij['gebruiker_id'],
                    'rolId' => (int) $rij['rolId'],
                    'naam' => (string) $rij['naam'],
                    'voornaam' => (string) $rij['voornaam'],
                    'adres' => (string) $rij['adres'],
                    'gemeenteId' => (int) $rij['gemeenteId'],
                    'telefoon' => (string) $rij['telefoon'],
                    'email' => (string) $rij['email'],
                    'wachtwoord' => (string) $rij['wachtwoord'],
                    'rechtOpPromotie' => (bool) $rij['rechtOpPromotie'],
                    'bemerkingen' => (string) $rij['bemerkingen']
                ]
            );
            return $gebruiker;
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }
    public function findByEmail(string $email): Gebruiker
    {
        try {
            $sql = "SELECT gebruiker.*, gemeente.gemeente AS gemeente, gemeente.postcode AS postcode FROM gebruiker JOIN gemeente ON gebruiker.gemeenteId = gemeente.gemeente_id WHERE email = :email";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['email' => $email]);
            $rij =  $stmt->fetch();
            $gebruiker = Gebruiker::create(
                [
                    'gebruiker_id' => (int) $rij['gebruiker_id'],
                    'rolId' => (int) $rij['rolId'],
                    'naam' => (string) $rij['naam'],
                    'voornaam' => (string) $rij['voornaam'],
                    'adres' => (string) $rij['adres'],
                    'gemeenteId' => (int) $rij['gemeenteId'],
                    'telefoon' => (string) $rij['telefoon'],
                    'email' => (string) $rij['email'],
                    'wachtwoord' => (string) $rij['wachtwoord'],
                    'rechtOpPromotie' => (bool) $rij['rechtOpPromotie'],
                    'bemerkingen' => (string) $rij['bemerkingen'],
                    'gemeente' => (string) $rij['gemeente'],
                    'postcode' => (string) $rij['postcode']
                ]
            );
            return $gebruiker;
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findById(int $gebruiker_id): Gebruiker
    {
        try {
            $sql = "SELECT gebruiker.*, gemeente.gemeente AS gemeente, gemeente.postcode AS postcode FROM gebruiker JOIN gemeente ON gebruiker.gemeenteId = gemeente.gemeente_id WHERE gebruiker_id = :gebruiker_id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['gebruiker_id' => $gebruiker_id]);
            $rij =  $stmt->fetch();
            $gebruiker = Gebruiker::create(
                [
                    'gebruiker_id' => (int) $rij['gebruiker_id'],
                    'rolId' => (int) $rij['rolId'],
                    'naam' => (string) $rij['naam'],
                    'voornaam' => (string) $rij['voornaam'],
                    'adres' => (string) $rij['adres'],
                    'gemeenteId' => (int) $rij['gemeenteId'],
                    'telefoon' => (string) $rij['telefoon'],
                    'email' => (string) $rij['email'],
                    'wachtwoord' => (string) $rij['wachtwoord'],
                    'rechtOpPromotie' => (bool) $rij['rechtOpPromotie'],
                    'bemerkingen' => (string) $rij['bemerkingen'],
                    'gemeente' => (string) $rij['gemeente'],
                    'postcode' => (string) $rij['postcode']
                ]
            );
            return $gebruiker;
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findAll(): array
    {
        try {
            $sql = "SELECT * FROM gebruiker";
            $stmt = $this->connect()->query($sql);
            $gebruikers = array();
            foreach ($stmt as $rij) {
                $gebruiker = Gebruiker::create(
                    [
                        'gebruiker_id' => (int) $rij['gebruiker_id'],
                        'naam' => (string) $rij['naam'],
                        'voornaam' => (string) $rij['voornaam'],
                        'adres' => (string) $rij['adres'],
                        'gemeenteId' => (int) $rij['gemeenteId'],
                        'telefoon' => (string) $rij['telefoon'],
                        'email' => (string) $rij['email'],
                        'rechtOpPromotie' => (bool) $rij['rechtOpPromotie']
                    ]
                );
                array_push($gebruikers, $gebruiker);
            }
            $this->disconnect();
            return $gebruikers;
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function update($gebruiker_id, $data)
    {
        try {
            $setClause = "";
            foreach ($data as $key => $value) {
                $setClause .= "$key = :$key, ";
            }
            $setClause = rtrim($setClause, ', ');
            $sql = "UPDATE gebruiker SET $setClause WHERE gebruiker_id = :gebruiker_id";
            $data['gebruiker_id'] = $gebruiker_id;
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute($data);
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM gebruiker WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }
}
