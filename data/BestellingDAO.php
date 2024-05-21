<?php
//data/BestellingDAO.php
declare(strict_types=1);

namespace data;

use data\Dbh;
use entities\Bestelling;

class BestellingDAO extends Dbh
{

    // public function create(Bestelling $bestelling)
    // {
    //     try {
    //         $data = [
    //             'gebruikerId' => $bestelling->getGebruikerId(),
    //             'datum' => $bestelling->getDatum(),
    //             'tijd' => $bestelling->getTijd(),
    //             'leverAdres' => $bestelling->getLeverAdres(),
    //             'contactNummer' => $bestelling->getContactNummer()
    //         ];
    //         $columns = implode(", ", array_keys($data));
    //         $values = ":" . implode(", :", array_keys($data));
    //         $sql = "INSERT INTO bestelling ($columns) VALUES ($values)";
    //         $conn = $this->connect()->beginTransaction();
    //         $stmt = $conn->prepare($sql);
    //         $stmt->execute($data);
    //         return $conn->lastInsertId();
    //     } catch (\Exception $e) {
    //         throw new \Exception("Database connection error:" . $e->getMessage());
    //     }
    // }

    public function create(Bestelling $bestelling)
    {
        $conn = $this->connect();
        try {
            $data = [
                'gebruikerId' => $bestelling->getGebruikerId(),
                'datum' => $bestelling->getDatum(),
                'tijd' => $bestelling->getTijd(),
                'leverAdres' => $bestelling->getLeverAdres(),
                'contactNummer' => $bestelling->getContactNummer()
            ];
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO bestelling ($columns) VALUES ($values)";

            $stmt = $conn->prepare($sql);
            $stmt->execute($data);
            return $conn->lastInsertId();
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }



    public function findById($id): Bestelling
    {
        try {
            $sql = "SELECT * FROM bestelling WHERE bestelling_id = :bestelling_id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['bestelling_id' => $id]);
            $rij =  $stmt->fetch();
            $bestelling = Bestelling::create(
                [
                    'bestelling_id' => (int) $rij['bestelling_id'],
                    'gebruikerId' => (int) $rij['gebruikerId'],
                    'datum' => (string) $rij['datum'],
                    'tijd' => (string) $rij['tijd'],
                    'koerierInfo' => (string) $rij['koerierInfo']
                ]
            );
            return $bestelling;
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findAll(): array
    {
        try {
            $sql = "SELECT * FROM bestelling";
            $stmt = $this->connect()->query($sql);
            $bestellingen = array();
            foreach ($stmt as $rij) {
                $bestelling = Bestelling::create(
                    [
                        'bestelling_id' => (int) $rij['bestelling_id'],
                        'gebruikerId' => (int) $rij['gebruikerId'],
                        'datum' => (string) $rij['datum'],
                        'tijd' => (string) $rij['tijd'],
                        'leverAdres' => (string) $rij['leverAdres'],
                        'contactNummer' => (string) $rij['contactNummer'],
                        'koerierInfo' => (string) $rij['koerierInfo'],
                    ]
                );
                array_push($bestellingen, $bestelling);
            }
            $this->disconnect();
            return $bestellingen;
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function update($bestelling_id, $data)
    {
        try {
            $setClause = "";
            foreach ($data as $key => $value) {
                $setClause .= "$key = :$key, ";
            }
            $setClause = rtrim($setClause, ', ');
            $sql = "UPDATE bestelling SET $setClause WHERE bestelling_id = :bestelling_id";
            $data['bestelling_id'] = $bestelling_id;
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
            $sql = "DELETE FROM bestelling WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }
}
