<?php
//data/KooiDAO.php
declare(strict_types=1);

namespace data;

use data\Dbh;
use entities\Kooi;

class KooiDAO extends Dbh
{

    public function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO kooi ($columns) VALUES ($values)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($data);
        return $this->connect()->lastInsertId();
    }

    public function findById(int $id): Kooi
    {
        $sql = "SELECT * FROM kooi WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        $rij =  $stmt->fetch();
        $kooi = Kooi::create((int)$rij['id'], (int)$rij['kooiNummer']);
        return $kooi;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM kooi";
        $stmt = $this->connect()->query($sql);
        $objectenLijst = array();
        foreach ($stmt as $rij) {
            $kooi = Kooi::create((int)$rij['id'], (int)$rij['kooiNummer']);
            array_push($objectenLijst, $kooi);
        }
        $this->disconnect();
        return $objectenLijst;
    }

    public function update($id, $data)
    {
        $setClause = "";
        foreach ($data as $key => $value) {
            $setClause .= "$key = :$key, ";
        }
        $setClause = rtrim($setClause, ', ');
        $sql = "UPDATE kooi SET $setClause WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM kooi WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
