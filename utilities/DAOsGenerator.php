<?php
//utilities/DAOGenerator.php
declare(strict_types=1);

namespace utilities;
//Import namespace\classes
use data\Dbh;

class DAOsGenerator extends Dbh
{

    public function generateDAOs()
    {
        try {
            // Specify the folder where you want to put the files
            $folderPath = TEMP_DIR;

            // Query om alle tabellen op te halen
            $tablesQuery = "SHOW TABLES";
            $tablesResult = $this->connect()->query($tablesQuery);

            // Loop door alle tabellen
            while ($tableRow = $tablesResult->fetch(\PDO::FETCH_NUM)) {
                $tableName = $tableRow[0];

                // Genereer DAO-klasse voor de huidige tabel
                $daoCode = "<?php\n";
                $daoCode .="//data/" . ucfirst($tableName) . "DAO.php\n";
                $daoCode .="declare(strict_types=1);\n";
                $daoCode .="namespace data;\n";
                $daoCode .="use data\Dbh;\n";
                $daoCode .= "class " . ucfirst($tableName) . "DAO extends Dbh\n{\n\n";
                // $daoCode .= "    private \$pdo;\n\n";
                // $daoCode .= "    public function __construct(PDO \$pdo) {\n";
                // $daoCode .= "        \$this->pdo = \$pdo;\n";
                // $daoCode .= "    }\n\n";

                // Create method
                $daoCode .= "    public function create(\$data) {\n";
                $daoCode .= "        \$columns = implode(\", \", array_keys(\$data));\n";
                $daoCode .= "        \$values = \":\" . implode(\", :\", array_keys(\$data));\n";
                $daoCode .= "        \$sql = \"INSERT INTO $tableName (\$columns) VALUES (\$values)\";\n";
                $daoCode .= "        \$stmt = \$this->connect()->prepare(\$sql);\n";
                $daoCode .= "        \$stmt->execute(\$data);\n";
                $daoCode .= "        return \$this->connect()->lastInsertId();\n";
                $daoCode .= "    }\n\n";

                // Read methods
                $daoCode .= "    public function findById(\$id) {\n";
                $daoCode .= "        \$sql = \"SELECT * FROM $tableName WHERE id = :id\";\n";
                $daoCode .= "        \$stmt = \$this->connect()->prepare(\$sql);\n";
                $daoCode .= "        \$stmt->execute(['id' => \$id]);\n";
                $daoCode .= "        return \$stmt->fetch();\n";
                $daoCode .= "    }\n\n";

                $daoCode .= "    public function findAll() {\n";
                $daoCode .= "        \$sql = \"SELECT * FROM $tableName\";\n";
                $daoCode .= "        \$stmt = \$this->connect()->query(\$sql);\n";
                $daoCode .= "        return \$stmt->fetchAll();\n";
                $daoCode .= "    }\n\n";

                // Update method
                $daoCode .= "    public function update(\$id, \$data) {\n";
                $daoCode .= "        \$setClause = \"\";\n";
                $daoCode .= "        foreach (\$data as \$key => \$value) {\n";
                $daoCode .= "            \$setClause .= \"\$key = :\$key, \";\n";
                $daoCode .= "        }\n";
                $daoCode .= "        \$setClause = rtrim(\$setClause, ', ');\n";
                $daoCode .= "        \$sql = \"UPDATE $tableName SET \$setClause WHERE id = :id\";\n";
                $daoCode .= "        \$data['id'] = \$id;\n";
                $daoCode .= "        \$stmt = \$this->connect()->prepare(\$sql);\n";
                $daoCode .= "        return \$stmt->execute(\$data);\n";
                $daoCode .= "    }\n\n";

                // Delete method
                $daoCode .= "    public function delete(\$id) {\n";
                $daoCode .= "        \$sql = \"DELETE FROM $tableName WHERE id = :id\";\n";
                $daoCode .= "        \$stmt = \$this->connect()->prepare(\$sql);\n";
                $daoCode .= "        return \$stmt->execute(['id' => \$id]);\n";
                $daoCode .= "    }\n";

                $daoCode .= "}\n";

                // Write DAO class to file in 'data' directory
                $filename = ucfirst($tableName) . "DAO.php";
                file_put_contents($folderPath . $filename, $daoCode);
                echo "Generated DAO class for table $tableName<br>";

                // Close connection
                $this->disconnect();
            }
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}


// data array vullen met nodige keys
// $data = [
//     'manVogelId' => $koppel->getManVogelId(),
//     'vrVogelId' => $koppel->getVrVogelId(),
//     'gekoppeldOp' => $koppel->getGekoppeldOp(),
//     'notities' => $koppel->getNotities()
// ];
