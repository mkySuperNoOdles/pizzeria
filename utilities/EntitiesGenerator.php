<?php
//utilities/EntitiesGenerator.php
declare(strict_types=1);

namespace utilities;
//Import namespace\classes
use data\Dbh;

class EntitiesGenerator extends Dbh
{

    public function generateEntities()
    {
        try {
            // Specify the folder where you want to put the files
            $folderPath = TEMP_DIR;

            // Get list of tables in the database
            $tablesQuery = "SHOW TABLES";
            $tablesResult = $this->connect()->query($tablesQuery);

            // Loop through each table
            while ($tableRow = $tablesResult->fetch(\PDO::FETCH_NUM)) {
                $tableName = $tableRow[0];

                // Get list of columns in the table
                $columnsQuery = "SHOW COLUMNS FROM $tableName";
                $columnsResult = $this->connect()->query($columnsQuery);

                // Generate entity class code
                $entityCode = "<?php\n";
                $entityCode .="//entities/" . ucfirst($tableName) . ".php\n";
                $entityCode .="declare(strict_types=1);\n";
                $entityCode .="namespace entities;\n";
                $entityCode .= "class " . ucfirst($tableName) . " {\n";

                // Properties
                $entityCode .= "    // Properties\n";
                while ($columnRow = $columnsResult->fetch()) {
                    $columnName = $columnRow['Field'];
                    $entityCode .= "    private $" . $columnName . ";\n";
                }

                // Constructor
                $entityCode .= "\n";
                $entityCode .= "    // Constructor\n";
                $entityCode .= "    public function __construct(\n";
                $first = true;
                $columnsResult = $this->connect()->query($columnsQuery); // Reset result pointer
                while ($columnRow = $columnsResult->fetch()) {
                    $columnName = $columnRow['Field'];
                    if (!$first) {
                        $entityCode .= ",\n";
                    }
                    $entityCode .= "    $" . $columnName . " = null";
                    $first = false;
                }
                $entityCode .= ") {\n";
                $columnsResult = $this->connect()->query($columnsQuery); // Reset result pointer
                while ($columnRow = $columnsResult->fetch()) {
                    $columnName = $columnRow['Field'];
                    $entityCode .= "        \$this->$columnName = \$$columnName;\n";
                }
                $entityCode .= "    }\n";

                // Getters and setters
                $entityCode .= "\n";
                $entityCode .= "    // Getters and setters\n";
                $columnsResult = $this->connect()->query($columnsQuery); // Reset result pointer
                while ($columnRow = $columnsResult->fetch()) {
                    $columnName = $columnRow['Field'];
                    $entityCode .= "    public function get" . ucfirst($columnName) . "() {\n";
                    $entityCode .= "        return \$this->$columnName;\n";
                    $entityCode .= "    }\n\n";
                    $entityCode .= "    public function set" . ucfirst($columnName) . "($" . $columnName . ") {\n";
                    $entityCode .= "        \$this->$columnName = $" . $columnName . ";\n";
                    $entityCode .= "    }\n\n";
                }

                $entityCode .= "}\n";

                // Write entity class code to file
                $filename = $folderPath . ucfirst($tableName) . ".php";
                file_put_contents($filename, $entityCode);
                echo "Generated entity class for table $tableName<br>";

                // Close connection 
                $this->disconnect();
            }
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
