<?php
//data/VogelDAO.php
declare(strict_types=1);
namespace data;
use data\Dbh;
use entities\Vogel;
class VogelDAO extends Dbh
{

    // create object functie met 1 parameter, een associatieve array waarin de keys overeenkomen
    // met de column names in de vogel tabel
    public function create($data) {
        // array_keys returns an array of all keys from the assoc array $data
        // implode will take all these keys and concatenate its elements into a single string,
        // separating elements by the first argument (which is ', ' here)
        // so $columns = "key1, key2, ..." into a single string to be able to use it in our sql query
        $columns = implode(", ", array_keys($data));
        // and $values = ":key1, :key2, ..." and can also be used in the sql query
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

    public function findMannenPerSoort($soortId)
    {
        $sql = "SELECT vogel.*, soort.id AS soortId, vogel.id AS vogelId FROM vogel JOIN soort on vogel.soortId = soort.id WHERE soort.id = :soortId AND vogel.geslacht = 'Man' AND vogel.kooiId IS NULL";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':soortId', $soortId, \PDO::PARAM_INT);
        $stmt->execute();
        $fetchRows = $stmt->fetchAll();
        $vogelObjecten = array();
        foreach ($fetchRows as $vogelObject) {
            $vogelObject = Vogel::create($vogelObject);
            array_push($vogelObjecten, $vogelObject);
        }
        $this->disconnect();
        return $vogelObjecten;
    }
    public function findVrouwenPerSoort($soortId)
    {
        $sql = "SELECT vogel.*, soort.id AS soortId, vogel.id AS vogelId FROM vogel JOIN soort on vogel.soortId = soort.id WHERE soort.id = :soortId AND vogel.geslacht = 'Vrouw' AND vogel.kooiId IS NULL";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':soortId', $soortId, \PDO::PARAM_INT);
        $stmt->execute();
        $fetchRows = $stmt->fetchAll();
        $vogelObjecten = array();
        foreach ($fetchRows as $vogelObject) {
            $vogelObject = Vogel::create($vogelObject);
            array_push($vogelObjecten, $vogelObject);
        }
        $this->disconnect();
        return $vogelObjecten;
    }

    public function findByKooiId($kooiId): array {
        $sql = "SELECT * FROM vogel WHERE kooiId = :kooiId";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':kooiId', $kooiId, \PDO::PARAM_INT);
        $stmt->execute();
        $fetchRows = $stmt->fetchAll();
        $vogelObjecten = array();
        foreach ($fetchRows as $vogelObject) {
            $vogelObject = Vogel::create($vogelObject);
            array_push($vogelObjecten, $vogelObject);
        }
        $this->disconnect();
        return $vogelObjecten;
    }
}
