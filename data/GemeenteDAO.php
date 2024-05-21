<?php
//data/GemeenteDAO.php
declare(strict_types=1);

namespace data;

use data\Dbh;

class GemeenteDAO extends Dbh
{

    public function create($data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO gemeente ($columns) VALUES ($values)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($data);
            return $this->connect()->lastInsertId();
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM gemeente WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findGemeenteId($gemeente, $postcode)
    {
        try {
            $sql = "SELECT gemeente_id FROM gemeente WHERE gemeente = :gemeente AND postcode = :postcode";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['gemeente' => $gemeente, 'postcode' => $postcode]);
            $rij = $stmt->fetch();
            $gemeenteId = $rij['gemeente_id'];
            return $gemeenteId;
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findAll()
    {
        try {
            $sql = "SELECT * FROM gemeente";
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
            $sql = "UPDATE gemeente SET $setClause WHERE id = :id";
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
            $sql = "DELETE FROM gemeente WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function canDeliverPizza($gemeente, $postcode): bool
    {
        try {
            $sql = "SELECT COUNT(*) FROM gemeente WHERE gemeente = :gemeente AND postcode = :postcode";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['gemeente' => $gemeente, 'postcode' => $postcode]);
            $count = $stmt->fetchColumn();
            if ($count == 0) {
                return false;
            } else {
                return true;
            }
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }
}
