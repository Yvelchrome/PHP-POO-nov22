<?php

namespace App\Factory;

use App\Interfaces\Database;
use PDO;

class PDOFactory implements Database
{
    private string $driver;
    private string $host;
    private int $port;
    private string $dbName;
    private string $user;
    private string $assword;

    public function __construct(string $driver = "mysql", string $host = "database", int $port = 3306, string $dbName = "data", string $user = "root", string $password = "password")
    {
        $this->driver = $driver;
        $this->host = $host;
        $this->port = $port;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;
    }
    // test
    public function getMySqlPDO(): \PDO
    {
        return new \PDO($this->driver . ":host" . $this->host . ":" . $this->port . ";dbname=" . $this->dbName, $this->user, $this->password);
    }
}
