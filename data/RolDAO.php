<?php
//data/RolDAO.php
declare(strict_types=1);

namespace data;

use data\Dbh;

class RolDAO extends Dbh
{

    public function create($data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO rol ($columns) VALUES ($values)";
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
            $sql = "SELECT * FROM rol WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }

    public function findAll()
    {
        try {
            $sql = "SELECT * FROM rol";
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
            $sql = "UPDATE rol SET $setClause WHERE id = :id";
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
            $sql = "DELETE FROM rol WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (\Exception $e) {
            // $conn->rollBack();  // Roll back the transaction on error
            throw new \Exception("Database operation failed: " . $e->getMessage());
        }
    }
}
