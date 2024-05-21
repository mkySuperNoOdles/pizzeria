<?php
//data/DBh.php

declare(strict_types=1);

namespace data;

class Dbh
{
    private $host = "localhost";
    private $dbName = "pizzeria";
    private $user = "root";
    private $pwd = "";
    private $pdo;

    protected function connect()
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $this->pdo = new \PDO($dsn, $this->user, $this->pwd);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (\Exception $e) {
            throw new \Exception("Database connection error:" . $e->getMessage());
        }
    }

    protected function disconnect()
    {
        if (isset($this->pdo)) {
            $this->pdo = null;
        }
    }

    protected function getDbName(): string
    {
        return $this->dbName;
    }
}
