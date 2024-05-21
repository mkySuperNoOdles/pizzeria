<?php
//data/PizzaDAO.php
declare(strict_types=1);

namespace data;

use data\Dbh;
use entities\Pizza;

class PizzaDAO extends Dbh
{

    public function create($data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO pizza ($columns) VALUES ($values)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($data);
            return $this->connect()->lastInsertId();
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findById(int $pizza_id): Pizza
    {
        try {
            $sql = "SELECT * FROM pizza WHERE pizza_id = :pizza_id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['pizza_id' => $pizza_id]);
            $rij =  $stmt->fetch();
            $pizza = Pizza::create(
                [
                    'pizza_id' => (int) $rij['pizza_id'],
                    'naam' => (string) $rij['naam'],
                    'prijs' => (float) $rij['prijs'],
                    'beschrijving' => (string) $rij['beschrijving'],
                    'promotieprijs' => (float) $rij['promotieprijs']
                ]
            );
            return $pizza;
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findAll(): array
    {
        try {
            $sql = "SELECT * FROM pizza";
            $stmt = $this->connect()->query($sql);
            $objectenLijst = array();
            foreach ($stmt as $rij) {
                $pizza = Pizza::create(
                    [
                        'pizza_id' => (int) $rij['pizza_id'],
                        'naam' => (string) $rij['naam'],
                        'prijs' => (float) $rij['prijs'],
                        'beschrijving' => (string) $rij['beschrijving'],
                        'promotieprijs' => (float) $rij['promotieprijs'],
                        'seizoen_start' => (string) $rij['seizoen_start'],
                        'seizoen_eind' => (string) $rij['seizoen_eind']
                    ]
                );
                array_push($objectenLijst, $pizza);
            }
            $this->disconnect();
            return $objectenLijst;
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function update($pizza_id, $data)
    {
        try {
            $setClause = "";
            foreach ($data as $key => $value) {
                $setClause .= "$key = :$key, ";
            }
            $setClause = rtrim($setClause, ', ');
            $sql = "UPDATE pizza SET $setClause WHERE pizza_id = :pizza_id";
            $data['pizza_id'] = $pizza_id;
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
            $sql = "DELETE FROM pizza WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }
}
