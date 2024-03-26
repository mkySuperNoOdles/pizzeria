<?php
//data/VogelDAO.php
declare(strict_types=1);
namespace data;
use data\Dbh;
class VogelDAO extends Dbh
{

    public function create($data) {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO vogel ($columns) VALUES ($values)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($data);
        return $this->connect()->lastInsertId();
    }

    public function findById($id) {
        $sql = "SELECT * FROM vogel WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function findAll() {
        $sql = "SELECT * FROM vogel";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    public function update($id, $data) {
        $setClause = "";
        foreach ($data as $key => $value) {
            $setClause .= "$key = :$key, ";
        }
        $setClause = rtrim($setClause, ', ');
        $sql = "UPDATE vogel SET $setClause WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $sql = "DELETE FROM vogel WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
