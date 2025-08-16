<?php

namespace App\Config;

use Dotenv\Dotenv;
use mysqli;
use Exception;

class Database {
    private static ?Database $instance = null;
    private mysqli $connection;

    private string $host;
    private string $dbname;
    private string $username;
    private string $password;

    private function __construct() {
        // ✅ Load .env only once
        if (!isset($_ENV['DB_HOST'])) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->load();
        }

        // ✅ Assign DB values from .env
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];

        // ✅ Create mysqli connection
        $this->connection = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->dbname
        );

        if ($this->connection->connect_error) {
            throw new Exception("DB Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): mysqli {
        return $this->connection;
    }

   public function __clone() {}
    public function __wakeup() {}
}
