<?php
//data/Bestelling_pizzaDAO.php
declare(strict_types=1);

namespace data;

use data\Dbh;
use entities\BestellingPizza;

class BestellingPizzaDAO extends Dbh
{

    public function create(BestellingPizza $bestellingPizza)
    {
        try {
            $data = [
                'bestellingId' => $bestellingPizza->getBestellingId(),
                'pizzaId' => $bestellingPizza->getPizzaId(),
                'aantal' => $bestellingPizza->getAantal(),
                'prijs' => $bestellingPizza->getPrijs(),
                'extra' => $bestellingPizza->getExtra()
            ];
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO bestelling_pizza ($columns) VALUES ($values)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($data);
            return $this->connect()->lastInsertId();
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    // currently working on: 
    public function findByBestellingId($bestellingId)
    {
        try {
            $sql = "SELECT bestelling_pizza.*, pizza.naam AS pizzanaam FROM bestelling_pizza JOIN pizza ON bestelling_pizza.pizzaId = pizza.pizza_id WHERE bestellingId = :bestellingId";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['bestellingId' => $bestellingId]);
            $results = $stmt->fetchAll();
            $pizzas = [];
            foreach ($results as $row) {
                $bestellingPizza = BestellingPizza::create([
                    'bestelling_pizza_id' => $row['bestelling_pizza_id'],
                    'bestellingId' => $row['bestellingId'],
                    'pizzaId' => $row['pizzaId'],
                    'aantal' => $row['aantal'],
                    'prijs' => (float) $row['prijs'],
                    'pizzanaam' => $row['pizzanaam']
                ]);
                $pizzas[] = $bestellingPizza;
            }
            return $pizzas;
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findAll()
    {
        try {
            $sql = "SELECT * FROM bestelling_pizza";
            $stmt = $this->connect()->query($sql);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function update($id, $data)
    {
        try {
            $setClause = "";
            foreach ($data as $key => $value) {
                $setClause .= "$key = :$key, ";
            }
            $setClause = rtrim($setClause, ', ');
            $sql = "UPDATE bestelling_pizza SET $setClause WHERE id = :id";
            $data['id'] = $id;
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
            $sql = "DELETE FROM bestelling_pizza WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }
}
