<?php
namespace App\config;
use mysqli;
use Dotenv\Dotenv;
use Exception;


class Database {
    private static ?Database $instance = null;
    private mysqli $connection;

    private $hos;
    private $username;
    private $password;
    private $dbname;

     private function __construct() {
   
        if (!isset($_ENV['DB_HOST'])) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->load();
        }


        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];

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
}